 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <a href="<?= base_url('admin/matkul/add')?>" class="btn btn-primary">Tambah Data</a>
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
                         <th>Kode</th>
                         <th>Nama Matkul</th>
                         <th>SKS</th>
                         <th>Jenis Kelas</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                <?php $no=1; foreach ($matkul as $mk):?>
                     <tr>
                         <td><?= $no++ ?></td>
                         <td><?= $mk->kode_matkul ?></td>
                         <td><?= $mk->nama_matkul ?></td>
                         <td><?= $mk->sks ?></td>
                         <td><?= $mk->nama_kelas ?></td>
                         <td>
                             <a href="<?= base_url('admin/matkul/hapus/'.$mk->id)?>"  onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             <a href="<?= base_url('admin/matkul/edit/'.$mk->id)?>"  class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                     </tr>
                <?php endforeach ?>

                 <tbody>
                 </tbody>

             </table>
         </div>

       
     </div>
 </div>
 </div>

