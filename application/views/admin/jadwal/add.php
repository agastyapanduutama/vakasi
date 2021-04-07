<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/jadwal/add'), 'class="form-horizontal"');;
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
                            <option value="<?= $mat->id ?>"> <?= $mat->kode_matkul ?> - <?= $mat->nama_matkul ?> - <?= $mat->nama_kelas ?> - (<?= $mat->sks ?>)</option>
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
                            <option value="<?= $dos->id ?>"> <?= $dos->kode_dosen ?> - <?= $dos->nama_dosen ?></option>
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
                            <option value="<?= $th->id ?>"> <?= $th->nama_tahun ?>/<?= $th->tahun_akhir ?></option>
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
                        <option value="senin">senin</option>
                        <option value="selasa">selasa</option>
                        <option value="rabu">rabu</option>
                        <option value="kamis">kamis</option>
                        <option value="jumat">jumat</option>
                        <option value="sabtu">sabtu</option>
                        <option value="minggu">minggu</option>
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
                    <input type="text" name="jam" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Tanggal ujian</label>
                </div>
                <div class="col-md-5">
                    <input type="date" name="tanggal_ujian" class="form-control" required>
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