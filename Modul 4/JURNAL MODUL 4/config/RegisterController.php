<?php

require 'connect.php';

$pesan = "";

// (1) Mulai session

session_start();

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    $email = $_POST['email'];
    // b. Ambil nilai input name
    $name = $_POST['name'];
    // c. Ambil nilai input username
    $username = $_POST['username'];
    // d. Ambil nilai input password
    $pass = $_POST['password'];
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $passHash = password_hash($pass, PASSWORD_DEFAULT);

//

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email

    $queryEmail = "SELECT * FROM users WHERE email = '$email'";
    $hasil = mysqli_query ($conn, $queryEmail);

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
    if (mysqli_num_rows($hasil) == 0) {

    // a. Buatlah query untuk melakukan insert data ke dalam database
        $queryInsert = "INSERT INTO users (email, name, username, password) VALUES ('$email', '$name', '$username', '$pass')";
        $insert = mysqli_query ($conn, $queryInsert);

    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
        if ($insert) {
            $_SESSION['message'] = "SUKSES DAFTAR!!!";
            $_SESSION['color'] = "succes";
            header('Location: ../views/login.php');
        }
        else {
            $_SESSION['message'] = "GAGAL DAFTAR...";
        }
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
    
    }

// (5) Buat juga kondisi else
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
    else {
        $_SESSION['message'] = 'email sudah terdaftar';
        header('Location: ../views/register');
    }
//

?>