<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/kelas/edit/'.$kelas->id), 'class="form-horizontal"');;
?>

<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label class="col-md-2 control-label">Nama kelas</label>
            <div class="col-md-5">
                <input type="text" value="<?= $kelas->nama_kelas?>" name="nama_kelas" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Kode kelas</label>
            <div class="col-md-5">
                <input type="text" value="<?= $kelas->kode_kelas?>" name="kode_kelas" class="form-control" required>
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