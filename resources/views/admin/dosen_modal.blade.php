<!-- Horizontal form modal UNTUK TAMBAH -->
<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="http://evadom.test/dosen" method="POST" class="form-horizontal">
                <input type="hidden" name="_token" value="1p1V54v47F4qUvvlmVLyQz1xqrDh5NvdqtD79DVl">                
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="ruang" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nrp</label>
                        <div class="col-sm-9">
                            <input type="text" name="harga" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" name="kapasitas" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Mata Kuliah</label>
                        <div class="col-sm-9">
                            <input type="number" name="kapasitas" class="form-control">
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