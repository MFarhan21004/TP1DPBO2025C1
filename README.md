### Janji
Saya Muhammad Farhan dengan NIM 2309323 mengerjakan Tugas Praktikum dan Latihan Modul 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

### Desain program
Terdiri dari satu kelas utama, yaitu Petshop.

Struktur Kelas Petshop

Atribut:
  ID → Identifikasi unik untuk setiap produk.
  Nama → Nama produk.
  Kategori → Jenis produk.
  Harga → Harga produk.
  Foto -> Foto Produk(Untuk PHP)
Metode:
  Set_ID(), Set_Nama(), Set_Kategori(), Set_Harga() → Mengubah atribut produk.
  Get_ID(), Get_Nama(), Get_Kategori(), Get_Harga() → Mengambil data produk.
  tampilHeader(), tampilFooter(), tampilBaris() → Menampilkan daftar produk dalam bentuk tabel.

### Alur Program

Program menampilkan menu utama dengan pilihan:
  1.Tambah Data
  2. Hapus Data
  3. Ubah Data
  4. Tampilkan Data
  5. Cari Data
  6. Keluar

1. Menambah Produk
   Pengguna memasukkan Nama, Kategori, dan Harga produk.
   Sistem memberikan ID unik secara otomatis.
   Data disimpan dalam array shop[].
2. Menghapus Produk
   Pengguna memasukkan ID produk yang ingin dihapus.
   Jika ditemukan, produk dihapus, dan data lain digeser ke kiri agar ID tetap berurutan.
3. Mengubah Data Produk
   Pengguna memasukkan ID produk yang ingin diubah.
   Jika ID ditemukan, pengguna bisa mengganti Nama, Kategori, dan Harga.
4. Menampilkan Semua Data
   Jika ada produk, program menampilkan daftar produk dalam bentuk tabel rapi.
   Jika tidak ada produk, ditampilkan pesan "Tidak ada data produk."
5. Mencari Produk
   Pengguna memasukkan ID produk yang dicari.
   Jika ditemukan, program menampilkan data produk tersebut.
   Jika tidak ditemukan, muncul pesan "ID tidak ditemukan."
6. Keluar dari Program
   Jika pengguna memilih Keluar (6), program berhenti.
