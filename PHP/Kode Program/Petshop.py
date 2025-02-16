class Petshop:
    # Konstruktor untuk inisialisasi objek dengan atribut default
    def __init__(self, id=0, nama="", kategori="", harga=0):
        self.ID = id  # ID produk
        self.Nama = nama  # Nama produk
        self.Kategori = kategori  # Kategori produk
        self.Harga = harga  # Harga produk

    # Setter untuk mengubah ID produk
    def Set_ID(self, id):
        self.ID = id
    
    # Setter untuk mengubah nama produk
    def Set_Nama(self, nama):
        self.Nama = nama
    
    # Setter untuk mengubah kategori produk
    def Set_Kategori(self, kategori):
        self.Kategori = kategori
    
    # Setter untuk mengubah harga produk
    def Set_Harga(self, harga):
        self.Harga = harga
    
    # Getter untuk mengambil ID produk
    def Get_ID(self):
        return self.ID
    
    # Getter untuk mengambil nama produk
    def Get_Nama(self):
        return self.Nama
    
    # Getter untuk mengambil kategori produk
    def Get_Kategori(self):
        return self.Kategori
    
    # Getter untuk mengambil harga produk
    def Get_Harga(self):
        return self.Harga
    
    # Metode statis untuk menampilkan header tabel
    @staticmethod
    def tampil_header():
        print("+----+---------------------+----------------+-------------+")
        print("| ID | Nama                | Kategori       | Harga       |")
        print("+----+---------------------+----------------+-------------+")
    
    # Metode statis untuk menampilkan footer tabel
    @staticmethod
    def tampil_footer():
        print("+----+---------------------+----------------+-------------+")
    
    # Metode untuk menampilkan satu baris data produk dalam format tabel
    def tampil_baris(self):
        print(f"| {self.ID:<2} | {self.Nama[:19]:<19} | {self.Kategori[:14]:<14} | Rp {self.Harga:>8} |")
