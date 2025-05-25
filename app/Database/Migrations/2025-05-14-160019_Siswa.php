<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'usia'           => ['type' => 'VARCHAR', 'constraint' => 20],
            'kelas'         => ['type' => 'VARCHAR', 'constraint' => 10],
            'asal_sekolah'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'program'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'level'         => ['type' => 'VARCHAR', 'constraint' => 10],
            'jenis'         => ['type' => 'ENUM', 'constraint' => ['reguler', 'private']],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
