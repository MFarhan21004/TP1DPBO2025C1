#include "Petshop.cpp"  // Include file header Petshop.cpp
#include <iostream>     // Library untuk fungsi input-output

using namespace std;    // Namespace untuk fungsi input-output

int main() {
    Petshop shop[100];      // Array untuk menyimpan data produk
    int jumlahProduk = 0;   // Menyimpan jumlah produk dalam array
    int Aksi, id, harga;    // Variabel untuk menyimpan pilihan menu, ID, dan harga
    string nama, kategori;  // Variabel untuk menyimpan nama dan kategori produk

    do {
        // Tampilan menu utama
        cout << "+------------------------+" << endl;
        cout << "|         Petshop        |" << endl;
        cout << "+------------------------+" << endl;
        cout << "1. Tambah Data" << endl;
        cout << "2. Hapus Data" << endl;
        cout << "3. Ubah Data" << endl;
        cout << "4. Tampilkan Data" << endl;
        cout << "5. Cari Data" << endl;
        cout << "6. Keluar" << endl;
        cout << "Pilih Menu: ";
        cin >> Aksi;

        if (Aksi == 1) {
            // ID otomatis diisi berdasarkan indeks terakhir + 1
            id = jumlahProduk > 0 ? shop[jumlahProduk - 1].Get_ID() + 1 : 1;
            cout << "ID: " << id << endl;
            cout << "Masukkan Nama: ";
            cin.ignore();
            getline(cin, nama);
            cout << "Masukkan Kategori: ";
            getline(cin, kategori);
            cout << "Masukkan Harga: ";
            cin >> harga;

            // Tambah data ke dalam array
            shop[jumlahProduk] = Petshop(id, nama, kategori, harga);
            jumlahProduk++;

            cout << "Data berhasil ditambahkan.\n" << endl;
        } 
        else if (Aksi == 2) {
            cout << "Masukkan ID yang ingin dihapus: ";
            cin >> id;

            int i = 0;
            while (i < jumlahProduk) {
                if (shop[i].Get_ID() == id) {  // Jika ID cocok, hapus data
                    int j = i;
                    while (j < jumlahProduk - 1) {
                        shop[j] = shop[j + 1];  // Geser elemen ke kiri
                        shop[j].Set_ID(j + 1);  // Perbarui ID agar tetap berurutan
                        j++;
                    }
                    jumlahProduk--;  // Kurangi jumlah produk
                    cout << "Data berhasil dihapus dan ID diperbarui.\n" << endl;
                    break;  // Berhenti setelah menghapus satu data
                }
                i++;
            }

            if (i == jumlahProduk) {  // Jika ID tidak ditemukan
                cout << "ID tidak ditemukan.\n" << endl;
            }
        } 
        else if (Aksi == 3) {
            cout << "Masukkan ID yang ingin diubah: ";
            cin >> id;

            int i = 0;
            while (i < jumlahProduk) {
                if (shop[i].Get_ID() == id) {  // Jika ID cocok, lakukan perubahan
                    cout << "Masukkan Nama baru: " << endl;
                    cin.ignore();
                    getline(cin, nama);
                    cout << "Masukkan Kategori baru: " << endl;
                    getline(cin, kategori);
                    cout << "Masukkan Harga baru: "  << endl;
                    cin >> harga;

                    // Ubah data produk
                    shop[i].Set_Nama(nama);
                    shop[i].Set_Kategori(kategori);
                    shop[i].Set_Harga(harga);

                    cout << "Data berhasil diperbarui.\n" << endl;

                    break;  // Keluar dari loop setelah berhasil mengubah data
                }
                i++;
            }

            if (i == jumlahProduk) {  // Jika ID tidak ditemukan
                cout << "ID tidak ditemukan.\n" << endl;
            }
        } 
        else if (Aksi == 4) {
            // Menampilkan semua data produk dalam bentuk tabel
            if (jumlahProduk == 0) {
                cout << "Tidak ada data produk.\n" << endl;
            } else {
                shop[0].tampilHeader();
                for (int i = 0; i < jumlahProduk; i++) {
                    shop[i].tampilBaris(shop[i].Get_ID(), shop[i].Get_Nama(), shop[i].Get_Kategori(), shop[i].Get_Harga());
                }
                shop[0].tampilFooter();
            }
        }
        else if (Aksi == 5) {
            cout << "Masukkan ID yang ingin dicari: ";
            cin >> id;

            int i = 0;
            while (i < jumlahProduk) {
                if (shop[i].Get_ID() == id) {  // Jika ID ditemukan, tampilkan datanya
                    shop[0].tampilHeader();
                    shop[i].tampilBaris(shop[i].Get_ID(), shop[i].Get_Nama(), shop[i].Get_Kategori(), shop[i].Get_Harga());
                    shop[0].tampilFooter();
                    break;
                }
                i++;
            }

            if (i == jumlahProduk) {  // Jika ID tidak ditemukan
                cout << "ID tidak ditemukan.\n" << endl;
            }
        }
        else if (Aksi == 6) {
            // Keluar dari program
            cout << "Terima kasih telah menggunakan program ini.\n" << endl;
        }
        else {
            // Jika pilihan tidak tersedia
            cout << "Pilihan " << Aksi << " tidak tersedia.\n" << endl;
        }

    } while (Aksi != 6);

    return 0;
}
