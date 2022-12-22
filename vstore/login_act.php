<?php
// mengaktifkan session php
// session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$ceklog1 = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");
$ceklog2 = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukn
// $cek = mysqli_num_rows($cekadmin);

$dataadmin = mysqli_fetch_array($ceklog1);
$datauser = mysqli_fetch_array($ceklog2);

$cekadmin = $dataadmin['username'];
$nm_admin = $dataadmin['nm_lengkap'];
$cekuser = $datauser['username'];
$nm_user = $datauser['nm_lengkap'];
$id = $datauser['id_user'];
$akses = $datauser['akses'];

if ($cekadmin == $username) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['nm_lengkap'] = $nm_admin;
	header("location:admin");
} else if ($cekuser == $username) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['nm_lengkap'] = $nm_user;
	$_SESSION['id_user'] = $id;
	$_SESSION['akses'] = $akses;
	header("location:index.php");
} else {
	header("location:login.php?pesan=gagal");
}
