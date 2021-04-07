 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <!-- <a href="<?= base_url('admin/rekap/add') ?>" class="btn btn-primary">Tambah Data</a> -->
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
                         <th>Matakuliah</th>
                         <th>SKS</th>
                         <th>Kelas</th>
                         <th>Hari</th>
                         <th>Jam</th>
                         <th>Dosen</th>
                         <th>Jumlah Soal</th>
                         <th>Status</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>

                 <tbody>
                      <?php $no=1; foreach ($rekap as $j):?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $j->kode_matkul?></td>
                            <td><?= $j->nama_matkul?></td>
                            <td><?= $j->sks?></td>
                            <td><?= $j->nama_kelas?></td>
                            <td><?= $j->hari?></td>
                            <td><?= $j->jam?></td>
                            <td><?= $j->nama_dosen?></td>
                            <td>
                                <!-- Nilai IF atau SI tidak kosong -->
                                <?php if($j->jumlah_soal != NULL):?>
                                    <?= $j->jumlah_soal?> 
                                <!--JIka Keduanya kosong  -->
                                <?php else:?>
                                    Soal belum diisi
                                <?php endif ?>
                            </td>
                            <td>
                                <!-- Soal IF atau SI tidak kosong -->
                                <?php if($j->jumlah_soal != NULL):?>
                                    Diserahkan 
                                <!--JIka Keduanya kosong  -->
                                <?php else:?>
                                    Diproses
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/rekap/edit/'.$j->id)?>"  class="btn btn-warning btn-sm" title="Isi atau Edit Jumlah Soal"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                 <?php endforeach?> 
                 </tbody>

             </table>
         </div>


     </div>
 </div>
 </div>