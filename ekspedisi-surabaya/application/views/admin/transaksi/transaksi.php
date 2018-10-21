<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Transaksi</h2>
                        <a href="<?php echo base_url('Admin/Transaksi/insert') ?>" class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>Tambah Data</a>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>tanggal</th>
                                        <th>penerima</th>
                                        <th>resi</th>
                                        <th>alamat</th>
                                        <th>berat</th>
                                        <th>deskripsi</th>
                                        <th>petugas</th>
                                        <th>pelanggan</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $value): ?>
                                        <tr>
                                            <td><?php echo $value->id ?></td>
                                            <td><?php echo $value->tanggal ?></td>
                                            <td><?php echo $value->penerima ?></td>
                                            <td><?php echo $value->resi ?></td>
                                            <td><?php echo $value->alamat ?></td>
                                           <td><?php echo $value->berat ?></td>
                                           <td><?php echo $value->deskripsi ?></td>
                                           <td><?php echo $value->petugas_nama ?></td>
                                           <td><?php echo $value->pelanggan_nama ?></td>
                                            <td>
                                                <?php 
                                                switch ($value->status) {
                                                   case 1:
                                                   echo "<span class='badge badge-warning'>Proses</span>";
                                                   break;
                                                   case 2:
                                                   echo "<span class='badge badge-primary'>Dikirim</span>";
                                                   break;
                                                   case 3:
                                                   echo "<span class='badge badge-info'>Sampai</span>";
                                                   break;
                                                   case 4:
                                                   echo "<span class='badge badge-success'>Selesai</span>";
                                                   break;
                                                   default:
                                                         // code...
                                                   break;
                                               } ?>
                                           </td>
                                       </tr>
                                   <?php endforeach ?>

                               </tbody>
                           </table>
                       </div>
                       <!-- END DATA TABLE-->
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