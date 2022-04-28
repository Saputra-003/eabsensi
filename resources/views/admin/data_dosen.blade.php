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
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>



        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nrp</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Bidang Keahlian</th>
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


@endsection