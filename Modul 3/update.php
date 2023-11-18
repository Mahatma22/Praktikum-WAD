<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include ("connect.php");

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];

    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function update ($conn, $data) {

        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        $id = $data['id'];
        $nama_mobil = $data['nama_mobil'];
        $brand_mobil = $data['brand_mobil'];
        $warna_mobil = $data['warna_mobil'];
        $tipe_mobil = $data['tipe_mobil'];
        $harga_mobil = $data['harga_mobil'];

        
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $sql = "
            UPDATE showroom_mobil SET
            nama_mobil = '$nama_mobil',
            brand_mobil = '$brand_mobil',
            warna_mobil = '$warna_mobil',
            tipe_mobil = '$tipe_mobil',
            harga_mobil = '$harga_mobil'
            WHERE id = $id
        ";
        // Eksekusi perintah SQL

        // Buatkan kondisi jika eksekusi query berhasil
        if ($conn->query($sql)===TRUE) {
            echo "<script>alert('Data BERHASIL diperbarui')</script>";
            // echo "<meta http-equiv='refresh' content='1 url=form_create_mobil.php'>";
        }

        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        else {
            echo "<script>alert('Data GAGAL diperbarui " . conn->error . "')</script>";
            // echo "<meta http-equiv='refresh' content='1 url=form_create_mobil.php'>";     
        }
    }

    // Panggil fungsi update dengan data yang sesuai
if ($id) {
    $dataUpdate = [
    'id' => $id,
    'nama_mobil' => 'nama mobil baru',
    'brand_mobil' => 'brand mobil baru',
    'warna_mobil' => 'warna mobil baru',
    'tipe_mobil' => 'tipe mobil baru',
    'harga_mobil' => 'harga mobil baru',
];
}
update($conn, $dataUpdate);
// Tutup koneksi ke database setelah selesai menggunakan database
    mysqli_close ($conn);

?>
