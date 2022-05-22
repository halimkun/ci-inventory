<?php


function simpanAktifitas($type, $barang, $jumlah, $stok_lama, $acessor)
{
    $aktifitas = new \App\Models\AktivitasModel();

    $data = [
        'type'            => $type,
        'barang'          => $barang,
        'jumlah'          => $jumlah,
        'stok_sebelumnya' => $stok_lama,
        'oleh'            => user()->username,
        'acessor'         => $acessor
    ];
    $aktifitas->save($data);
}

function parseSubject($type, $barang, $oleh){
    $subject = '';
    switch ($type) {
        case 'new':
            $subject = '<i class="me-2 icon-md text-primary" data-feather="box"></i>' . $oleh . ' menambahkan '.$barang.' Baru';
            break;
        
            case 'add':
            $subject = '<i class="me-2 icon-md text-success" data-feather="plus-circle"></i>'. $oleh . ' menambahkan '.$barang.' ke stok';
            break;

        case 'min':
            $subject = '<i class="me-2 icon-md text-danger" data-feather="minus-circle"></i>'. $oleh . ' mengurangi / Mengambil '.$barang.' dari stok';
            break;

        case 'req':
            $subject = $oleh . ' meminta '.$barang.' dari stok';
            break;
        
        default:
            $subject = 'Aktifitas Tidak diketahui';
            break;
    }

    return $subject;
}
