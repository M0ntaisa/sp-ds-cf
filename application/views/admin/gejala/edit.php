<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-<?= $row['id_gejala']; ?>">
    <i class="fa fa-edit"></i> Edit
</button>

<div id="edit-<?= $row['id_gejala']; ?>" class="modal modal-adminpro-general modal-zoomInDown fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#" style="background-color:orange;"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <div class="modal-login-form-inner">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    <?= form_open(base_url('admin/gejala/edit_gejala')); ?>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Kode Gejala</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input name="kode_gejala" type="text" class="form-control" value="<?= $row['kode_gejala'] ?>" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label class="login2">Gejala</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <textarea class="form-control" name="gejala" id="gejala" cols="30" rows="5"><?= $row['nama_gejala']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-9"></div>
                                                                <div class="col-lg-3">
                                                                    <div class="login-horizental">
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?= form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Form End-->
        </div>
    </div>
</div>