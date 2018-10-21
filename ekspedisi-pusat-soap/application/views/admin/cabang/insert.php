<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Cabang</h2>
                        <a href="<?php echo base_url('Admin/Cabang') ?>" class="au-btn au-btn-icon btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <strong>Tambah</strong> Data
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="form-horizontal" id="form-input">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-kode" class=" form-control-label">kode</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="input-kode" name="kode" placeholder="Masukan kode" class="form-control" value="<?php echo set_value("kode") ?>">
                                        <small class="form-text text-muted"></small>
                                        <?php echo form_error("kode") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-nama" class=" form-control-label">Nama</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="input-nama" name="nama" placeholder="Masukan Nama" class="form-control" value="<?php echo set_value("nama") ?>">
                                        <small class="form-text text-muted">Hanya diisi huruf dan space</small>
                                        <?php echo form_error("nama") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-kota" class=" form-control-label">Kota</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="input-kota" name="kota" placeholder="Masukan Kota" class="form-control" value="<?php echo set_value("kota") ?>">
                                        <small class="form-text text-muted">Hanya diisi huruf dan space</small>
                                        <?php echo form_error("kota") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-alamat" class=" form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="alamat" id="input-alamat" rows="4" placeholder="Masukan Alamat" class="form-control"><?php echo set_value("alamat") ?></textarea>
                                        <?php echo form_error("alamat") ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" form="form-input">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" form="form-input">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

