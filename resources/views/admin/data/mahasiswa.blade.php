@extends('layouts.app')
@section('title', 'Data Mahasiswa')
@section('page_title', 'Data Mahasiswa')
@section('content')

<!-- Basic datatable -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Data Mahasiswa</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                    data-target="#modal_large"><b><i class="icon-add"></i></b>
                    Tambah
                </button>
                {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
            </div>
        </div>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Teori</th>
                <th>Praktek</th>
                <th>Angkatan</th>
                <th>Semester</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nim}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->mahasiswa->prodi->prodi}}</td>
                @foreach($item->mahasiswa->kelas as $item_kelas)
                <td>{{$item_kelas->kelas}}</td>
                @endforeach
                <td>{{$item->mahasiswa->angkatan}}</td>
                <td>{{$item->mahasiswa->semester}}</td>
                <td>
                    <div class="form-check form-check-switchery">
                        <label class="form-check-label">
                            <input type="checkbox" id="status{{ $item->mahasiswa->id }}"
                                class="form-check-input-switchery status_id"
                                onclick="updateStatus({{ $item->mahasiswa->id }})" {{ $item->mahasiswa->status ==
                            'Aktif'?'checked':'' }}
                            data-fouc>
                        </label>
                    </div>
                </td>
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div
                                    class="dropdown-header font-weight-semibold py-0 text-default text-uppercase font-size-xs line-height-xs mt-1">
                                    Prodi
                                </div>
                                <div class="dropdown-divider opacity-75"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_edit"
                                    onclick="editMahasiswa({{ $item->mahasiswa->id }})">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a>
                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    <i class="icon-bin"></i>
                                    Delete
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="d-none">
                                    @method('delete')
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /basic datatable -->

<!-- modal tambah mahasiswa -->
@include('admin.modal.register_mahasiswa')
<!-- /modal tambah mahasiswa -->

<!-- modal edit mahasiswa -->
@include('admin.modal.edit_mahasiswa')
<!-- /modal edit mahasiswa -->

<script>
    $(document).ready(function () {

            
        });

        function editMahasiswa(id) {
            //Show edit form
            var url = '{{route("mahasiswa.edit", ":id")}}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                // data: $('#FormAjax').serialize(),
                success: function (result) {
                    console.log(result);
                    var kelas_teori = "option[value=':id_teori']";
                    kelas_teori = kelas_teori.replace(':id_teori', result.kelas[0].id);
                    var kelas_praktikum = "option[value=':id_praktikum']";
                    kelas_praktikum = kelas_praktikum.replace(':id_praktikum', result.kelas[1].id);
                    var prodi = "option[value=':id_prodi']";
                    prodi = prodi.replace(':id_prodi', result.prodi_id);

                    $('#form_edit input[name="name"]').val(result.user.name);
                    $('#form_edit input[name="nim"]').val(result.user.nim);
                    $('#form_edit input[name="email"]').val(result.user.email);
                    $('#form_edit input[name="angkatan"]').val(result.angkatan);
                    $('.prodi' + ' ' + prodi).attr('selected', 'selected');
                    $('.teori' + ' ' + kelas_teori).attr('selected', 'selected');
                    $('.praktikum' + ' ' + kelas_praktikum).attr('selected', 'selected');
                    // $("#teori option[value='1']").attr("selected");
                    // $('#praktikum').val(result.kelas.kelas[1]);
                    $('#form_edit input[name="semester"]').val(result.semester);
                    $('.select').select2({
                        minimumResultsForSearch: Infinity
                    });

                },
                error: function (data) {
                    // you'd want to show your validation errors if there are any, as well
                    console.log(data);
                }
            });
            //add route edit in form_edit
            var url = '{{route("mahasiswa.update", ":id")}}';
            url = url.replace(':id', id);
            $('#form_edit').attr('action', url);
        }
        
        //updateStatus
        function updateStatus(id) {
            var url = '{{ route("mahasiswa.updateStatus") }}';
            if ($('#status'+id).is(':checked')) {
                    $.ajax({
                    url:url,  
                    method:"GET",  
                    data:{
                        id      :   id,
                        status  :   'Aktif',
                    },                              
                    success: function( data ) {
                        console.log(data);
                    }
                });
                } else {
                    $.ajax({
                    url:url,  
                    method:"GET",  
                    data:{
                        id      :   id,
                        status : 'Tidak Aktif',
                    },                              
                    success: function( data ) {
                        console.log(data);
                    }
                });
                }
        } 


</script>

@endsection