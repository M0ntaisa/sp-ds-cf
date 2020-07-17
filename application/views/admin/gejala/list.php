<!-- Static Table Start -->
<div class="static-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12">
                                    <div class="sparkline9-list sparkel-pro-mg-t-30 shadow-reset">
                                        <div class="sparkline8-hd">
                                            <div class="main-sparkline8-hd">
                                                <h1>Tambah Data Gejala</h1>
                                                <div class="sparkline8-outline-icon">
                                                    <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                                    <span><i class="fa fa-wrench"></i></span>
                                                    <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sparkline11-graph">
                                            <div class="basic-login-form-ad">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="modal-bootstrap modal-login-form">
                                                            <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Tambah Data</a>
                                                        </div>
                                                        <div id="zoomInDown1" class="modal modal-adminpro-general modal-zoomInDown fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-close-area modal-close-df">
                                                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="modal-login-form-inner">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="basic-login-inner modal-basic-inner">
                                                                                        <h3>Tambah Gejala</h3>
                                                                                        <br>
                                                                                        <?= form_open(base_url('admin/gejala/tambah_gejala')); ?>
                                                                                        <?php $kode_gejala = count($gejala)+1; ?>
                                                                                            <div class="form-group-inner">
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-4">
                                                                                                        <label class="login2">Kode Gejala</label>
                                                                                                    </div>
                                                                                                    <div class="col-lg-8">
                                                                                                        <input name="kode_gejala" type="text" class="form-control" value="<?= 'G'.$kode_gejala ?>" readonly />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group-inner">
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-4">
                                                                                                        <label class="login2">Gejala</label>
                                                                                                    </div>
                                                                                                    <div class="col-lg-8">
                                                                                                        <textarea class="form-control" name="gejala" id="gejala" cols="30" rows="5"></textarea>
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                        <?php 
                            if( $this->session->flashdata('sukses') ) {
                                echo '<div class="alert-wrap2 shadow-reset wrap-alert-b">';
                                echo    '<div class="alert alert-success">';
                                echo        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                echo        "<strong>Berhasil! </strong>".$this->session->flashdata('sukses')."</div></div>";
                            }
                            if( $this->session->flashdata('gagal') ) {
                                echo '<div class="alert-wrap2 shadow-reset wrap-alert-b">';
                                echo    '<div class="alert alert-danger">';
                                echo        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                echo        "<strong>Gagal! </strong>".$this->session->flashdata('gagal')."</div></div>";
                            }
                        ?>
                            <div class="sparkline9-list sparkel-pro-mg-t-30 shadow-reset">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Data Gejala</h1>
                                        <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="static-table-list">
                                        <table class="table hover-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Gejala</th>
                                                    <th>Gejala</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1; foreach ($gejala as $row) { ?>
                                                    <tr>
                                                        <td><?= $x++; ?></td>
                                                        <td><?= $row['kode_gejala']; ?></td>
                                                        <td><?= $row['nama_gejala']; ?></td>
                                                        <td>
                                                            <?php include('edit.php'); ?>
                                                            
                                                            <?php include('delete.php'); ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
        </div>
    </div>