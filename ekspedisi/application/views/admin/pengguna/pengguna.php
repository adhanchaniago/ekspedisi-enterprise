<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">  

            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Pengguna</h2>
                        <a href="<?php echo base_url('Admin/Pengguna/insert') ?>" class="au-btn au-btn-icon au-btn--blue">
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
                                        <th>nama</th>
                                        <th>alamat</th>
                                        <th>telp</th>
                                        <th>email</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>level</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $value): ?>
                                        <tr>
                                            <td><?php echo $value->id ?></td>
                                            <td><?php echo $value->nama ?></td>
                                            <td><?php echo $value->alamat ?></td>
                                            <td><?php echo $value->telp ?></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><?php echo $value->username ?></td>
                                            <td><?php echo $value->password ?></td>
                                            <td><?php echo $value->level_nama ?></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="<?php echo base_url("Admin/Pengguna/update/".$value->id) ?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url("Admin/Pengguna/delete/".$value->id) ?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
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