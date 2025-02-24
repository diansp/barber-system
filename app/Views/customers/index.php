<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Pelanggan</h2>
        <a class="btn btn-primary" href="/customers/create">Tambah Pelanggan</a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kategori</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= 'JX-' . str_pad($customer['id'], 5, '0', STR_PAD_LEFT); ?></td>
                    <td>
                        <?php if ($customer['photo']): ?>
                            <img src="<?= base_url('uploads/customers/' . $customer['photo']) ?>" width="50" height="50" alt="Foto Pelanggan">
                        <?php else: ?>
                            <img src="<?= base_url('uploads/default.png') ?>" width="50" height="50" alt="Default Foto">
                        <?php endif; ?>
                    </td>
                    <td><?= esc($customer['name']); ?></td>
                    <td><?= esc($customer['phone']); ?></td>
                    <td><?= esc($customer['alamat']); ?></td>
                    <td><?= esc($customer['kecamatan']); ?></td>
                    <td><?= esc($customer['kategori']); ?></td>
                    <td><?= esc($customer['email']); ?></td>
                    <td>
                        <span class="badge bg-<?= $customer['status'] == 'Aktif' ? 'success' : 'danger' ?>">
                            <?= esc($customer['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="/customers/edit/<?= $customer['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/customers/delete/<?= $customer['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pelanggan ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
