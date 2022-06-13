@extends('layouts.app')
@section('title', 'Change Password')
@section('page_title', 'Change Password')
@section('content')
        <div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title">KENAPA HARUS EPADOM ?</h6>
			</div>

			<div class="card-body">
				<b>Apa Fungsinya EPADOM</b><br>
                Mengukur tingkat kepusasan mahasiswa terhadap pelayanan akademik di Politeknik Aceh, Mengidentifikasi kontribusi dosen dalam pencapaian tujuan program studi, Meningkatkan kualitas pengajaran, Mengembangkan diri dosen, Meningkatkan kepuasan mahasiswa terhadap pengajaran, Meningkatkan kepuasan kerja dosen, Memperbaiki proses perkuliahan.<br><br>
                <b>Kenapa harus Online</b><br>
                Dengan menggunakan sistem online, kita telah menghemat penggunaan kertas lebih dari 18.000 lembar tiap semester, memperluas jangkauan responden yang awalnya hanya 20 responden perdosen menjadi seluruh mahasiswa untuk semua matakuliah, mempercepat proses pelaksanaan EPADOM, lebih objektif dan aman bagi mahasiswa, dan menghemat penggunaan SDM untuk pengelola.<br><br>
			</div>
		</div>
        <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Change Password Your Account</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="success" data-success="{{Session::get('success')}}"></div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-lg-3"><i class="icon-lock2 mr-2"></i>Old Password</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control"
                                autocomplete="current-password">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-link input-group-text" onclick="show1()"><i
                                        id="password2" class="icon-eye2"></button></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3"><i class="icon-lock2 mr-2"></i>New Password</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input type="password" name="new_password" id="katasandi_baru" class="form-control"
                                autocomplete="current-password">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-link input-group-text" onclick="show2()"><i
                                        id="katasandi_baru2" class="icon-eye2"></button></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3"><i class="icon-lock2 mr-2"></i>Confirm Password</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input type="password" name="confirm_password" id="confirm_katasandi" class="form-control"
                                autocomplete="current-password">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-link input-group-text" onclick="show3()"><i
                                        id="confirm_katasandi2" class="icon-eye2"></button></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form_group">
                    <button type="submit" class="btn btn-primary float-right mt-2">Save</button>
                </div>
            </form>
        </div>

    </div>

<script>
    function show1() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        $('#password2').addClass('icon-eye-blocked2');
    } else {
        x.type = "password";
        $('#password2').removeClass().addClass('icon-eye2');
    }
    }

    function show2() {
    var x = document.getElementById("katasandi_baru");
    if (x.type === "password") {
        x.type = "text";
        $('#katasandi_baru2').addClass('icon-eye-blocked2');
    } else {
        x.type = "password";
        $('#katasandi_baru2').removeClass().addClass('icon-eye2');
    }
    }
    
    function show3() {
    var x = document.getElementById("confirm_katasandi");
    if (x.type === "password") {
        x.type = "text";
        $('#confirm_katasandi2').addClass('icon-eye-blocked2');
    } else {
        x.type = "password";
        $('#confirm_katasandi2').removeClass().addClass('icon-eye2');
    }
    }
    
</script>
@endsection