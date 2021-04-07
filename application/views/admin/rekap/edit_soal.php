 <div class="card">
     <div class="card-header">
         <h4> <?= $title ?></h4>
         <div class="card-header-form float-right">
         </div>
     </div>
 </div>

<?php
echo validation_errors('<div class="alert alert-warning">', '</div>');
echo form_open(base_url('admin/rekap/edit/' . $this->uri->segment(4)), 'class="form-horizontal"');


// Cek Nilai

// if ($rekap->nilai_if != NULL) {
//     $if = $rekap->nilai_if?
// }elseif($rekap->nilai_si != NULL){
//     $si = $rekap->nilai_si?
// }else{

// }

?>




 <div class="card">
     <div class="card-body">
         <div class="form-group">
             <div class="row">
                 <div class="col-md-2">
                     <label class="control-label">Jumlah Soal</label>
                 </div>
                 <div class="col-md-5">
                     <input type="text" placeholder="Masukan Jumlah Soal IF" value="<?= $rekap->nilai_if?>" name="jumlah_soal" class="form-control" required>
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