 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <a href="<?= base_url('admin/jadwal/add') ?>" class="btn btn-primary">Tambah Data</a>
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
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <?php $no = 1;
                    foreach ($jadwal as $j) : ?>
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
                             <?php
                                $cekNilai = $this->db->get_where('t_rekap', [
                                    'id_jadwal' => $j->id,
                                ])->row();
                                ?>
                             <?php if ($cekNilai->status == '0') { ?>
                                 <a href="<?= base_url('admin/jadwal/hapus/' . $j->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                 <a href="<?= base_url('admin/jadwal/edit/' . $j->id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                             <?php } else { ?>
                                 <button disabled class="btn btn-danger btn-sm" title="Data tidak dapat di edit karena sudah masuk ke rekap nilai"><i class="fa fa-times"></i> </button>
                             <?php } ?>


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