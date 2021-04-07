 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>
         <a href="<?= base_url('admin/dosen/add')?>" class="btn btn-primary">Tambah Data</a>
     </div>
 </div>

 <style>
     tr {
         cursor: pointer;
     }
 </style>
<?php
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-sm alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }
    ?>
 <div class="card">
     <div class="card-body">
         <div class="table-responsive">
             <!-- <table id="list_surat" class="table table-striped table-bordered" style="width:100%"> -->
             <table id="example1" class="table table-striped table-bordered" style="width:100%">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>NIDN</th>
                         <th>Kode Dosen</th>
                         <th>Nama Dosen</th>
                         <th>Pendidikan Terakhir</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <?php $no=1; foreach ($dosen as $ds):?>
                     <tr>
                         <td><?= $no++ ?></td>
                         <td><?= $ds->nidn ?></td>
                         <td><?= $ds->kode_dosen ?></td>
                         <td><?= $ds->nama_dosen ?></td>
                         <td><?= $ds->pendidikan_terakhir ?></td>
                         <td>
                             <a href="<?= base_url('admin/dosen/hapus/'.$ds->id)?>"  onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             <a href="<?= base_url('admin/dosen/edit/'.$ds->id)?>"  class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                         </td>
                     </tr>
                <?php endforeach ?>
                 
                 <tbody>
                 </tbody>

             </table>
         </div>


     </div>
 </div>
 </div>