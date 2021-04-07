<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/matkul/add'), 'class="form-horizontal"');;
?>

<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label class="col-md-2 control-label">Nama matkul</label>
            <div class="col-md-5">
                <input type="text" name="nama_matkul" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Kode matkul</label>
            <div class="col-md-5">
                <input type="text" name="kode_matkul" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">SKS</label>
            <div class="col-md-5">
                <input type="text" name="sks" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Jenis Kelas</label>
            <div class="col-md-5">
                <select name="jenis_kelas" class="form-control" id="">
                    <option value=""> -- Silakan Pilih -- </option>
                    <?php foreach ($kelas as $kel) :?>
                        <option value="<?= $kel->id?>"><?= $kel->nama_kelas?></option>   
                    <?php endforeach ?>
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