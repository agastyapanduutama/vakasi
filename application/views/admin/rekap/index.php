 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <a href="<?= base_url('admin/rekap/add')?>" class="btn btn-primary">Tambah Data</a>
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
                         <th>Nama matkul</th>
                         <th>Kode Soal</th>
                         <th>Dosen</th>
                         <th>Jumlah Soal</th>
                         <th>NILAI IF</th>
                         <th>NILAI SI</th>
                         <th>Jenis Ujian</th>
                         <th>Jenis Kelas</th>
                         <th>Status</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php $no = 1; foreach ($rekap as $rek) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $rek->nama_matkul ?></td>
                             <td><?= $rek->kode_soal ?></td>
                             <td><?= $rek->nama_dosen ?></td>
                             <td><?= $rek->jumlah_soal ?></td>
                             <td><?= $rek->nilai_if ?></td>
                             <td><?= $rek->nilai_si ?></td>
                             <td><?= $rek->jenis_ujian ?></td>
                             <td><?= $rek->nama_kelas ?></td>
                             <td><?php
                                if ($rek->status_soal == 1) {
                                    echo "Diserahkan";
                                }
                                if ($rek->status_soal == 2) {
                                    echo "Diproses";
                                }
                                if ($rek->status_soal == 3) {
                                    echo "Sebagian";
                                }?>
                             </td>
                             <td>
                                 <a href="<?= base_url('admin/rekap/hapus/'.$rek->id)?>"  onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                 <a href="<?= base_url('admin/rekap/edit/'.$rek->id)?>"  class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
              </td>
                         </tr>
                     <?php endforeach ?>
                 </tbody>

             </table>
         </div>


     </div>
 </div>
 </div>