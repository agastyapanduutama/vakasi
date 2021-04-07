<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/rekap/add'), 'class="form-horizontal"');;
?>

<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label class="col-md-2 control-label">Jenis Ujian</label>
            <div class="col-md-5">
                <select name="jenis_ujian" class="form-control" id="">
                    <option value="">-- Silakan Pilih --</option>
                    <option value="UAS">UAS</option>
                    <option value="UTS">UTS</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Semester</label>
            <div class="col-md-5">
                <select name="semester" class="form-control" id="">
                    <option value="">-- Silakan Pilih --</option>
                    <option value="1">GANJIL</option>
                    <option value="2">GENAP</option>
                    <option value="3">ANTARA</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Tahun</label>
            <div class="col-md-5">
                <select class="form-control" name="id_tahun">
                    <option> -- Silakan Pilih -- </option>
                    <?php foreach ($tahun as $th) : ?>
                        <!-- <option id="<?= $th->id ?>"><?= $th->nama_tahun ?> / <?= $th->tahun_akhir ?></option> -->
                        <option value="<?= $th->id ?>"><?= $th->nama_tahun ?> / <?= $th->tahun_akhir ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Kode Soal</label>
            <div class="col-md-5">
                <input type="text" readonly value="<?= $nourut?>" name="kode_soal" class="form-control" required>
            </div>
        </div>


        <div class="form-group" style="display: none;">
            <label class="col-md-2 control-label">Nilai</label>
            <div class="col-md-5">
                <input type="text" name="nilai_if" placeholder="IF" class="form-control">
                <input type="text" name="nilai_si" placeholder="SI" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Jumlah Soal</label>
            <div class="col-md-5">
                <input type="text" name="jumlah_soal" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">kode Dosen</label>
            <div class="col-md-5">
                <select name="kode_dosen" class="form-control" id="">
                    <option value=""> -- Silakan Pilih --</option>
                    <?php foreach ($dosen as $dos) : ?>
                        <option value="<?= $dos->id ?>"> <?= $dos->kode_dosen ?> - <?= $dos->nama_dosen ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Kode Matakuliah</label>
            <div class="col-md-5">
                <select name="kode_matkul" class="form-control" id="">
                    <option value=""> -- Silakan Pilih --</option>
                    <?php foreach ($matkul as $mat) : ?>
                        <option value="<?= $mat->id ?>"> <?= $mat->kode_matkul ?> - <?= $mat->nama_matkul ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Jenis Kelas</label>
            <div class="col-md-5">
                <select name="kode_kelas" class="form-control" id="">
                    <option value=""> -- Silakan Pilih --</option>
                    <?php foreach ($kelas as $kel) : ?>
                        <option value="<?= $kel->id ?>"> <?= $kel->kode_kelas ?> - <?= $kel->nama_kelas ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>



        <div class="form-group">
            <label class="col-md-2 control-label">Status</label>
            <div class="col-md-5">
                <select name="status" class="form-control" id="">
                    <option value="1">Diserahkan</option>
                    <option value="2">Diproses</option>
                    <option value="3">Sebagian</option>
                </select>
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

</html>