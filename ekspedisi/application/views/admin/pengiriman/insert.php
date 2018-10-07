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
                                        <label for="input-fk_sopir" class=" form-control-label">Sopir</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_sopir" id="input-fk_sopir" class="form-control">
                                            <option disabled="" selected="" value="">Pilih Sopir</option>
                                            <?php foreach ($sopir as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_sopir").val("<?php echo set_value("fk_sopir") ?>");</script>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_tujuan" class=" form-control-label">Kota Tujuan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_tujuan" id="input-fk_tujuan" class="form-control">
                                            <option disabled="" selected="" value="">Pilih kota</option>
                                            <?php foreach ($kota as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->kota ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_tujuan").val("<?php echo set_value("fk_tujuan") ?>");</script>
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

