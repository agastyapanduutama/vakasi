<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/nilai/edit/'.$nilai->id), 'class="form-horizontal"');;
?>

<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label class="col-md-2 control-label">Nama Nilai</label>
            <div class="col-md-5">
                <input type="text" name="nama_nilai" value="<?= $nilai->nama_nilai?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Kode Nilai</label>
            <div class="col-md-5">
                <input type="text" name="kode_nilai" value="<?= $nilai->kode_nilai?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Harga</label>
            <div class="col-md-5">
                <input type="text" name="harga_nilai" value="<?= $nilai->harga_nilai?>" class="form-control" required>
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