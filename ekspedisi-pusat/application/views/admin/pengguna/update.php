<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Pengguna</h2>
                        <a href="<?php echo base_url('Admin/Pengguna') ?>" class="au-btn au-btn-icon btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Data
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="form-horizontal" id="form-input">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-nama" class=" form-control-label">Nama</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="input-nama" name="nama" placeholder="Masukan Nama" class="form-control" value="<?php echo $pengguna->nama ?>">
                                        <small class="form-text text-muted">Hanya diisi huruf dan space</small>
                                         <?php echo form_error("nama") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-alamat" class=" form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="alamat" id="input-alamat" rows="4" placeholder="Masukan Alamat" class="form-control"><?php echo $pengguna->alamat ?></textarea>
                                         <?php echo form_error("alamat") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-telp" class=" form-control-label">Telepon</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="input-telp" name="telp" placeholder="Masukan Telepon" class="form-control" value="<?php echo $pengguna->telp ?>">
                                         <?php echo form_error("telepon") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-email" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="input-email" name="email" placeholder="Masukan Email" class="form-control" value="<?php echo $pengguna->email ?>">
                                        <small class="help-block form-text">Masukan email yang valid</small>
                                         <?php echo form_error("email") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_level" class=" form-control-label">Level</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_level" id="input-fk_level" class="form-control">
                                            <option disabled="" selected="" value="">Pilih level</option>
                                            <?php foreach ($level as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_level").val("<?php echo $pengguna->fk_level ?>");</script>
                                         <?php echo form_error("level") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-nama" class=" form-control-label">Username</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="input-username" name="username" placeholder="Masukan Username" class="form-control" value="<?php echo $pengguna->username ?>">
                                        <small class="form-text text-muted">Hanya diisi huruf dan angka</small>
                                         <?php echo form_error("username") ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-password" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="input-password" name="password" placeholder="Masukan Password" class="form-control">
                                        <small class="help-block form-text">Minimal 6 karakter</small>
                                         <?php echo form_error("password") ?>
                                    </div>
                                </div>
                                
                               
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" form="form-input">
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

