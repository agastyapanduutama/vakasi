 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <a href="<?= base_url('admin/nilai/add') ?>" class="btn btn-primary">Tambah Data</a>
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
                         <th>Kode Nilai</th>
                         <th>Nama NIlai</th>
                         <th>Harga</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <?php $no = 1;
                    foreach ($nilai as $mk) : ?>
                     <tr>
                         <td><?= $no++ ?></td>
                         <td><?= $mk->kode_nilai ?></td>
                         <td><?= $mk->nama_nilai ?></td>
                         <td><?= $mk->harga_nilai ?></td>
                         <td>
                             <a href="<?= base_url('admin/nilai/hapus/' . $mk->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             <a href="<?= base_url('admin/nilai/edit/' . $mk->id) ?>"  class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                     </tr>
                 <?php endforeach ?>

                 <tbody>
                 </tbody>

             </table>
         </div>


     </div>
 </div>
 </div>