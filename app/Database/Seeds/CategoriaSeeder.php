<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('categorias')->where('id>=', 0)->delete();
        for ($id=0; $id < 30; $id++) { 
            
            $this->db->table('categorias')->insert([
                'id' => $id,
                'titulo' => "categoria$id"
            ]);
        }
        
    }
}
