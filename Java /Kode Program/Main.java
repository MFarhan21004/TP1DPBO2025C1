import java.util.Scanner; // Mengimpor kelas Scanner untuk membaca input dari pengguna

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Petshop[] shop = new Petshop[100]; // Array objek untuk menyimpan data produk
        int jumlahProduk = 0; // Variabel untuk menyimpan jumlah produk dalam array
        int Aksi, id, harga; // Variabel untuk pilihan menu, ID, dan harga produk
        String nama, kategori; // Variabel untuk menyimpan nama dan kategori produk
        boolean running = true; // Variabel untuk mengontrol loop program

        while (running) { // Loop utama program
            // Menampilkan menu utama
            System.out.println("+------------------------+");
            System.out.println("|         Petshop        |");
            System.out.println("+------------------------+");
            System.out.println("1. Tambah Data");
            System.out.println("2. Hapus Data");
            System.out.println("3. Ubah Data");
            System.out.println("4. Tampilkan Data");
            System.out.println("5. Cari Data");
            System.out.println("6. Keluar");
            System.out.print("Pilih Menu: ");
            Aksi = scanner.nextInt();
            scanner.nextLine(); // Membersihkan buffer input

            if (Aksi == 1) { // Tambah Data
                // Menentukan ID produk baru
                id = jumlahProduk > 0 ? shop[jumlahProduk - 1].Get_ID() + 1 : 1;
                System.out.println("ID: " + id);
                System.out.print("Masukkan Nama: ");
                nama = scanner.nextLine();
                System.out.print("Masukkan Kategori: ");
                kategori = scanner.nextLine();
                System.out.print("Masukkan Harga: ");
                harga = scanner.nextInt();

                // Menambahkan produk ke array
                shop[jumlahProduk] = new Petshop(id, nama, kategori, harga);
                jumlahProduk++; // Menambah jumlah produk yang tersimpan

                System.out.println("Data berhasil ditambahkan.\n");
            } 
            else if (Aksi == 2) { // Hapus Data
                System.out.print("Masukkan ID yang ingin dihapus: ");
                id = scanner.nextInt();

                int i = 0;
                boolean found = false;
                while (i < jumlahProduk) { // Mencari produk dengan ID yang cocok
                    if (shop[i].Get_ID() == id) {
                        // Menggeser data setelah produk yang dihapus agar tetap berurutan
                        for (int j = i; j < jumlahProduk - 1; j++) {
                            shop[j] = shop[j + 1];
                            shop[j].Set_ID(j+1); // Memperbarui ID agar tetap berurutan
                        }
                        shop[jumlahProduk - 1] = null; // Menghapus data terakhir yang sudah dipindahkan
                        jumlahProduk--; // Mengurangi jumlah produk yang tersimpan
                        System.out.println("Data berhasil dihapus.\n");
                        found = true;
                        break;
                    }
                    i++;
                }
                if (!found) {
                    System.out.println("ID tidak ditemukan.\n");
                }
            } 
            else if (Aksi == 3) { // Ubah Data
                System.out.print("Masukkan ID yang ingin diubah: ");
                id = scanner.nextInt();
                scanner.nextLine(); // Membersihkan buffer input

                int i = 0;
                boolean found = false;
                while (i < jumlahProduk) { // Mencari produk yang ingin diubah
                    if (shop[i].Get_ID() == id) {
                        // Memasukkan data baru
                        System.out.print("Masukkan Nama baru: ");
                        nama = scanner.nextLine();
                        shop[i].Set_Nama(nama);
                        System.out.print("Masukkan Kategori baru: ");
                        kategori = scanner.nextLine();
                        shop[i].Set_Kategori(kategori);
                        System.out.print("Masukkan Harga baru: ");
                        harga = scanner.nextInt();
                        shop[i].Set_Harga(harga);

                        System.out.println("Data berhasil diperbarui.\n");
                        found = true;
                        break;
                    }
                    i++;
                }
                if (!found) {
                    System.out.println("ID tidak ditemukan.\n");
                }
            } 
            else if (Aksi == 4) { // Tampilkan Data
                if (jumlahProduk == 0) {
                    System.out.println("Tidak ada data produk.\n");
                } else {
                    Petshop.tampilHeader(); // Menampilkan header tabel
                    int i = 0;
                    while (i < jumlahProduk) {
                        // Menampilkan setiap produk yang ada dalam array
                        shop[i].tampilBaris( shop[i].Get_ID(), shop[i].Get_Nama(), shop[i].Get_Kategori(), shop[i].Get_Harga());
                        i++;
                    }
                    Petshop.tampilFooter(); // Menampilkan footer tabel
                }
            } 
            else if (Aksi == 5) { // Cari Data
                System.out.print("Masukkan ID yang ingin dicari: ");
                id = scanner.nextInt();

                int i = 0;
                boolean found = false;
                while (i < jumlahProduk) { // Mencari produk berdasarkan ID
                    if (shop[i].Get_ID() == id) {
                        Petshop.tampilHeader();
                        shop[i].tampilBaris( shop[i].Get_ID(), shop[i].Get_Nama(), shop[i].Get_Kategori(), shop[i].Get_Harga());
                        Petshop.tampilFooter();
                        found = true;
                        break;
                    }
                    i++;
                }
                if (!found) {
                    System.out.println("ID tidak ditemukan.\n");
                }
            } 
            else if (Aksi == 6) { // Keluar dari program
                System.out.println("Terima kasih telah menggunakan program ini.\n");
                running = false; // Menghentikan loop utama
            } 
            else { // Jika input tidak valid
                System.out.println("Pilihan " + Aksi + " tidak tersedia.\n");
            }
        }
        scanner.close(); // Menutup Scanner untuk mencegah kebocoran memori
    }
}
