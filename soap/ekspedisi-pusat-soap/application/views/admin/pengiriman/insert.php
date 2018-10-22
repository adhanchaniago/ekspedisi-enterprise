<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Pengiriman</h2>
                        <a href="<?php echo base_url('Admin/Pengiriman') ?>" class="au-btn au-btn-icon btn-secondary">
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
                                        <label for="input-fk_pengirim" class=" form-control-label">Nama Pengirim</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_pengirim" id="input-fk_pengirim" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Pengirim</option>
                                            <?php foreach ($pengirim as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_pengirim").val("<?php echo set_value("fk_pengirim") ?>");</script>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_cabang_ke" class=" form-control-label">Cabang Ke</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_cabang_ke" id="input-fk_cabang_ke" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Cabang</option>
                                            <?php foreach ($cabang as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->kota ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_cabang_ke").val("<?php echo set_value("fk_cabang_ke") ?>");</script>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_cabang_dari" class=" form-control-label">Cabang Dari</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_cabang_dari" id="input-fk_cabang_dari" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Cabang</option>
                                            <?php foreach ($cabang as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->kota ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_cabang_dari").val("<?php echo set_value("fk_cabang_dari") ?>");</script>
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

