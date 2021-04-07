<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/rekap/editnilai'), 'class="form-horizontal"');;
?>

<div class="card">
    <div class="card-body">
     
        <div class="form-group">
            <label class="col-md-12 control-label">Kode Soal</label>
            <div class="col-md-5">
                <select name="kode_soal" required class="form-control" id="">
                    <option value="">-- Silakan Pilih --</option>
                    <?php foreach ($soal as $key) : ?>
                        <option value="<?= $key->id ?>"><?= $key->kode_soal ?> - <?= $key->nama_matkul?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12 control-label">Kode Nilai</label>
            <div class="col-md-5">
                <select name="kode_nilai" required class="form-control" id="">
                    <option value="">-- Silakan Pilih --</option>
                    <?php foreach ($nilai as $key) : ?>
                        <option value="<?= $key->id ?>"><?= $key->kode_nilai ?> - <?= $key->nama_nilai?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-12 control-label">Nilai</label>
            <div class="col-md-5">
                <input type="text" name="nilai_if" placeholder="Mahasiswa IF" class="form-control">
                <input type="text" name="nilai_si" placeholder="Mahasiswa SI" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-12 control-label">Tanggal Ujian</label>
            <div class="col-md-5">
                <input type="date" required="" name="tanggal_ujian" placeholder="IF" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-12 control-label">Tanggal Pengumpulan</label>
            <div class="col-md-5">
                <input type="date" required="" name="tanggal_pengumpulan" placeholder="IF" class="form-control">
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