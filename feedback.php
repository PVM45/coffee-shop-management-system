<?php
if (isset($_POST['submit'])) {
  $nama   = htmlspecialchars($_POST['name']);
  $email  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subjek = htmlspecialchars($_POST['subject']);
  $pesan  = htmlspecialchars($_POST['message']);

  // Kirim ke email tetap: Taruh Co Admin
  $to = "taruhco.@gmail.com";

  // Format isi email
  $subject = "Pesan Baru dari $nama: $subjek";
  $message = "
    Kamu mendapat pesan baru dari form kontak Taruh Co:

    Nama Pengirim: $nama
    Email Pengirim: $email

    Pesan:
    $pesan
  ";

  $headers = "From: no-reply@taruhco.com\r\n";
  $headers .= "Reply-To: $email\r\n"; // agar admin bisa balas ke pengirim
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  if (mail($to, $subject, $message, $headers)) {
    // Redirect bawa status sukses
    header("Location: index.php?status=sukses");
    exit;
  } else {
    header("Location: index.php?status=gagal");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
}
