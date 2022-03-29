<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card card-body">
            <div class="card-title mb-3">
                Kurangi Stok Barang
            </div>
            <form action="/barang/min_stok" method="post">
                <div class="mb-3">
                    <label for="barang" class="form-label">Pilih Item</label>
                    <select name="barang" class="form-select select2" id="barang">
                        <option>Pilih Barang</option>
                        <?php foreach ($barang as $b) : ?>
                            <option value="<?= $b->id ?>"><?= strtoupper($b->nama) ?> - <?= $b->stok ?> Items</option>
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
    <div class="col-md-6">
        <div class="card card-body">
            <div class="card-title mb-3">
                Log pengurangan Stok Barang
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>tgl</th>
                            <th>item</th>
                            <th>jumlah</th>
                            <th>stok sebelumnya</th>
                            <th>oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aktivitas as $a) : ?>
                            <tr>
                                <td><?= str_replace(' ', '</br>', $a->created_at) ?></td>
                                <td><?= $a->barang ?></td>
                                <td><?= $a->jumlah ?></td>
                                <td><?= $a->stok_sebelumnya ?></td>
                                <td><?= $a->oleh ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>