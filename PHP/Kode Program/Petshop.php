<?php
// Kelas Petshop untuk merepresentasikan setiap produk di toko hewan peliharaan
class Petshop {
    // Properti untuk menyimpan informasi produk
    private $ID;          // ID unik untuk setiap produk
    private $Nama;        // Nama produk
    private $Kategori;    // Kategori produk (misal: makanan, mainan, dll.)
    private $Harga;       // Harga produk dalam bentuk angka
    private $Foto;        // URL atau path gambar produk

    // Konstruktor: Fungsi yang akan dipanggil saat objek Petshop dibuat
    public function __construct($id, $nama, $kategori, $harga, $foto) {
        $this->ID = $id;                         // Set ID produk
        $this->Nama = $nama;                     // Set nama produk
        $this->Kategori = $kategori;             // Set kategori produk
        $this->Harga = max(0, (int)$harga);      // Set harga, pastikan tidak negatif
        $this->Foto = $foto;                     // Set foto produk
    }

    // ==================== GETTER ====================
    // Fungsi ini digunakan untuk mengambil nilai properti dari objek Petshop

    public function Get_ID() {
        return $this->ID;  // Mengembalikan ID produk
    }

    public function Get_Nama() {
        return $this->Nama;  // Mengembalikan nama produk
    }

    public function Get_Kategori() {
        return $this->Kategori;  // Mengembalikan kategori produk
    }

    public function Get_Harga() {
        return $this->Harga;  // Mengembalikan harga produk
    }

    public function Get_Foto() {
        return $this->Foto;  // Mengembalikan URL atau path gambar produk
    }

    // ==================== SETTER ====================
    // Fungsi ini digunakan untuk mengubah nilai properti produk

    public function Set_ID($id) {
        $this->ID = $id;  // Mengatur ulang ID produk
    }

    public function Set_Nama($nama) {
        $this->Nama = $nama;  // Mengubah nama produk
    }

    public function Set_Kategori($kategori) {
        $this->Kategori = $kategori;  // Mengubah kategori produk
    }

    public function Set_Harga($harga) {
        $this->Harga = max(0, (int)$harga);  // Mengubah harga dan memastikan nilainya tidak negatif
    }

    public function Set_Foto($foto) {
        $this->Foto = $foto;  // Mengubah foto produk
    }

    // ==================== TAMPILKAN HEADER TABEL ====================
    // Fungsi ini digunakan untuk menampilkan bagian header tabel pada halaman web
    public static function tampilHeader() {
        echo "<thead class='table-primary'> 
                <tr class='text-center'>  <!-- Set teks agar selalu berada di tengah -->
                    <th>ID</th>         <!-- Kolom untuk ID produk -->
                    <th>Nama</th>       <!-- Kolom untuk Nama produk -->
                    <th>Kategori</th>   <!-- Kolom untuk Kategori produk -->
                    <th>Harga</th>      <!-- Kolom untuk Harga produk -->
                    <th>Foto</th>       <!-- Kolom untuk Foto produk -->
                    <th>Aksi</th>       <!-- Kolom untuk tombol Edit & Hapus -->
                </tr>
              </thead>";
    }
}
?>