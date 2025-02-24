<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4"><?= isset($haircut) ? 'Edit Potongan Rambut' : 'Tambah Potongan Rambut' ?></h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= isset($haircut) ? base_url('haircuts/update/' . $haircut['id']) : base_url('haircuts/store') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Pelanggan</label>
            <select name="customer_id" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                <?php foreach ($customers as $customer): ?>
                    <option value="<?= $customer['id'] ?>" <?= isset($haircut) && $haircut['customer_id'] == $customer['id'] ? 'selected' : '' ?>>
                        <?= $customer['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Potong</label>
            <input type="datetime-local" name="haircut_date" class="form-control" value="<?= isset($haircut) ? date('Y-m-d\TH:i', strtotime($haircut['haircut_date'])) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gaya Rambut</label>
            <input type="text" name="style" class="form-control" value="<?= isset($haircut) ? $haircut['style'] : '' ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Sebelum</label>
            <input type="file" name="before_photo" class="form-control">
            <?php if (isset($haircut) && $haircut['before_photo']): ?>
                <img src="<?= base_url('uploads/haircuts/' . $haircut['before_photo']) ?>" width="80" class="mt-2">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Sesudah</label>
            <input type="file" name="after_photo" class="form-control">
            <?php if (isset($haircut) && $haircut['after_photo']): ?>
                <img src="<?= base_url('uploads/haircuts/' . $haircut['after_photo']) ?>" width="80" class="mt-2">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="notes" class="form-control"><?= isset($haircut) ? $haircut['notes'] : '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($haircut) ? 'Update' : 'Simpan' ?></button>
        <a href="<?= base_url('haircuts') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
