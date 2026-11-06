<?php
$row = $db->get_row("SELECT * FROM tb_data WHERE id_data='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Periode</h1>
</div>
<form method="post">
    <div class="row">
        <div class="col-sm-6">
            <?php if ($_POST) include 'aksi.php' ?>
            <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal" value="<?= set_value('tanggal', $row->tanggal) ?>" />
            </div>
            <div class="form-group">
                <label>Jumlah <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jumlah" value="<?= set_value('jumlah', $row->jumlah) ?>" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
        <a class="btn btn-danger" href="?m=data"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
    </div>
</form>