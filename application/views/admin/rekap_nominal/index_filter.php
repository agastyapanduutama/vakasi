 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>

         <!-- <a href="<?= base_url('admin/rekap/nominal/add') ?>" class="btn btn-primary">Tambah Data</a> -->
     </div>
 </div>

<div class="card">
    <form method="POST" action="<?= base_url('rekap/filter')?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                    <select class="form-control" name="id_dosen" required="">
                        <option value="" >-- Silakan Pilih-- </option>
                        <?php $dosen = $this->db->get('t_dosen')->result(); ?>
                        <?php foreach ($dosen as $key): ?>
                            <option <?php if ($_POST['id_dosen'] == $key->id) { echo "selected"; } ?> value="<?= $key->id?>"><?= $key->kode_dosen?> - <?= $key->nama_dosen?></option>
                        <?php endforeach ?>
                    </select>
            </div>
            <div class="col-md-5">
                    <select class="form-control" name="id_tahun" required="">
                        <option value="" >-- Silakan Pilih-- </option>
                        <?php $tahun = $this->db->get('t_tahun')->result(); ?>
                        <?php foreach ($tahun as $key): ?>
                            <option <?php if ($_POST['id_tahun'] == $key->id) { echo "selected"; } ?> value="<?= $key->id?>"><?= $key->nama_tahun?> - <?= $key->tahun_akhir?></option>
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

<?php 
$a = $_POST['id_tahun'];
$b = $_POST['id_dosen'];
?>

 <form action="<?= base_url('rekap/filter/print')?>" method="POST">
     <input type="hidden" value="<?= $a ?>" name="a">
     <input type="hidden" value="<?= $b ?>" name="b">
     <button class="btn btn-primary" type="submit">PRINT</button>
 </form>
<!-- <a href="<?= base_url('rekap/filter/print')?>"><button class="btn btn-primary">PRINT</button></a> -->

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
                         <th>Tahun Akademik</th>
                         <th>Nama matkul</th>
                         <th>Dosen</th>
                         <th>Jumlah Soal</th>
                         <!-- 10 Ribu -->
                         <th>Harga Soal</th>
                         <th>NILAI IF</th>
                         <th>NILAI SI</th>
                         <!-- Khusus Eksekutif dll -->
                         <th>Harga Nilai</th>
                         <th>Jenis Ujian</th>
                         <th>Jenis Kelas</th>
                         <th>Jumlah</th>
                         <!-- <th>Aksi</th> -->
                     </tr>
                 </thead>

                 <tbody>
                     <?php $no = 1;
                        foreach ($rekap_nominal as $rek) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $rek->nama_tahun ?>/<?=$rek->tahun_akhir?>
                             </td>


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
                             <td><?= $harga * $jumlah?></td>
                             <td><?= $rek->nilai_if ?></td>
                             <td><?= $rek->nilai_si ?></td>

                             <td><?= $hargaNilai ?></td>
                             <td><?= $rek->jenis_ujian ?></td>
                             <td><?= $rek->jenis_kelas ?></td>
                             <td>
                                 <?php
                                    echo $total = $hargaNilai + $hargaSoal ?>

                             </td>
                             <!-- <td><?= $rek->nominal ?> -->
                             </td>
                             <!-- <td>
                                 <a href="<?= base_url('admin/rekap/nominal/edit/') ?><?= $rek->id ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                 <a href="<?= base_url('admin/rekap/nominal/hapus/' . $rek->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             </td> -->
                         </tr>
                     <?php endforeach ?>
                 </tbody>

             </table>
         </div>


     </div>
 </div>
 </div>