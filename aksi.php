<?php
require_once 'functions.php';

/** LOGIN */
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login']);
    header("location:index.php?m=login");
} else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
}

/** data */
elseif ($mod == 'data_tambah') {
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    if ($jumlah == '' || $tanggal == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_data (jumlah, tanggal) VALUES ('$jumlah', '$tanggal')");
        redirect_js("index.php?m=data");
    }
} else if ($mod == 'data_ubah') {
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    if ($tanggal == '' || $jumlah == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_data SET tanggal='$tanggal', jumlah='$jumlah' WHERE id_data='$_GET[ID]'");
        redirect_js("index.php?m=data");
    }
} else if ($act == 'data_hapus') {
    $db->query("DELETE FROM tb_data WHERE id_data='$_GET[ID]'");
    header("location:index.php?m=data");
}
