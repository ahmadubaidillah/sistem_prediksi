<div class="page-header">
    <h1>Tambah Data</h1>
</div>
<form method="post">
    <div class="row">
        <div class="col-sm-6">
            <?php if ($_POST) include 'aksi.php' ?>
            <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d')) ?>" />
            </div>
            <div class="form-group">
                <label>Jumlah <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jumlah" value="<?= set_value('jumlah') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=data"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
    </div>
</form>