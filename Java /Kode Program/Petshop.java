import java.util.Formatter; // Digunakan untuk pemformatan teks dalam output tabel

public class Petshop {
    // Atribut kelas untuk menyimpan data produk
    private int ID;          // ID produk
    private String Nama;     // Nama produk
    private String Kategori; // Kategori produk
    private int Harga;       // Harga produk

    // Konstruktor default (tanpa parameter)
    public Petshop() {
        this.ID = 0;
        this.Nama = "";
        this.Kategori = "";
        this.Harga = 0;
    }

    // Konstruktor dengan parameter (untuk inisialisasi objek langsung dengan nilai tertentu)
    public Petshop(int id, String nama, String kategori, int harga) {
        this.ID = id;
        this.Nama = nama;
        this.Kategori = kategori;
        this.Harga = harga;
    }

    // Setter methods (untuk mengubah nilai atribut secara individu)
    public void Set_ID(int id) {
        this.ID = id;
    }

    public void Set_Nama(String nama) {
        this.Nama = nama;
    }

    public void Set_Kategori(String kategori) {
        this.Kategori = kategori;
    }

    public void Set_Harga(int harga) {
        this.Harga = harga;
    }

    // Getter methods (untuk mengambil nilai atribut secara individu)
    public int Get_ID() {
        return this.ID;
    }

    public String Get_Nama() {
        return this.Nama;
    }

    public String Get_Kategori() {
        return this.Kategori;
    }

    public int Get_Harga() {
        return this.Harga;
    }

    // Menampilkan header tabel untuk daftar produk
    public static void tampilHeader() {
        System.out.println("+----+---------------------+----------------+-------------+");
        System.out.println("| ID | Nama                | Kategori       | Harga       |");
        System.out.println("+----+---------------------+----------------+-------------+");
    }

    // Menampilkan footer tabel (garis bawah)
    public static void tampilFooter() {
        System.out.println("+----+---------------------+----------------+-------------+");
    }

    // Menampilkan satu baris data produk dalam format tabel
    public void tampilBaris(int id, String nama, String kategori, int harga) {
        System.out.printf("| %2d | %-19s | %-14s | Rp. %7d |\n", id, nama, kategori, harga);
    }
}
