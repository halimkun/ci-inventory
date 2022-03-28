<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-7">
        <div class="card card-body">
            <div class="card-title mb-3">
                Tambah Stok Barang
            </div>

            <!-- alert from flashData -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="me-1 icon-md" data-feather="check-circle"></i> <strong>Success</strong>
                    <p class="mt-2"><?= session()->getFlashdata('success'); ?></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="me-1 icon-md" data-feather="x-circle"></i> <strong>Warning</strong>
                    <p class="mt-2"><?= session()->getFlashdata('error'); ?></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            <?php endif; ?>

            <form action="/barang/add_stok" method="post">
                <div class="mb-3">
                    <label for="barang" class="form-label">Pilih Item</label>
                    <select name="barang" class="form-select select2" id="barang">
                        <option>Pilih Barang</option>
                        <?php foreach ($barang as $b) : ?>
                            <option <?= $item == $b->nama ? 'selected' : '' ?> value="<?= $b->id ?>"><?= strtoupper($b->nama) ?> - <?= $b->stok ?> Items</option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Jumlah</label>
                    <input type="number" min="1" name="stok" id="stok" placeholder="jumlah item" class="form-control">
                </div>
                <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-sm btn-primary" style="float: right;">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-body">
            <div class="card-title mb-3">
                Log Penambahan Stok Barang
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>tgl</th>
                        <th>oleh</th>
                        <th>item</th>
                        <th>jumlah</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>