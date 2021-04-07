<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">

<header>

    <div class="row">
        <div class="col-md-2">
            <img src="<?= base_url('assets/img/stimik.png') ?>" width="150">
        </div>
        <div class="col-md-10">
            <center>
                <h3>Sekolah Tinggi Manajemen Informatika dan Komputer Bandung
                    <br>Jl Cikutra 113 Bandung - Jawa Barat - Indonesia <br>
                    <b>REKAP PERKULIAHAN SEMUA DOSEN</b><br>
                    <b>PERIODE : SEMUA TAHUN AKADEMIK</b>
                </h3>
            </center>
        </div>
    </div>
    <h5>DOSEN : SEMUA DOSEN</h5>
</header>

<body onclick="window.print()">
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

                                <td><?= $hargaNilai ?></td>
                                <td><?= $rek->jenis_ujian ?></td>
                                <td><?= $rek->nama_nilai ?></td>
                                <td>
                                    <?php echo $total = $hargaNilai + $hargaSoal ?>

                                </td>
                                <!-- <td><?= $rek->nominal ?> -->
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td>
                                <?php

                                $sum = 0;
                                foreach ($rekap_nominal as $rek) {
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

                                    $total = $hargaNilai + $hargaSoal;
                                    
                                    $sum += $total;
                                }
                                echo $sum;

                                ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <footer>
            <b>Catatan : Bila ada kesalahan agar menghubungi BAAK </b>
            <br><br>
            <div class="row">
                <div class="col-md-6" style="text-align: center;">
                    WAKIL KETUA II
                    <br><br><br><br>
                    Linda Apriyanti S.Kom, M.T
                </div>

                <div class="col-md-6" style="text-align: center;">
                    PEMBUAT LAPORAN
                    <br><br><br><br>
                    Nana
                </div>
            </div>
        </footer>