<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barber System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        body {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }

        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 420px;
        }

        .login-title {
            font-size: 26px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #4e54c8;
            box-shadow: 0 0 10px rgba(78, 84, 200, 0.3);
        }

        .btn-login {
            background: #4e54c8;
            color: #fff;
            border-radius: 10px;
            font-size: 16px;
            padding: 12px;
            transition: 0.3s;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #373ba8;
            transform: translateY(-2px);
        }

        .alert {
            font-size: 14px;
            padding: 12px;
            text-align: center;
            border-radius: 8px;
        }

        .footer-text {
            font-size: 13px;
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2 class="login-title">Login Barber System</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="/auth/processLogin" method="post">
        <div class="mb-4">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-login w-100">Login</button>
        </div>
    </form>

    <p class="footer-text">© 2025 Barber System | All Rights Reserved</p>
</div>

</body>
</html>
