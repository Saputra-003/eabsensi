@extends('../../layouts.app')
@section('title', 'Data Prodi')
@section('page_title', 'Data Prodi')
@section('content')
<!-- Basic datatable -->
<div class="card flex-fill">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Data Prodi</h5>
        <div class="header-elements">
            <div class="list-icons">
                <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                    data-target="#modal_form_horizontal"><b><i class="icon-add"></i></b>
                    Tambah</button>
                {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
            </div>
        </div>
    </div>
    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->prodi }}</td>
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item" data-toggle="modal"
                                    data-target="#modal_form_horizontal" onclick="editProdi({{ $item->id }})">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a>


                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                    <i class="icon-bin"></i>
                                    Delete
                                </a>
                                <form id="delete-form" action="{{ route('prodi.destroy', $item->id) }}" method="POST"
                                    class="d-none">
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

<!-- Horizontal form modal UNTUK TAMBAH dan EDIT-->
<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Prodi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('prodi.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Prodi</label>
                        <div class="col-sm-9">
                            <input type="text" name="prodi" class="form-control">
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
<!-- /horizontal form modal UNTUK TAMBAH -->

<script>
    $(document).ready(function(){

    });
    
    function editProdi(id) {
        var url = '{{route("prodi.edit", ":id")}}';
        url = url.replace(':id', id);
        $.ajax({
        url: url,
        type: 'GET',
        // data: $('#FormAjax').serialize(),
        success: function(result) {
            $("input[name=prodi]").val(result.prodi);
        },
        error: function(data) {
            // you'd want to show your validation errors if there are any, as well
            console.log(data);
        }
    });
    }
</script>
@endsection