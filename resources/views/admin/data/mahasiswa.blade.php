@extends('layouts.app')
@section('title', 'Data Mahasiswa')
@section('page_title', 'Data Mahasiswa')
@section('content')
{{-- <div class="col"> --}}

    <!-- Basic datatable -->
    <div class="card flex-fill">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Data Mahasiswa</h5>
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
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Kelas</th>
                    <th>Angkatan</th>
                    <th>Semester</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user_item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user_item->nim }}</td>
                    <td>{{ $user_item->name }}</td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-success"></span></td>
                    <td><span class="badge badge-success"></span></td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('edit-form').submit();">
                                        <i class="icon-pencil"></i>
                                        Edit
                                    </a>
                                    <form id="edit-form" action="{{ route('mahasiswa.index') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                    <a href="#" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                        <i class="icon-bin"></i>
                                        Delete
                                    </a>
                                    <form id="delete-form" action="" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

                {{-- @foreach ($data_dosen as $item)
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
                @endforeach --}}
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->
    {{--
</div> --}}
@include('admin.modal.mahasiswa_modal')
<script>
    // Default initialization
    $(document).ready(function(){
        $('.select').select2({
        minimumResultsForSearch: Infinity
    });
})
</script>
@endsection