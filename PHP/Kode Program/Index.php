<?php
include 'Petshop.php'; // Memasukkan file yang berisi class Petshop
session_start(); // Memulai session untuk menyimpan data sementara

// Pastikan session sudah ada
if (!isset($_SESSION['shop'])) {
    $_SESSION['shop'] = []; // Jika belum ada, inisialisasi dengan array kosong
}

// ==================== TAMBAH DATA ====================
if (isset($_POST['tambah'])) {
    $id = count($_SESSION['shop']) + 1; // ID otomatis bertambah
    $nama = trim($_POST['nama']); // Hilangkan spasi di awal dan akhir
    $kategori = trim($_POST['kategori']);
    $harga = is_numeric($_POST['harga']) ? $_POST['harga'] : 0; // Pastikan harga angka

    // Cek apakah ada file yang diupload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $targetDir = "Image/"; // Folder penyimpanan gambar
        $fileExt = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION); // Ambil ekstensi file
        $foto = time() . "_" . uniqid() . "." . $fileExt; // Nama unik berdasarkan waktu
        $targetFile = $targetDir . $foto;

        // Pindahkan file yang di-upload ke folder tujuan
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
            // File berhasil diupload
        } else {
            $foto = "default.jpg"; // Jika gagal upload, gunakan default
        }
    } else {
        $foto = "default.jpg"; // Jika tidak ada upload, gunakan default
    }

    // Simpan produk ke session
    if (!empty($nama) && !empty($kategori)) { // Pastikan nama dan kategori tidak kosong
        $_SESSION['shop'][] = new Petshop($id, $nama, $kategori, $harga, $foto);
        session_write_close(); // Simpan perubahan session
        header("Location: index.php"); // Refresh halaman
        exit;
    }
}


// ==================== HAPUS DATA ====================
if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];

    // Cari data yang akan dihapus
    foreach ($_SESSION['shop'] as $key => $produk) {
        if ($produk->Get_ID() == $id_hapus) {
            unset($_SESSION['shop'][$key]); // Hapus produk dari session
            break;
        }
    }

    // Reset indeks array agar ID tetap berurutan
    $_SESSION['shop'] = array_values($_SESSION['shop']);

    // Perbarui ID produk setelah penghapusan
    foreach ($_SESSION['shop'] as $index => $produk) {
        $produk->Set_ID($index + 1);
    }

    session_write_close();
    header("Location: index.php"); // Refresh halaman
    exit;


}

// ==================== EDIT DATA ====================
if (isset($_POST['edit'])) {
    $id_edit = $_POST['id'];

    // Cari produk yang ingin diedit
    foreach ($_SESSION['shop'] as $produk) {
        if ($produk->Get_ID() == $id_edit) {
            $produk->Set_Nama($_POST['nama']);
            $produk->Set_Kategori($_POST['kategori']);
            $produk->Set_Harga($_POST['harga']);

            // Cek apakah ada file yang diupload
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $targetDir = "Image/"; // Folder penyimpanan gambar
                $fileExt = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)); // Ambil ekstensi file
                $allowedExt = ['jpg', 'jpeg', 'png', 'gif']; // Ekstensi yang diizinkan
                
                if (in_array($fileExt, $allowedExt)) {
                    $foto = time() . "_" . uniqid() . "." . $fileExt; // Nama unik berdasarkan waktu
                    $targetFile = $targetDir . $foto;

                    // Pindahkan file yang di-upload ke folder tujuan
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                        $produk->Set_Foto($foto); // Simpan nama file baru
                    }
                }
            }

            break;
        }
    }

    session_write_close();
    header("Location: index.php");
    exit;
}

