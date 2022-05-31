@extends('layouts.app')
@section('title', 'Profile')
@section('page_title', 'Profile')
@section('content')
<div class="col-md-4">
    <!-- User card -->
    <div class="card">
        <div class="card-body text-center">
            <div class="card-img-actions d-inline-block mb-3">
                <img class="img-fluid rounded-circle" src="../../../../global_assets/images/placeholders/placeholder.jpg" width="170" height="170" alt="">
                <div class="card-img-actions-overlay card-img rounded-circle">
                    <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                        <i class="icon-pencil4"></i>
                    </a>
                </div>
            </div>
    
            <h6 class="font-weight-semibold mb-0">{{ Auth::user()->name }}</h6>
            <span class="d-block text-muted">Student</span>
    
            <div class="list-icons list-icons-extended mt-3">
                <a href="#" class="list-icons-item" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a>
                <a href="#" class="list-icons-item" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a>
                <a href="#" class="list-icons-item" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a>
            </div>
        </div>
    </div>
    <!-- /user card -->
</div>

<div class="col-md-8">
    <!-- Input group addons -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Profil Saya</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            {{-- <p class="mb-4">Extend form controls by adding text or buttons before, after, or on both sides of any text-based <code>&lt;input></code>. Use <code>.input-group</code> with an <code>.input-group-prepend</code> to prepend or <code>.input-group-append</code> to append elements to a single <code>.form-control</code>. Place one add-on or button on either side of an input. You may also place one on both sides of an input. While multiple <code>&lt;input></code>s are supported visually, validation styles are only available for input groups with a single <code>&lt;input></code>.</p> --}}

            <form action="#">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Nama</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                            </span>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Alamat</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-home5"></i></span>
                            </span>
                            <input type="text" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar3"></i></span>
                            </span>
                            <input type="text" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Jenis Kelamin</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-users2"></i></span>
                            </span>
                            <input type="text" class="form-control" value="{{ $profile->profile->gender }}">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Jenis Kelamin</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-users2"></i></span>
                            </span>
                            <select class="form-control">
                                {{-- <option selected="{{ $profile->profile->gender == 'pria' ? 'selected' : '' }}" value="pria">Pria</option>
                                <option selected="{{ $profile->profile->gender == 'wanita' ? 'selected' : '' }}" value="wanita">Wanita</option> --}}
                                <option  {{ $profile->profile->gender == 'pria' ? 'selected="selected"' : '' }} value="pria">Pria</option>
                                <option  {{ $profile->profile->gender == 'wanita' ? 'selected="selected"' : '' }} value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                </div>
              
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Nomor Telepon</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-phone2"></i></span>
                            </span>
                            <input type="text" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /input group addons -->

</div>

 <script>
     // Default initialization
     $('.select').select2({
            minimumResultsForSearch: Infinity
        });
 </script>

@endsection