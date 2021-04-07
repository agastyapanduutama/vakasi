 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <a href="<?= base_url('admin/tahun/add')?>" class="btn btn-primary">Tambah Data</a>
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
                         <th>Tahun Awal</th>
                         <th>Tahun Akhir</th>
                         <th>Kode tahun</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <?php $no = 1;
                    foreach ($tahun as $kel) : ?>
                     <tr>
                         <td><?= $no++ ?></td>
                         <td><?= $kel->nama_tahun ?></td>
                         <td><?= $kel->tahun_akhir ?></td>
                         <td><?= $kel->kode_tahun ?></td>
                         <td>
                              <a href="<?= base_url('admin/tahun/hapus/'.$kel->id)?>"  onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             <a href="<?= base_url('admin/tahun/edit/'.$kel->id)?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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