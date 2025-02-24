<?php
$uri = service('uri');
$isLoginPage = $uri->getSegment(1) === 'auth';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<?php if (!$isLoginPage): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Barber System</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/customers">Pelanggan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/transactions">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/reports">Laporan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile">Profil</a></li>
                  
                    <li class="nav-item"><a class="nav-link text-danger" href="/auth/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>

<div class="container mt-4">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>
