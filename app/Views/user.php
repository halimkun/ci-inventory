<?= $this->extend('template') ;?>
<?= $this->section('content') ;?>
<div class="card card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Unit</th>
                    <th><i class="icon-md" data-feather="settings"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($user as $u) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= '-' ?></td>
                        <td><?= $u->username ?></td>
                        <td><?= $u->email ?></td>
                        <td><?= "-" ?></td>
                        <td></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ;?>