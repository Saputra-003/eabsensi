@extends('layouts.app')
@section('title', 'Data Kelas')
@section('page_title', 'Data Kelas')
@section('content')

<!-- Basic datatable -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Data Kelas {{ $kelas->kelas }} - {{ $kelas->jenis_kelas }}</h5>
        <div class="header-elements">
            <div class="list-icons">
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
                <th>Semester</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=0;
            @endphp
            @foreach ($mahasiswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->nim }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->prodi->prodi }}</td>
                <td>{{ $kelas->kelas }}</td>
                {{-- <td>{{ $item->kelas[0]->kelas }}</td> --}}
                <td>{{ $item->semester }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @php
            $i++
            @endphp
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
</script>
@endsection