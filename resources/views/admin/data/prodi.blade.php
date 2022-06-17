@extends('layouts.app')
@section('title', 'Data Prodi')
@section('page_title', 'Data Prodi')
@section('content')

<!-- Basic datatable -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Data Prodi</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                    data-target="#modal_form_horizontal"><b><i class="icon-add"></i></b>
                    Tambah Prodi</button>
                {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
            </div>
        </div>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Kelas</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->prodi }}</td>
                <td>
                    @foreach ($item->kelas as $item_kelas)
                    <li><a href="">{{ $item_kelas->kelas }}</a></li>
                    @endforeach
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
                                    Prodi</div>
                                <div class="dropdown-divider opacity-75"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_edit"
                                    onclick="editProdi({{ $item->id }})">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a>
                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    <i class="icon-bin"></i>
                                    Delete
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('prodi.destroy', $item->id) }}"
                                    method="POST" class="d-none">
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

<!-- Horizontal form modal UNTUK TAMBAH PRODI dan KELAS -->
<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Prodi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_tambah" action="{{ route('prodi.store') }}" method="POST" class="form-horizontal">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Prodi</label>
                        <div class="col-sm-9">
                            <input type="text" name="prodi" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row kelas">
                        <label class="col-form-label col-sm-3">Kelas</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="kelas[]" class="form-control" required>
                                <span class="input-group-append">
                                    <button class="btn btn-success add_kelas" type="button"><b><i
                                                class="icon-plus3"></i></b></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-dark">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /horizontal form modal UNTUK TAMBAH PRODI dan KELAS -->

<!-- Horizontal form modal UNTUK EDIT -->
<div id="modal_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Prodi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_edit" action="{{ route('prodi.update', 1) }}" method="POST" class="form-horizontal">
                @method('put')
                @csrf
                <div class="modal-body edit_kelas">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Prodi</label>
                        <div class="col-sm-9">
                            <input type="text" id="prodi" name="prodi" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-form-label col-sm-3">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas" class="form-control">
                        </div>
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-dark">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /horizontal form modal UNTUK EDIT -->

<script>
    $(document).ready(function(){
        //Tambah Input Kelas
        $( ".add_kelas" ).click(function() {
        var html = '';
            html += '<div class="form-group row" id="input_kelas">';
            html += '<label class="col-form-label col-sm-3"></label>';
            html += '<div class="col-sm-9">';
            html += '<div class="input-group">';
            html += '<input type="text" name="kelas[]" class="form-control" required>';
            html += '<span class="input-group-append">';
            html += '<button id="remove_kelas" class="btn btn-danger" type="button"><b><i class="icon-minus3"></i></b></button>';
            html += '</span>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        $('.kelas').after(html);
        });
        //Hapus Input Kelas
        $(document).on("click", "button#remove_kelas", function(){
            $(this).closest('#input_kelas').remove();
        });

        //Clear Dynamic Input Fields Edit Modal
        // $('[data-dismiss=modal]').click(function(){
        //     $(".added_kelas").remove();
        // });
        $('#modal_edit').on('hidden.bs.modal', function () {
            $(".added_kelas").remove();
        })
    });
    

    
    // function tambahProdi(id) {
    //     // console.log(id);
    //     var url = '{{route("kelas.store", ":id")}}';
    //     url = url.replace(':id', id);
    //     $("#form_tambah").attr('action', url);
    // }
    function editProdi(id) {
        var url = '{{route("prodi.edit", ":id")}}';
        url = url.replace(':id', id);
        $.ajax({
        url: url,
        type: 'GET',
        // data: $('#FormAjax').serialize(),
        success: function(prodi) {
            console.log(prodi);
            $("#prodi").val(prodi.prodi);
            for (let i = 0; i < prodi.kelas.length; i++) {
            $(".edit_kelas").append( `<div class="form-group row added_kelas">
                <label class="col-form-label col-sm-3">Kelas</label>
                <div class="col-sm-9">
                    <input type="text" name="kelas[]" class="form-control" value="${prodi.kelas[i].kelas}">
                </div>
            </div>`);
            }
            // prodi.kelas.length
            // $("input[name=prodi]").val(result.prodi);
           
        },
        error: function(data) {
            // you'd want to show your validation errors if there are any, as well
            console.log(data);
        }
    });
    var url = '{{route("prodi.update", ":id")}}';
    url = url.replace(':id', id);
    $('#form_edit').attr('action', url);
    }

    
</script>
@endsection