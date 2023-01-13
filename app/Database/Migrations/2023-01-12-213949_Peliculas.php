<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peliculas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'null' => TRUE
            ]
        ]);

        $this->forge->addKey('id',TRUE);
        $this->forge->createTable('Peliculas');
    }

    public function down()
    {
        $this->forge->dropTable('Peliculas');
    }
}
