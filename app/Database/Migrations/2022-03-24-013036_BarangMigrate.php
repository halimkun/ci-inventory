<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'stok'          => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'keterangan'    => [
                'type' => 'TEXT',
            ],
            'created_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang', true);
    }
}
