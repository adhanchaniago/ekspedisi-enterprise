<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Input Paket</h2>
                        <a href="<?php echo base_url('Admin/Pengiriman') ?>" class="au-btn au-btn-icon btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            Berdasarkan Tujuan<strong> Langsung</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php echo validation_errors(); ?>
                            <form action="" method="post" class="form-horizontal" id="form-input-direct">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_transaksi" class=" form-control-label">Resi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_transaksi" id="input-fk_transaksi" class="form-control">
                                            <option disabled="" selected="" value="">Pilih paket</option>
                                            <?php foreach ($transaksi['direct'] as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama_kota ?> <?php echo $value->resi ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_transaksi").val("<?php echo set_value("fk_transaksi") ?>");</script>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" class="btn btn-primary btn-sm" form="form-input-direct">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            Berdasarkan Tujuan<strong> Transit</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php echo validation_errors(); ?>
                            <form action="" method="post" class="form-horizontal" id="form-input-transit">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="input-fk_transaksi" class=" form-control-label">Resi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="fk_transaksi" id="input-fk_transaksi" class="form-control">
                                            <option disabled="" selected="" value="">Pilih paket</option>
                                            <?php foreach ($transaksi['transit'] as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama_kota ?> <?php echo $value->resi ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <script>$("#input-fk_transaksi").val("<?php echo set_value("fk_transaksi") ?>");</script>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" class="btn btn-primary btn-sm" form="form-input-transit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3" id="table-datatable">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>transaksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value): ?>
                                    <tr>
                                        <td><?php echo $value->id ?></td>
                                        <td><?php echo $value->transaksi_resi ?></td>
                                        <td>
                                                <!-- <div class="table-data-feature">
                                                    <a href="<?php echo base_url("Admin/Pengiriman/detail/".$value->id) ?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </a>
                                                </div> -->
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>

