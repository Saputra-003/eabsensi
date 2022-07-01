<!-- Large modal -->
<div id="modal_dosen" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- 2 columns form -->
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal
                                    details</legend>
                                <input type="hidden" name="data" value="dosen">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nrp:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="nim" class="form-control">
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
                                <legend class="font-weight-semibold"><i class="mr-2"></i></legend>

                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Prodi:</label>
                                    <div class="col-lg-9">
                                        <select name="prodi_id" class="form-control select" data-fouc>
                                            <option>Select Prodi</option>
                                            @foreach ($prodi as $item)
                                            <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">K.Teori:</label>
                                    <div class="col-lg-9">
                                        <select id="teori" name="jenis_kelas[]" class="form-control select" data-fouc>
                                            <option>---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">K.Praktek:</label>
                                    <div class="col-lg-9">
                                        <select id="praktikum" name="jenis_kelas[]" class="form-control select"
                                            data-fouc>
                                            <option>---</option>
                                        </select>
                                    </div>
                                </div> --}}
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

<script>
    $( document ).ready(function() {
        // $("select[name='prodi_id']").on('change', function() {
        // alert( this.value );
        // var url = '{{route("register.getKelas", ":id")}}';
        // url = url.replace(':id', this.value);
        // $.get(url,
        // function(data, status){
        //     console.log(data);
        //     $("#teori option").remove();  
        //     $("#praktikum option").remove();  
        //     data[0].forEach(element => {
        //         $("#teori").append(
        //             `
        //             <option value="${element.id}">${element.kelas}</option>
        //             `
        //         );
        //     });
        //     data[1].forEach(element => {
        //         $("#praktikum").append(
        //             `
        //             <option value="${element.id}">${element.kelas}</option>
        //             `
        //         );
        //     });
        // });
        // });
});
</script>