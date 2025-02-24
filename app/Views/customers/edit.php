<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg p-4 rounded">
                <h2 class="text-center">Edit Pelanggan</h2>

                <form action="/customers/update/<?= $customer['id']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $customer['id']; ?>">

                    <div class="mb-3 text-center">
                        <label class="form-label">Foto Saat Ini</label><br>
                        <?php if ($customer['photo']): ?>
                            <img src="<?= base_url('uploads/customers/' . $customer['photo']); ?>" class="rounded-circle border" width="100" height="100">
                        <?php else: ?>
                            <img src="<?= base_url('uploads/customers/default.png'); ?>" class="rounded-circle border" width="100" height="100">
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Foto Baru</label>
                        <input type="file" name="photo" class="form-control">
                        <small class="text-muted">* Kosongkan jika tidak ingin mengganti foto</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" value="<?= esc($customer['name']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="phone" class="form-control" value="<?= esc($customer['phone']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?= esc($customer['alamat']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" value="<?= esc($customer['kecamatan']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="Umum" <?= $customer['kategori'] == 'Umum' ? 'selected' : ''; ?>>Umum</option>
                            <option value="Khusus" <?= $customer['kategori'] == 'Khusus' ? 'selected' : ''; ?>>Khusus</option>
                            <option value="Saudara" <?= $customer['kategori'] == 'Saudara' ? 'selected' : ''; ?>>Saudara</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="Aktif" <?= $customer['status'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                            <option value="Non Aktif" <?= $customer['status'] == 'Non Aktif' ? 'selected' : ''; ?>>Non Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
