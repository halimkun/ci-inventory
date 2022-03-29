<?php 


function simpanAktifitas($type, $barang, $jumlah, $stok_lama)
{
        $aktifitas = new \App\Models\AktivitasModel();
        
        $data = [
            'type' => $type,
            'barang' => $barang,
            'jumlah' => $jumlah,
            'stok_sebelumnya' => $stok_lama,
            'oleh' => 'username',
        ];
        $aktifitas->save($data);
    }

?>