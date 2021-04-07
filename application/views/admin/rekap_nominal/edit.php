<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/rekap/nominal/edit/' . $rekap_nominal->id), 'class="form-horizontal"');
?>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-2 control-label">Jenis Ujian</label>
                    <div class="col-md-5">
                        <p><?= $rekap_nominal->jenis_ujian ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Semester</label>
                    <div class="col-md-5">
                        <p><?php
                            if ($rekap_nominal->semester == '1') {
                                echo "GANJIL";
                            }
                            if ($rekap_nominal->semester == '2') {
                                echo "GENAP";
                            }
                            if ($rekap_nominal->semester == '3') {
                                echo "ANTARA";
                            }
                            ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Tahun</label>
                    <div class="col-md-5">
                        <p><?= $rekap_nominal->tahun ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Nilai</label>
                    <div class="col-md-5">
                        IF: <?= $rekap_nominal->nilai_if ?> <br>
                        SI : <?= $rekap_nominal->nilai_si ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Jumlah Soal</label>
                    <div class="col-md-5">
                        <p><?= $rekap_nominal->jumlah_soal ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">kode Dosen</label>
                    <div class="col-md-5">
                        <p><?= $rekap_nominal->nama_dosen ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Kode Matakuliah</label>
                    <div class="col-md-5">
                        <p><?= $rekap_nominal->nama_matkul ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Jenis Kelas</label>
                    <div class="col-md-5">
                        <p><?= $rekap_nominal->nama_kelas ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Status</label>
                    <div class="col-md-5">
                        <p>
                            <?php if ($rekap_nominal->status == '1') {
                                echo "Diserahkan";
                            }
                            if ($rekap_nominal->status == '2') {
                                echo "Diproses";
                            } ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label class="col-md-12 control-label">Kode Rekap Nominal</label>
                    <div class="col-md-5">
                        <input type="text" name="kode" readonly value="<?= $kode ?>" class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 control-label">Tanggal Ujian</label>
                    <div class="col-md-5">
                        <input type="text" name="" readonly value="<?= $rekap_nominal->tanggal_ujian ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 control-label">Tanggal Pengumpulan</label>
                    <div class="col-md-5">
                        <input type="text" name="" readonly value="<?= $rekap_nominal->tanggal_pengumpulan ?>" class="form-control">
                    </div>
                </div>

                <?php
                $ujian          = new DateTime($rekap_nominal->tanggal_ujian);
                $dikumpulkan    = new DateTime($rekap_nominal->tanggal_pengumpulan);
                $range          = $dikumpulkan->diff($ujian);
                // echo $range->d;
                // echo " Hari";
                ?>

                <div class="form-group">
                    <label class="col-md-12 control-label">Pengumpulan Waktu(hari)</label>
                    <div class="col-md-5">
                        <input type="text" name="" value="<?= $range->d ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 control-label">Harga Nilai</label>
                    <div class="col-md-5">
                        <input type="text" name="" id="txt1" value="<?= $rekap_nominal->harga_nilai ?>" class="form-control">
                    </div>
                </div>

                <?php

                $if = $rekap_nominal->nilai_if;
                $si = $rekap_nominal->nilai_si;

                if ($si == '') {
                    $si = 0;
                }
                if ($if == '') {
                    $if = 0;
                }

                $total =  $if + $si;
                ?>

                <div class="form-group">
                    <label class="col-md-12 control-label">Jumlah Mahasiswa</label>
                    <div class="col-md-5">
                        <input type="number" id="txt2" value="<?= $total ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 control-label">Harga/Nilai</label>
                    <div class="col-md-5">
                        <?php
                        if ($range->d <= 14) {
                            $harga = "4000";
                        } else {
                            $harga = "3000";
                        }
                        ?>
                        <input type="text" id="txt3" value="<?= $harga ?>" class="form-control">
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-md-12 control-label">Nominal</label>
                    <div class="col-md-5">
                        <input type="text" name="nominal" id="hasil" class="form-control">
                    </div>
                </div>
            </div>
        </div>



        <div class="form-group col-md-12">
            <div class="col-md-5">
                <button class="btn btn-success btn-sm" name="submit" type="submit">
                    <i class="fa fa-save"></i>Simpan
                </button>
                <button class="btn btn-info btn-sm" name="reset" type="reset">
                    <i class="fa fa-save"></i>reset
                </button>
            </div>
        </div>

    </div>
</div>

<?php echo form_close(); ?>
</body>
    <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('hasil').value = result;
            }
        }
    </script>

</html>