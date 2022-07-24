<!-- Large modal -->
<div id="modal_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="form_edit" action="" method="POST">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="font-weight-semibold"></legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nama:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nama" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email:</label>
                                        <div class="col-lg-9">
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="font-weight-semibold"></legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nrp:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="nim"
                                                class="form-control @error('nim') is-invalid @enderror"
                                                placeholder="Nrp" value="{{ old('nim') }}">
                                            @error('nim')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-dark">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /large modal -->