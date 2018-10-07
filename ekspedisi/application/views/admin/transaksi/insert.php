<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Transaksi</h2>
                        <a href="<?php echo base_url('Admin/Transaksi') ?>" class="au-btn au-btn-icon btn-secondary">
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
                            <?php echo validation_errors(); ?>
                            <form action="" method="post" class="form-horizontal" id="form-input">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-nama" class=" form-control-label">Tanggal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="input-tanggal" name="tanggal" class="form-control" value="<?php echo date("Y-m-d h:i") ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-alamat" class=" form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="alamat" id="input-alamat" rows="4" placeholder="Masukan Alamat" class="form-control"><?php echo set_value("alamat") ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-berat" class=" form-control-label">Berat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="input-berat" name="berat" placeholder="Masukan Berat" class="form-control" value="1" min="0">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-deskripsi" class=" form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="deskripsi" id="input-deskripsi" rows="4" placeholder="Masukan Deskripsi" class="form-control"><?php echo set_value("deskripsi") ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_petugas" class=" form-control-label">Petugas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_petugas" id="input-fk_petugas" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Petugas</option>
                                            <?php foreach ($pengguna as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_petugas").val("<?php echo set_value("alamat") ?>");</script>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_pelanggan" class=" form-control-label">Pelanggan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_pelanggan" id="input-fk_pelanggan" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Pelanggan</option>
                                            <?php foreach ($pengguna as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_pelanggan").val("<?php echo set_value("alamat") ?>");</script>
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

