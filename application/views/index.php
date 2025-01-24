<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(<?php echo base_url('assets/img/bg.jpg')?>);
            background-size: cover; /* Background menjadi satu tampilan */
            background-position: center;
            backdrop-filter: blur(10px); /* Efek blur pada background */
        }
        .login-container {
            padding: 30px;
            background: #ffffff; /* Warna putih untuk kontras */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .login-container h3 {
            margin-bottom: 15px;
            font-size: 1.75rem;
            color: #003366; /* Warna teks biru gelap */
        }

        .login-container hr {
            margin: 15px 0;
            border-color: #003366;
        }

        .login-container small {
            display: block;
            margin-bottom: 25px;
            color: rgb(44, 106, 129);
        }

        .login-container .form-control {
            margin-bottom: 20px;
            font-size: 1rem;
            padding: 10px;
        }

        .login-container .btn {
            font-size: 1rem;
            padding: 10px;
            background-color: #003366; /* Tombol biru gelap */
            color: #ffffff; /* Teks putih */
            border: none;
        }

        .login-container .btn:hover {
            background-color: #00509e; /* Biru lebih terang saat hover */
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 250px; /* Ukuran logo */
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="<?php echo base_url('assets/img/logo-amikom.png') ?>" alt="Logo Amikom">
    </div>
    <div class="login-container">
        <h3>Login</h3>
        <hr>
        <small>Silahkan login menggunakan akun anda</small>

        <!-- Menampilkan Pesan Flash (Gagal Login) -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-center">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('welcome/login') ?>" method="post">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <button type="submit" class="btn w-100">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