// ==================== PENCARIAN DATA ====================
$hasilPencarian = [];

    if (isset($_POST['search'])) {
        $keyword = strtolower(trim($_POST['keyword']));

        foreach ($_SESSION['shop'] as $produk) {
            if (strpos(strtolower($produk->Get_Nama()), $keyword) !== false || 
                strpos(strtolower($produk->Get_Kategori()), $keyword) !== false) {
                $hasilPencarian[] = $produk;
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-4">
    <h2 class="text-center mb-4">Petshop Management</h2>

    <div class="row">
        <!-- Form Tambah Data -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Tambah Produk</div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama Produk:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori:</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga:</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Foto:</label>
                <input type="file" name="foto" class="form-control" accept="Image/*">
            </div>
            <button type="submit" name="tambah" class="btn btn-success">Tambah Produk</button>
        </form>

                </div>
            </div>
        </div>

        <!-- Form Edit Data -->
        <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">Edit Produk</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk:</label>
                        <input type="text" name="nama" id="edit-nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori:</label>
                        <input type="text" name="kategori" id="edit-kategori" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga:</label>
                        <input type="number" name="harga" id="edit-harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Produk:</label>
                        <input type="file" name="foto" id="edit-foto" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" name="edit" class="btn btn-warning">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- Form Pencarian Produk -->
    <div class="row mb-4">
        <div class="col-md-12">
            <form method="POST" class="d-flex justify-content-end">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Cari produk..." required>
                <button type="submit" name="search" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>


    <!-- Tabel Hasil Pencarian (Ditampilkan Hanya Jika Ada Pencarian) -->
    <?php if (isset($_POST['search'])) { ?>
        <div class="card text-center">
            <div class="card-header bg-warning text-white">Hasil Pencarian</div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center align-middle">
                    <?php Petshop::tampilHeader(); ?>
                    <tbody>
                        <?php if (count($hasilPencarian) > 0) {
                            foreach ($hasilPencarian as $produk) { ?>
                                <tr>
                                    <td><?= $produk->Get_ID(); ?></td>
                                    <td><?= $produk->Get_Nama(); ?></td>
                                    <td><?= $produk->Get_Kategori(); ?></td>
                                    <td>Rp <?= number_format($produk->Get_Harga(), 0, ',', '.'); ?></td>
                                    <td><img src="Image/<?= $produk->Get_Foto(); ?>" alt="<?= $produk->Get_Nama(); ?>" width="100"></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="editProduk(<?= $produk->Get_ID(); ?>, '<?= $produk->Get_Nama(); ?>', '<?= $produk->Get_Kategori(); ?>', <?= $produk->Get_Harga(); ?>, '<?= $produk->Get_Foto(); ?>')">Edit</button>
                                        <a href="index.php?hapus=<?= $produk->Get_ID(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr><td colspan="6" class="text-center text-danger">Produk tidak ditemukan</td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>

    <!-- Tabel Semua Produk -->
    <div class="card text-center mt-4">
        <div class="card-header bg-secondary text-white">Daftar Semua Produk</div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center align-middle">
                <?php Petshop::tampilHeader(); ?>
                <tbody>
                    <?php foreach ($_SESSION['shop'] as $produk) { ?>
                        <tr>
                            <td><?= $produk->Get_ID(); ?></td>
                            <td><?= $produk->Get_Nama(); ?></td>
                            <td><?= $produk->Get_Kategori(); ?></td>
                            <td>Rp <?= number_format($produk->Get_Harga(), 0, ',', '.'); ?></td>
                            <td><img src="Image/<?= $produk->Get_Foto(); ?>" alt="<?= $produk->Get_Nama(); ?>" width="100"></td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editProduk(<?= $produk->Get_ID(); ?>, '<?= $produk->Get_Nama(); ?>', '<?= $produk->Get_Kategori(); ?>', <?= $produk->Get_Harga(); ?>, '<?= $produk->Get_Foto(); ?>')">Edit</button>
                                <a href="index.php?hapus=<?= $produk->Get_ID(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
</div>

<script>
    // Fungsi untuk mengisi data di form edit ketika tombol edit ditekan
    function editProduk(id, nama, kategori, harga, foto) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-kategori').value = kategori;
        document.getElementById('edit-harga').value = harga;
        document.getElementById('edit-foto').value = foto;
    }
</script>

</body>
</html>
