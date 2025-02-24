<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Selamat Datang, <?= session()->get('user_name'); ?>!</h2>
    <p>Anda telah berhasil login.</p>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>

<?= $this->endSection() ?>
