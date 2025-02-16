#include <iostream>
#include <string>
#include <iomanip>  

using namespace std;

class Petshop {
private:
    int ID;           // ID produk
    string Nama;      // Nama produk
    string Kategori;  // Kategori produk
    int Harga;        // Harga produk

public:
    // Konstruktor default
    Petshop() {
        ID = 0;
        Nama = "";
        Kategori = "";
        Harga = 0;
    }

    // Konstruktor dengan parameter untuk inisialisasi objek dengan data awal
    Petshop(int id, string nama, string kategori, int harga) {
        ID = id;
        Nama = nama;
        Kategori = kategori;
        Harga = harga;
    }

    // Setter untuk mengubah ID produk
    void Set_ID(int id) {
        ID = id;
    }

    // Setter untuk mengubah nama produk
    void Set_Nama(string nama) {
        Nama = nama;
    }

    // Setter untuk mengubah kategori produk
    void Set_Kategori(string kategori) {
        Kategori = kategori;
    }
    // Setter untuk mengubah harga produk
    void Set_Harga(int harga) {
        Harga = harga;
    }
    
    // Getter untuk mengambil ID produk
    int Get_ID() {
        return ID;
    }

    // Getter untuk mengambil nama produk
    string Get_Nama() {  
        return Nama;
    }

    // Getter untuk mengambil kategori produk
    string Get_Kategori() {  
        return Kategori;
    }

    // Getter untuk mengambil harga produk
    int Get_Harga() {
        return Harga;
    }

    // Fungsi untuk menampilkan header tabel
    void tampilHeader() {
        cout << "+----+---------------------+----------------+-------------+" << endl;
        cout << "| ID | Nama                | Kategori       | Harga       |" << endl;
        cout << "+----+---------------------+----------------+-------------+" << endl;
    }

    // Fungsi untuk menampilkan footer tabel
    void tampilFooter() {
        cout << "+----+---------------------+----------------+-------------+" << endl;
    }

    // Fungsi untuk menampilkan satu baris data produk dalam format tabel
    void tampilBaris(int id, string nama, string kategori, int harga) {
        // Batasi panjang teks agar tidak merusak tampilan tabel
        if (nama.length() > 20) nama = nama.substr(0, 17) + "...";
        if (kategori.length() > 15) kategori = kategori.substr(0, 12) + "...";

        cout << "| " << left << setw(2) << id  << " "  // Kolom ID
             << "| " << setw(20) << nama  // Kolom Nama (20 karakter)
             << "| " << setw(15) << kategori  // Kolom Kategori (15 karakter)
             << "| Rp " << right << setw(8) << harga  << " |" << endl;  // Kolom Harga
    }

    // Destruktor untuk membersihkan memori jika diperlukan
    ~Petshop() {}
};
