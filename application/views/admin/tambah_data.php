<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
        }
        .sidebar {
            background-color:rgb(44, 106, 129);
            height: 100vh;
            color: #fff;
            position: sticky;
            top: 0;
            overflow-y: auto;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #adb5bd;
        }
        .nav-link.active {
            background-color: #adb5bd;
            color: #343a40;
            border-radius: 3px;
        }
        .nav-link.active:hover {
            background-color: #ced4da;
        }
        .sidebar-icon {
            font-size: 1.2rem;
        }
        .avatar-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .avatar-container img {
            width: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar d-flex flex-column justify-content-between p-4">
                <div>
                    <div class="avatar-container">
                        <img src="<?= base_url('assets/img/avatar.png') ?>" alt="Avatar">
                        <h6 class="mt-2">Admin</h6>
                        <p>-</p>
                    </div>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="<?= base_url('admin') ?>" class="nav-link d-flex align-items-center gap-2">
                                <i class="fas fa-home sidebar-icon"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="<?= base_url('admin/page_tambah_data') ?>" class="nav-link d-flex align-items-center gap-3 active">
                                <i class="fas fa-user-plus sidebar-icon"></i><span>Tambah Data</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href="<?= base_url('welcome/keluar') ?>" class="btn btn-danger w-100 d-flex align-items-center gap-2 justify-content-center">
                        <i class="fas fa-sign-out-alt"></i>Keluar
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-10 p-4">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Data Mahasiswa</h4>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                            
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Mahasiswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/tambah_mahasiswa') ?>" method="post">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                                        <option value="Laki-Laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nim" class="form-label">NIM</label>
                                                    <input type="text" class="form-control" id="nim" name="nim" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kelas" class="form-label">Kelas</label>
                                                    <input type="text" class="form-control" id="kelas" name="kelas" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mahasiswa as $mhs): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $mhs->nama ?></td>
                                    <td><?= $mhs->jenis_kelamin ?></td>
                                    <td><?= $mhs->nim ?></td>
                                    <td><?= $mhs->kelas ?></td>
                                    <td>Aktif</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $mhs->user_id ?>">Edit</button>
                                        <a href="<?= base_url('admin/delete_mahasiswa/' . $mhs->user_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $mhs->user_id ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="editModalLabel">Edit Data Mahasiswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-black">
                                                <form method="POST" action="<?= base_url('admin/edit_mahasiswa/' . $mhs->user_id) ?>">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs->nama ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" value="<?= $mhs->jenis_kelamin ?>" required>
                                                            <option value="Laki-Laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nim" class="form-label">NIM</label>
                                                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs->nim ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kelas" class="form-label">Kelas</label>
                                                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $mhs->kelas ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="text" class="form-control" id="password" name="password">(kosongkan jika tidak ingin merubah password)
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Edit -->

                            <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
