<?php

echo validation_errors('<div class="alert alert-warning">', '</div>');

echo form_open(base_url('admin/rekap/nilai/edit/' . $this->uri->segment(5)), 'class="form-horizontal"');

?>

<div class="card">
    <div class="card-header">
        <h4> <?= $title ?></h4>
        <div class="card-header-form float-right">
        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Jumlah Soal IF</label>
                </div>
                <div class="col-md-5">
                    <input type="text" placeholder="Masukan Jumlah Soal IF" value="" name="nilai_if" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Jumlah Soal SI</label>
                </div>
                <div class="col-md-5">
                    <input type="text" placeholder="Masukan Jumlah Soal SI" value="" name="nilai_si" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Jenis Nilai</label>
                </div>
                <div class="col-md-5">
                    <select class="form-control" name="id_nilai">
                        <option> -- Silakan Pilih -- </option>
                        <?php foreach ($harga as $th) : ?>
                            <option value="<?= $th->id ?>"><?= $th->kode_nilai ?> - <?= $th->nama_nilai ?> 
                            <!-- ( <?= $th->harga_nilai ?> ) -->
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Jenis Ujian</label>
                </div>
                <div class="col-md-5">
                    <select class="form-control" name="id_ujian">
                        <option value="UTS"> UTS </option>
                        <option value="UAS"> UAS </option>
                    </select>
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