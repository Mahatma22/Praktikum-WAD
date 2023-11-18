<!-- Pada file ini kalian membuat coding untuk logika create / menambahkan mobil pada showroom -->

<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
    include ('connect.php');
    
// 

// (2) Buatlah perkondisian untuk memeriksa apakah permintaan saat ini menggunakan metode POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


// 

// (3) Jika sudah coba deh kalian ambil data dari form (CLUE : pakai POST)

    // a. Ambil data nama mobil
        $nama = $_POST['nama_mobil'];
        // b. Ambil data brand mobil
        $brand = $_POST['brand_mobil'];
        // c. Ambil data warna mobil
        $warna = $_POST['warna_mobil'];
        // d. Ambil data tipe mobil
        $tipe = $_POST['tipe_mobil'];
        // e. Ambil data harga mobil
        $harga = $_POST['harga_mobil'];

        // (4) Kalau sudah, kita lanjut Query / Menambahkan data pada SQL (Disini ada perintah untuk SQL), Masukkan ke tabel showroom_mobil (include setiap nama column)
        $query = "INSERT INTO showroom_mobil SET nama_mobil='$nama' , brand_mobil='$brand' , warna_mobil='$warna' , tipe_mobil='$tipe' , harga_mobil = '$harga'";
        mysqli_query($conn, $query);

        // (5) Buatkan kondisi jika eksekusi query berhasil
        if ($query) {
            echo "<script>alert('Data BERHASIL ditambahkan')</script>";
            echo "<meta http-equiv='refresh' content='1 url=form_create_mobil.php'>";
        }

        // (6) Jika terdapat kesalahan, buatkan eksekusi query gagalnya 
        else {
            echo "<script>alert('Data GAGAL ditambahkan: " . mysqli_error($conn)."')</script>";
            echo "<meta http-equiv='refresh' content='1 url=form_create_mobil.php'>";     
        }
    }
// (7) Tutup koneksi ke database setelah selesai menggunakan database
    mysqli_close($conn);
?>
