 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <a href="<?= base_url('admin/rekap/nilai/add') ?>" class="btn btn-primary">Tambah Data</a>
     </div>
 </div>

 <style>
     tr {
         cursor: pointer;
     }
 </style>
 <?php
    if ($this->session->flashdata('success')) {
        echo '<div class="alert alert-sm alert-success">';
        echo $this->session->flashdata('success');
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
                         <th>Matakuliah</th>
                         <th>SKS</th>
                         <th>Kelas</th>
                         <th>Hari</th>
                         <th>Jam</th>
                         <th>Dosen</th>
                         <th>Jumlah Soal</th>
                         <th>Jumlah Nilai</th>
                         <th>Status</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php $no = 1;
                        foreach ($rekap as $j) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $j->kode_matkul ?></td>
                             <td><?= $j->nama_matkul ?></td>
                             <td><?= $j->sks ?></td>
                             <td><?= $j->nama_kelas ?></td>
                             <td><?= $j->hari ?></td>
                             <td><?= $j->jam ?></td>
                             <td><?= $j->nama_dosen ?></td>
                             <td>
                                 <!-- Nilai IF atau SI tidak kosong -->
                                 <?php if ($j->jumlah_soal != NULL) : ?>
                                     <?= $j->jumlah_soal ?>
                                     <!--JIka Keduanya kosong  -->
                                 <?php else : ?>
                                     Soal belum diisi
                                 <?php endif ?>
                             </td>
                             <td>
                                 <!-- Nilai IF dan SI tidak kosong -->
                                 <?php if ($j->nilai_if != NULL && $j->nilai_si != NULL) : ?>
                                     (IF = <?= $j->nilai_if ?>) - (SI = <?= $j->nilai_si ?> )

                                     <!-- NIlai IF tidak kosong -->
                                 <?php elseif ($j->nilai_if != NULL && $j->nilai_si == NULL) : ?>
                                     (IF = <?= $j->nilai_if ?>)

                                     <!--Nilai SI Tidak Kosong  -->
                                 <?php elseif ($j->nilai_if == NULL && $j->nilai_si != NULL) : ?>
                                     (SI = <?= $j->nilai_si ?> )

                                     <!--JIka Keduanya kosong  -->
                                 <?php else : ?>
                                     Nilai belum diisi
                                 <?php endif ?>
                             </td>
                             <td>
                                 <!-- Nilai IF dan SI tidak kosong -->
                                 <?php if ($j->nilai_if != NULL || $j->nilai_si != NULL) : ?>
                                     Diserahkan
                                 <!--JIka Keduanya kosong  -->
                                 <?php else : ?>
                                     Diproses
                                 <?php endif ?>
                             </td>
                             <td>
                                 <a href="<?= base_url('admin/rekap/nilai/edit/' . $j->id) ?>" class="btn btn-warning btn-sm" title="Isi atau Edit Jumlah Soal"><i class="fa fa-edit"></i></a>
                             </td>
                         </tr>

                     <?php endforeach ?>
                 </tbody>
                 </tbody>

             </table>
         </div>


     </div>
 </div>
 </div>