<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Check Paket</h2>
                        <a href="<?php echo base_url('Admin/Pengiriman') ?>" class="au-btn au-btn-icon btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3" id="table-datatable">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>resi</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value): ?>
                                    <tr>
                                        <td><?php echo $value->id ?></td>
                                        <td><?php echo $value->resi ?></td>
                                        <td>
                                            <?php 
                                            switch ($value->status) {
                                                 case 1:
                                                     echo "<span class='badge badge-warning'>Pengambilan</span>";
                                                     break;
                                                 case 2:
                                                     echo "<span class='badge badge-primary'>Terangkut</span>";
                                                     break;
                                                case 3:
                                                     echo "<span class='badge badge-success'>Terkirim</span>";
                                                     break;
                                                 default:
                                                     // code...
                                                     break;
                                             } ?>
                                        </td>
                                        <td>
                                                <div class="table-data-feature">
                                                    <a href="<?php echo base_url("Admin/Pengiriman/angkut/".$this->uri->segment(4)."/".$value->id) ?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Angkut">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

