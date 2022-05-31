@extends('layouts.app')
@section('title', 'Admin-data-dosen')
@section('page_title', 'Data Dosen')
@section('content')
<div class="col">

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">data Dosen</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <button type="button" class="btn bg-dark btn-labeled btn-labeled-left mr-3" data-toggle="modal"
                    data-target="#modal_form_horizontal"><b><i class="icon-add"></i></b>
                    Tambah</button>
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>



        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nip</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Mata Kuliah</th>
                    <th>Telepon</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_dosen as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->profile->study_program }}</td>
                    <td></td>
                    <td><span class="badge badge-success">{{ $item->profile->phone_number }}</span></td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                    <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                    <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
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
</div>

<!-- Horizontal form modal UNTUK TAMBAH -->
<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="http://evadom.test/dosen" method="POST" class="form-horizontal">
                <input type="hidden" name="_token" value="1p1V54v47F4qUvvlmVLyQz1xqrDh5NvdqtD79DVl">                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="ruang" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nrp</label>
                        <div class="col-sm-9">
                            <input type="text" name="harga" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" name="kapasitas" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Mata Kuliah</label>
                        <div class="col-sm-9">
                            <input type="number" name="kapasitas" class="form-control">
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

@endsection