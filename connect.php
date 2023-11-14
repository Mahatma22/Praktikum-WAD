<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
	$conn = mysqli_connect("localhost", "root", "", "wad_modul3_afif");
// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
	if (!$conn)
		die ("Anda belum terkoneksi...");
// 
?>