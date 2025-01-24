<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
        }
        .sidebar {
            background-color: rgb(44, 106, 129);
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
        .table-container-title {
            color: #343a40;
        }
        .card {
            background-color: #343a40;
        }
        .card .text-white {
            color: #ffffff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
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
                        <h6 class="mt-2">Mahasiswa</h6>
                        <p>-</p>
                    </div>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="<?= base_url('mahasiswa') ?>" class="nav-link d-flex align-items-center gap-3">
                                <i class="fas fa-home sidebar-icon"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="<?= base_url('mahasiswa/page_nilai') ?>" class="nav-link d-flex align-items-center gap-2 active">
                                <i class="fas fa-book-open sidebar-icon"></i><span>Nilai</span>
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
                            <h4>Rekap Nilai Mahasiswa</h4>
                        </div>
                        <table class="table mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($rekap_nilai)): ?>
                                    <?php foreach ($rekap_nilai as $nilai): ?>
                                        <tr>
                                            <td><?= $nilai['mahasiswa_nama'] ?></td>
                                            <td><?= $nilai['nim'] ?></td>
                                            <td><?= $nilai['kelas'] ?></td>
                                            <td><?= $nilai['nilai'] ?? '-' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4">Data nilai tidak ditemukan</td>
                                    </tr>
                                <?php endif; ?>
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
