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
                                        <label for="input-fk_kota" class=" form-control-label">Kota Tujuan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_kota" id="input-fk_kota" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Kota</option>
                                            <?php foreach ($kota as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->kota ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_kota").val("<?php echo set_value("fk_kota") ?>");</script>
                                    </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="input-penerima" class=" form-control-label">Nama Penerima</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="input-penerima" name="penerima" placeholder="Masukan penerima" class="form-control" value="<?php echo set_value("penerima") ?>">
                                            <small class="form-text text-muted">Hanya diisi huruf dan space</small>
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
                                        <label for="input-fk_jenis" class=" form-control-label">Jenis</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_jenis" id="input-fk_jenis" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Jenis</option>
                                            <?php foreach ($jenis as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_jenis").val("<?php echo set_value("fk_jenis") ?>");</script>
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
                                        <input type="text" disabled class="form-control" value="<?php echo $this->session->userdata('logged_in')['nama'] ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_petugas" class=" form-control-label">Pelanggan Baru</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class="switch switch-3d switch-primary mr-3">
                                            <input type="checkbox" id="input-create-new" class="switch-input" checked="true" name="pelanggan_baru">
                                            <span class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                </div>
                                <script>
                                    $('#input-create-new').change(function(){
                                        if($(this).is(':checked')){
                                            $("#pelanggan-new").show();
                                            $('#pelanggan-member').hide();
                                        }else{
                                            $("#pelanggan-new").hide();
                                            $('#pelanggan-member').show();
                                        }
                                    });
                                </script>



                                <div id="pelanggan-new">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="input-nama" class=" form-control-label">Nama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="input-nama" name="pengguna_nama" placeholder="Masukan Nama" class="form-control" value="<?php echo set_value("nama") ?>">
                                            <small class="form-text text-muted">Hanya diisi huruf dan space</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="input-alamat" class=" form-control-label">Alamat</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="pengguna_alamat" id="input-alamat" rows="4" placeholder="Masukan Alamat" class="form-control"><?php echo set_value("alamat") ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="input-telp" class=" form-control-label">Telepon</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="input-telp" name="pengguna_telp" placeholder="Masukan Telepon" class="form-control" value="<?php echo set_value("telp") ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="input-email" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="input-email" name="pengguna_email" placeholder="Masukan Email" class="form-control" value="<?php echo set_value("email") ?>">
                                            <small class="help-block form-text">Masukan email yang valid</small>
                                        </div>
                                    </div>
                                </div>
                                <div id="pelanggan-member" style="display: none;">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="input-fk_pelanggan" class=" form-control-label">Pelanggan</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="fk_pelanggan" id="input-fk_pelanggan" class="form-control">
                                                <option disabled="" selected="" value="">Pilih Pelanggan</option>
                                                <?php foreach ($pelanggan as $value): ?>
                                                    <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <script>$("#input-fk_pelanggan").val("<?php echo set_value("fk_pelanggan") ?>");</script>
                                        </div>
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

