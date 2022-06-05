<?php
include("core/init.php");

$error = "";

// Redirect kalau user sudah login
if (isset($_SESSION['user'])) header("Location:index.php");


// Validasi Register
if (isset($_POST['submit'])) {
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    if (!empty(trim($nama)) && !empty(trim($pass))) {
        if (cek_nama($nama) != 0) {
            if (cek_data($nama, $pass)) redirect_login($nama);
            else $error =  "Data ada yang salah";
        } else $error =  "Nama belum ada";
    } else $error = 'Tidak Boleh Kosong';
}

include("view/header.php");

// Menguji pesan Session
if (isset($_SESSION['msg'])) {
    flash_delete($_SESSION['msg']);
}
?>

<form action="login.php" method="post">
    <label for="">Nama</label><br />
    <input type="text" name="username"><br /><br />

    <label for="">Password</label><br />
    <input type="password" name="password"><br /><br />

    <input type="submit" name="submit" value="login">
    <br />

    <?php if ($error != '') { ?>
        <div id="error">
            <?= $error; ?>
        </div>
    <?php } ?>

</form>

<?php
include("view/footer.php");
?>