<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/jadwal/edit/'. $jadwal->id ), 'class="form-horizontal"');;
?>

<div class="card">
    <div class="card-body">


        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Matakuliah</label>
                </div>
                <div class="col-md-5">
                    <select name="id_matkul" class="form-control" id="">
                        <option value=""> -- Silakan Pilih --</option>
                        <?php foreach ($matkul as $mat) : ?>
                            <option <?php if ($jadwal->id_matkul == $mat->id) { echo "selected"; }?> value="<?= $mat->id ?>"> <?= $mat->kode_matkul ?> - <?= $mat->nama_matkul ?> - <?= $mat->nama_kelas ?> - (<?= $mat->sks ?>)</option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Dosen</label>
                </div>
                <div class="col-md-5">
                    <select name="id_dosen" class="form-control" id="">
                        <option value=""> -- Silakan Pilih --</option>
                        <?php foreach ($dosen as $dos) : ?>
                            <option <?php if ($jadwal->id_dosen == $dos->id) { echo "selected"; }?> value="<?= $dos->id ?>"> <?= $dos->kode_dosen ?> - <?= $dos->nama_dosen ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Tahun Akademik</label>
                </div>
                <div class="col-md-5">
                    <select name="id_tahun" class="form-control" id="">
                        <option value=""> -- Silakan Pilih --</option>
                        <?php foreach ($tahun as $th) : ?>
                            <option <?php if ($jadwal->id_tahun == $th->id) { echo "selected"; }?> value="<?= $th->id ?>"> <?= $th->nama_tahun ?>/<?= $th->tahun_akhir ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Hari</label>
                </div>
                <div class="col-md-5">
                    <select class="form-control" name="hari">
                        <option <?php if ($jadwal->hari == "senin") {echo "selected";}?> value="senin">senin</option>
                        <option <?php if ($jadwal->hari == "selasa") {echo "selected";}?> value="selasa">selasa</option>
                        <option <?php if ($jadwal->hari == "rabu") {echo "selected";}?> value="rabu">rabu</option>
                        <option <?php if ($jadwal->hari == "kamis") {echo "selected";}?> value="kamis">kamis</option>
                        <option <?php if ($jadwal->hari == "jumat") {echo "selected";}?> value="jumat">jumat</option>
                        <option <?php if ($jadwal->hari == "sabtu") {echo "selected";}?> value="sabtu">sabtu</option>
                        <option <?php if ($jadwal->hari == "minggu") {echo "selected";}?> value="minggu">minggu</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Jam</label>
                </div>
                <div class="col-md-5">
                    <input type="text" value="<?= $jadwal->jam?>" name="jam" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Tanggal ujian</label>
                </div>
                <div class="col-md-5">
                    <input type="date" value="<?= $jadwal->tanggal_ujian?>" name="tanggal_ujian" class="form-control" required>
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

</html>