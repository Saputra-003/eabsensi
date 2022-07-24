<!-- Large modal -->
<div id="modal_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            {{-- <form action="{{ route('course.store') }}" method="POST"> --}}
                <form id="form_edit" action="{{ route('course.store') }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <!-- 2 columns form -->
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="font-weight-semibold"></legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kode MK:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="course_code"
                                                class="form-control @error('course_code') is-invalid @enderror"
                                                placeholder="Kode MK" value="{{ old('course_code') }}">
                                            @error('course_code')
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
                                        <label class="col-lg-3 col-form-label">Mata Kuliah:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="course"
                                                class="form-control @error('course') is-invalid @enderror"
                                                placeholder="Mata Kuliah" value="{{ old('course') }}">
                                            @error('course')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <!-- /2 columns form -->
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