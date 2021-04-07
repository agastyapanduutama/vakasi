<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/dosen/edit/'.$dosen->id), 'class="form-horizontal"');;
?>

<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label class="col-md-2 control-label">Nama Dosen</label>
            <div class="col-md-5">
                <input type="text" name="nama_dosen" value="<?=$dosen->nama_dosen?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Kode Dosen</label>
            <div class="col-md-5">
                <input type="text" name="kode_dosen" value="<?=$dosen->kode_dosen?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">NIDN</label>
            <div class="col-md-5">
                <input type="text" name="nidn" class="form-control" value="<?=$dosen->nidn?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Pendidikan Terakahir</label>
            <div class="col-md-5">
                <input type="text" value="<?=$dosen->pendidikan_terakhir?>" name="pendidikan_terakhir" class="form-control" required>
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