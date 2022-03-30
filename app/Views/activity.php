<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<div class="card card-body">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Subject</th>
                <th>Jumlah</th>
                <th>Stok Sebelumnya</th>
                <th>Tanggal</th>
                <th>Oleh</th>
                <th>Acessor</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($activity as $a) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= parseSubject($a->type, $a->barang, $a->oleh) ?></td>
                    <td><?= $a->jumlah ?></td>
                    <td><?= $a->stok_sebelumnya ?></td>
                    <td><?= $a->created_at ?></td>
                    <td><?= $a->oleh ?></td>
                    <td><?= $a->acessor == null ? '-' : '' ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>