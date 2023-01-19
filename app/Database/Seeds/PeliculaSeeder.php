<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('peliculas')->where('id>=', 0)->delete();
        for ($id=0; $id < 30 ; $id++) { 
            $this->db->table('peliculas')->insert([
                'titulo' => "Peliculas $id",
                'descripcion' => "Descripcion$id"
            ]);
        }
        
    }
}
