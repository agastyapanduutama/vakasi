 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <!-- <a href="<?= base_url('admin/rekap/nominal/add') ?>" class="btn btn-primary">Tambah Data</a> -->
     </div>
 </div>

 <div class="card">
     <form method="POST" action="<?= base_url('rekap/filter') ?>">
         <div class="card-body">
             <div class="row">
                 <div class="col-md-6">
                     <select class="form-control" name="id_dosen" required="">
                         <option value="">-- Silakan Pilih -- </option>
                         <?php $dosen = $this->db->get('t_dosen')->result(); ?>
                         <?php foreach ($dosen as $key) : ?>
                             <option value="<?= $key->id ?>"><?= $key->kode_dosen ?> - <?= $key->nama_dosen ?></option>
                         <?php endforeach ?>
                     </select>
                 </div>
                 <div class="col-md-5">
                     <select class="form-control" name="id_tahun" required="">
                         <option value="">-- Silakan Pilih-- </option>
                         <?php $tahun = $this->db->get('t_tahun')->result(); ?>
                         <?php foreach ($tahun as $key) : ?>
                             <option value="<?= $key->id ?>"><?= $key->nama_tahun ?> - <?= $key->tahun_akhir ?></option>
                         <?php endforeach ?>
                     </select>
                 </div>
                 <div class="col-md-1">
                     <button type="submit" class="btn btn-primary">Filter</button>
                 </div>
             </div>
         </div>
     </form>
 </div>


 <a href="<?= base_url('rekap/nominal/print') ?>"><button class="btn btn-primary">PRINT</button></a>

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
                         <td>No</td>
                         <td>Tahun Akademik</td>
                         <td>Nama matkul</td>
                         <td>Dosen</td>
                         <td>Jumlah Soal</td>
                         <!-- 10 Ribu -->
                         <td>Harga Soal</td>
                         <td>NILAI IF</td>
                         <td>NILAI SI</td>
                         <!-- Khusus Eksekutif dll -->
                         <td>Harga Nilai</td>
                         <td>Jenis Ujian</td>
                         <td>Jenis Kelas</td>
                         <td>Jumlah</td>
                         <!-- <th>Aksi</th> -->
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($rekap_nominal as $rek) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <!-- <td><?=$rek->id_tahun?></td> -->
                             <td><?= $rek->nama_tahun ?>/<?= $rek->tahun_akhir ?> </td>
                             <?php
                                $if = $rek->nilai_if;
                                $si = $rek->nilai_si;
                                $if = ($if == '') ? 0 : 2;
                                $retIf = ($if == '') ? $if = 0 : $if = $rek->nilai_if;
                                $retSi = ($si == '') ? $si = 0 : $si = $rek->nilai_si;
                                $retNum = $retIf + $retSi;
                                $harga = 10000;
                                $soal = $retNum;
                                $jumlah = $rek->jumlah_soal;
                                $nilai = $rek->harga_nilai;
                                $hargaSoal = $harga * $jumlah;
                                $hargaNilai = $soal * $nilai;
                                ?>
                             <td><?= $rek->nama_matkul ?></td>
                             <td><?= $rek->nama_dosen ?></td>
                             <td><?= $rek->jumlah_soal ?></td>
                             <td><?= $harga * $jumlah ?></td>
                             <td><?= $rek->nilai_if ?></td>
                             <td><?= $rek->nilai_si ?></td>
                             <td><?= $rek->harga_nilai ?></td>
                             <td><?= $rek->jenis_ujian ?></td>
                             <td><?= $rek->nama_nilai ?>
                             <td><?= $rek->jumlah?></td>

                         </tr>
                     <?php endforeach ?>
                 </tbody>


             </table>
         </div>


     </div>
 </div>
 </div>