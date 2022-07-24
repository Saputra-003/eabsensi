@extends('layouts.app')
@section('title', 'Absensi_Kelas')
@section('page_title', 'Absensi - Kelas')
@section('content')

<!-- Basic datatable -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">kelas {{ $kelas->kelas }}</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                    data-target="#modal_tambah"><b><i class="icon-add"></i></b>
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
                <th>Pertemuan</th>
                <th>Absensi</th>
                {{-- <th class="text-center">Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td><button type="button" class="btn btn-danger rounded-round">
                        <i class="icon-eye2 mr-2"
                            onclick="event.preventDefault(); document.getElementById('absensi-kelas-form-1').submit();"></i>
                        Lihat
                    </button>
                    <form id="absensi-kelas-form-1" action="{{ route('absensi.absensi_kelas', 1) }}" method="GET"
                        class="d-none">
                        @csrf
                    </form>
                </td>
                {{-- <td class="text-center">
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
                                    onclick="editDosen({{ $item->id }})">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a>
                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    <i class="icon-bin"></i>
                                    Delete
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('dosen.destroy', $item->id) }}"
                                    method="POST" class="d-none">
                                    @method('delete')
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </td> --}}
            </tr>
        </tbody>
    </table>
</div>
<!-- /basic datatable -->

<!-- modal tambah dosen -->
{{-- @include('admin.modal.register_dosen') --}}
<!-- /modal tambah dosen -->

<!-- modal edit dosen -->
{{-- @include('admin.modal.edit_dosen') --}}
<!-- /modal edit mahasiswa -->

{{-- <script>
    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function () {
                // alert('closing modal');
                $(this).find('form').trigger('reset');
            }) 
    });

    function editDosen(id) {
            //Show edit form
            // alert(id);
            var url = '{{ route("dosen.edit", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                // data: $('#FormAjax').serialize(),
                success: function (result) {
                    console.log(result);
                    $('#form_edit input[name="name"]').val(result.name);
                    $('#form_edit input[name="nim"]').val(result.nim);
                    $('#form_edit input[name="email"]').val(result.email);
                },
                error: function (data) {
                    // you'd want to show your validation errors if there are any, as well
                    console.log(data);
                }
            });
            //add route edit in form_edit
            var url = '{{route("dosen.update", ":id")}}';
            url = url.replace(':id', id);
            $('#form_edit').attr('action', url);
        }
</script> --}}
@endsection