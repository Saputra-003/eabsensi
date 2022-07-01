<!-- Horizontal form modal UNTUK TAMBAH -->
<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" class="form-horizontal">
                @csrf
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nim</label>
                        <div class="col-sm-9">
                            <input type="number" name="nim" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>

                    {{-- Hidden --}}
                    <input type="hidden" name="userType" value="Student">
                    <input type="hidden" name="password"
                        value="$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi">

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Prodi</label>
                        <div class="col-sm-9">
                            <select data-placeholder="Pilih Prodi" class="form-control select" data-fouc>
                                <option></option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Akuntansi Publik">Akuntansi Publik</option>
                                <option value="Mekatronika">Mekatronika</option>
                                <option value="Teknologi Elektronika">Teknologi Elektronika</option>
                                <option value="Teknologi Informatika">Teknologi Informatika</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Kelas</label>
                        <div class="col-sm-9">
                            <select data-placeholder="Pilih Prodi" class="form-control select" data-fouc>
                                <option></option>
                                <option value="">Akuntansi</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Akuntansi Publik">Akuntansi Publik</option>
                                <option value="Mekatronika">Mekatronika</option>
                                <option value="Teknologi Elektronika">Teknologi Elektronika</option>
                                <option value="Teknologi Informatika">Teknologi Informatika</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Angkatan</label>
                        <div class="col-sm-9">
                            <input type="text" name="angkatan" class="form-control">
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