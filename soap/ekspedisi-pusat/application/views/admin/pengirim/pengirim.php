<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Pengirim</h2>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                     <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>kode</th>
                                        <th>nama pengirim</th>
                                        <th>cabang ke</th>
                                        <th>cabang dari</th>
                                        <th>status</th>
                                        <th>deskripsi status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $value): ?>
                                        <tr>
                                            <td><?php echo $value->id ?></td>
                                            <td><?php echo $value->kode ?></td>
                                            <td><?php echo $value->nama_pengirim ?></td>
                                            <td><?php echo $value->kota_ke ?></td>
                                            <td><?php echo $value->kota_dari ?></td>
                                            <td>
                                                <?php 
                                                switch ($value->status) {
                                                   case 1:
                                                   echo "<span class='badge badge-warning'>Mengambil Paket</span>";
                                                   break;
                                                   case 2:
                                                   echo "<span class='badge badge-primary'>Berangkat</span>";
                                                   break;
                                                   case 3:
                                                   echo "<span class='badge badge-info'>Menaruh Paket</span>";
                                                   break;
                                                   case 4:
                                                   echo "<span class='badge badge-success'>Selesai</span>";
                                                   break;
                                                   default:
                                                         // code...
                                                   break;
                                               } ?>
                                           </td>
                                            <td><?php echo $value->deskripsi_status ?></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="<?php echo base_url("Admin/Pengirim/detail/".$value->id) ?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>