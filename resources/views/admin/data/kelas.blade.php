@extends('layouts.app')
@section('title', 'Data Kelas')
@section('page_title', 'Data Kelas')
@section('content')

<!-- Basic datatable -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Data Kelas</h5>
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
                <th>Nama Kelas</th>
                {{-- <th></th>
                <th></th>
                <th></th> --}}
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kelas }}</td>
                {{-- <td></td> --}}
                {{-- <td></td> --}}
                {{-- <td></td> --}}
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_edit"
                                    onclick="editkelas({{ $item->id }})">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a>


                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    <i class="icon-bin"></i>
                                    Delete
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('kelas.destroy', $item->id) }}"
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

<!-- Horizontal form modal UNTUK TAMBAH -->
<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('kelas.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas" class="form-control">
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

<!-- Horizontal form modal UNTUK EDIT -->
<div id="modal_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_edit" action="{{ route('kelas.update', 1) }}" method="POST" class="form-horizontal">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas" class="form-control">
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
    
    function editKelas(id) {
        var url = '{{route("kelas.edit", ":id")}}';
        url = url.replace(':id', id);
        $.ajax({
        url: url,
        type: 'GET',
        // data: $('#FormAjax').serialize(),
        success: function(result) {
            $("input[name=kelas]").val(result.kelas);
        },
        error: function(data) {
            // you'd want to show your validation errors if there are any, as well
            console.log(data);
        }
    });
    var url = '{{route("kelas.update", ":id")}}';
    url = url.replace(':id', id);
    $('#form_edit').attr('action', url);
    }
</script>
@endsection