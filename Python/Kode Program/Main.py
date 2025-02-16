from Petshop import Petshop  # Mengimpor kelas Petshop dari file terpisah

def main():
    shop = []  # List untuk menyimpan data produk
    jumlah_produk = 0  # Jumlah produk dalam daftar
    
    while True:
        # Menampilkan menu utama
        print("+------------------------+")
        print("|         Petshop        |")
        print("+------------------------+")
        print("1. Tambah Data")
        print("2. Hapus Data")
        print("3. Ubah Data")
        print("4. Tampilkan Data")
        print("5. Cari Data")
        print("6. Keluar")
        pilihan = input("Pilih Menu: ")  # Meminta input pilihan menu
        
        if pilihan == "1":  # Tambah Data
            id_produk = shop[-1].Get_ID() + 1 if shop else 1  # Menentukan ID baru
            print(f"ID: {id_produk}")
            nama = input("Masukkan Nama: ")
            kategori = input("Masukkan Kategori: ")
            harga = int(input("Masukkan Harga: "))
            
            # Menambahkan produk ke daftar
            shop.append(Petshop(id_produk, nama, kategori, harga))
            print("Data berhasil ditambahkan.\n")
            
        elif pilihan == "2":  # Hapus Data
            id_hapus = int(input("Masukkan ID yang ingin dihapus: "))
            
            i = 0
            while i < len(shop):
                if shop[i].Get_ID() == id_hapus:
                    del shop[i]  # Hapus produk dari daftar

                    # **Memperbarui ID produk agar tetap berurutan**
                    for j in range(i, len(shop)):
                        shop[j].Set_ID(j + 1)
                        
                    print("Data berhasil dihapus.\n")
                    break
                i += 1
            else:
                print("ID tidak ditemukan.\n")
            
        elif pilihan == "3":  # Ubah Data
            id_ubah = int(input("Masukkan ID yang ingin diubah: "))
            
            i = 0
            while i < len(shop):
                if shop[i].Get_ID() == id_ubah:
                    shop[i].Set_Nama(input("Masukkan Nama baru: "))
                    shop[i].Set_Kategori(input("Masukkan Kategori baru: "))
                    shop[i].Set_Harga(int(input("Masukkan Harga baru: ")))
                    print("Data berhasil diperbarui.\n")
                    break
                i += 1
            else:
                print("ID tidak ditemukan.\n")
            
        elif pilihan == "4":  # Tampilkan Data
            if not shop:
                print("Tidak ada data produk.\n")
            else:
                Petshop.tampil_header()  # Menampilkan header tabel
                
                # Menampilkan semua produk dalam daftar
                for produk in shop:
                    produk.tampil_baris()
                
                Petshop.tampil_footer()  # Menampilkan footer tabel
                print()
                
        elif pilihan == "5":  # Cari Data
            id_cari = int(input("Masukkan ID yang ingin dicari: "))
            
            i = 0
            while i < len(shop):
                if shop[i].Get_ID() == id_cari:
                    Petshop.tampil_header()
                    shop[i].tampil_baris()
                    Petshop.tampil_footer()
                    break
                i += 1
            else:
                print("ID tidak ditemukan.\n")
            
        elif pilihan == "6":  # Keluar dari program
            print("Terima kasih telah menggunakan program ini.\n")
            break
        
        else:
            print(f"Pilihan {pilihan} tidak tersedia.\n")

if __name__ == "__main__":
    main()
