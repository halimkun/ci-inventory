<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AktifitasMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jumlah' => [
                'type' => 'INT',
            ],
            'stok_sebelumnya' => [
                'type' => 'INT',
            ],
            'oleh'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'acessor'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('aktivitas', true);
    }

    public function down()
    {
        $this->forge->dropTable('aktivitas', TRUE);
    }
}
