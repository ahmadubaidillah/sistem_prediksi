<div class="page-header">
    <h1>Data</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="data" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cari</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=data_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group ">
                <a class="btn btn-default" href="cetak.php?m=data" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Tangal</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $pg = new Paging();
            $limit = 25;
            $offset = $pg->get_offset($limit, _get('page'));
            $from = " FROM tb_data";
            $where = " WHERE (tanggal LIKE '%$q%')";
            $rows = $db->get_results("SELECT * $from $where ORDER BY id_data LIMIT $offset, $limit");
            $no = $offset;
            $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= date('M Y', strtotime($row->tanggal)) ?></td>
                    <td><?= number_format($row->jumlah) ?></td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="?m=data_ubah&ID=<?= $row->id_data ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=data_hapus&ID=<?= $row->id_data ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="panel-footer">
        <ul class="pagination"><?= $pg->show("m=data&q=$q&page=", $jumrec, $limit, _get('page')) ?></ul>
    </div>
</div>