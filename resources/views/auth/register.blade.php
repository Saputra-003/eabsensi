@extends('layouts.app')
@section('page_title', 'Register')

@section('content')

<!-- Middle alignment -->
<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title">Register</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body justify-content-center text-center">
                <div>
                    <i class="icon-plus3 icon-2x text-primary border-primary border-3 rounded-round p-3 mb-3"></i>
                    <h5 class="card-title">Mahasiswa</h5>
                    {{-- <p class="mb-3">Use <code>.justify-content-center</code> class to center content vertically.
                        Add
                        optional
                        breakpoints to enable responsiveness</p> --}}
                    <button type="button" class="btn bg-primary-400" data-toggle="modal"
                        data-target="#modal_large">Tambah</button>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body justify-content-center text-center">
                <div>
                    <i class="icon-plus3 icon-2x text-primary border-primary border-3 rounded-round p-3 mb-3"></i>
                    <h5 class="card-title">Dosen</h5>
                    {{-- <p class="mb-3">Use <code>.justify-content-center</code> class to center content vertically.
                        Add
                        optional
                        breakpoints to enable responsiveness</p> --}}
                    <button type="button" class="btn bg-primary-400" data-toggle="modal"
                        data-target="#modal_dosen">Tambah</button>

                </div>
            </div>
        </div>


    </div>
</div>
<!-- /middle alignment -->

@include('admin.modal.register_mahasiswa')
@include('admin.modal.register_dosen')
@endsection