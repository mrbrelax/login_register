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
        // menguji nama kembar :
        if (cek_nama($nama) == 0) {
            // memasukkan ke database
            if (register_user($nama, $pass)) redirect_login($nama);
            else $error = 'Gagal daftar';
        } else $error = 'Nama sudah ada, tidak bisa daftar';
    } else $error =  'Tidak Boleh Kosong';
}


include("view/header.php");
?>

<form action="register.php" method="post">
    <label for="">Nama</label><br />
    <input type="text" name="username"><br /><br />

    <label for="">Password</label><br />
    <input type="password" name="password"><br /><br />

    <input type="submit" name="submit" value="register">

    <br />

    <?php if ($error != '') { ?>
        <div id="error">
            <?= $error; ?>
        </div>
    <?php } ?>

</form>

<?php include("view/footer.php"); ?>