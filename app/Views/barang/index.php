<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<style>
    .CodeMirror,
    .CodeMirror-scroll {
        min-height: 100px;
    }
</style>

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="card-title">Data Barang</h4>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarang">
                <i class="me-2 icon-md" data-feather="plus"></i> Barang
            </button>
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

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($barang as $b) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b->nama ?></td>
                        <td><?= $b->stok ?></td>
                        <td><?= $b->keterangan ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="me-2 icon-md" data-feather="settings"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/barang/add?item=<?= $b->nama ?>"><i class="me-2 icon-md" data-feather="plus-circle"></i> Tambah Stok</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="me-2 icon-md" data-feather="edit"></i> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="me-2 icon-md" data-feather="trash"></i>Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal tambah barang -->
<div class="modal fade" id="modalAddBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form action="/barang/store" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama barang">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Barang</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan jumlah barang">
                    </div>
                    <div class="mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="simpleMdeExample" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>