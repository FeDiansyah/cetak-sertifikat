<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAkademikTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                  => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'siswa_id'            => ['type' => 'INT', 'unsigned' => true],
            'nilai_unit_quis_a'   => ['type' => 'DECIMAL', 'constraint' => '5,2'],
            'nilai_unit_quis_b'   => ['type' => 'DECIMAL', 'constraint' => '5,2'],
            'nilai_unit_quis_c'   => ['type' => 'DECIMAL', 'constraint' => '5,2'],
            'nilai_final_test'    => ['type' => 'DECIMAL', 'constraint' => '5,2'],
            'attendance'          => ['type' => 'DECIMAL', 'constraint' => '5,2'],
            'created_at'          => ['type' => 'DATETIME', 'null' => true],
            'updated_at'          => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('siswa_id', 'siswa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('akademik');
    }

    public function down()
    {
        $this->forge->dropTable('akademik');
    }
}
