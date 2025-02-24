<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Data Rekaman Potong Rambut</h2>

    <!-- Form Pencarian -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="<?= base_url('haircuts') ?>" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama pelanggan" value="<?= esc($search ?? '') ?>">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= base_url('haircuts/create') ?>" class="btn btn-success">Tambah Data</a>
        </div>
    </div>

    <!-- Tabel Haircuts -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Style</th>
                <th>Before</th>
                <th>After</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($haircuts as $haircut): ?>
                <tr>
                    <td><?= $haircut['id'] ?></td>
                    <td><?= esc($haircut['customer_name']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($haircut['haircut_date'])) ?></td>
                    <td><?= esc($haircut['style']) ?></td>
                    <td>
                        <?php if ($haircut['before_photo']): ?>
                            <img src="<?= base_url('uploads/haircuts/' . $haircut['before_photo']) ?>" width="60">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($haircut['after_photo']): ?>
                            <img src="<?= base_url('uploads/haircuts/' . $haircut['after_photo']) ?>" width="60">
                        <?php endif; ?>
                    </td>
                    <td><?= esc($haircut['notes']) ?></td>
                    <td>
                        <a href="<?= base_url('haircuts/edit/' . $haircut['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('haircuts/delete/' . $haircut['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
