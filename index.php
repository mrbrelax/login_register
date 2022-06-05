<?php
include("core/init.php");

if (!isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location:login.php');
}


include("view/header.php");
?>

<h1>Halaman Profile <?php echo $_SESSION['user']; ?></h1><br />

<!-- Cuman Admin Yang bisa lihat -->
<?php if(cek_status($_SESSION['user'])){; ?>
<div>Hallo Admin</div>
<?php } ?>

<?php include("view/footer.php"); ?>