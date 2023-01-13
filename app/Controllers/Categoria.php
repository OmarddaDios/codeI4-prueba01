<?php

namespace App\Controllers;
use App\Models\CategoriaModel;


class Categoria extends BaseController
{
    public function index(){

        $categoriaModel= new CategoriaModel();
        
        echo view('/categoria/index.php', [
            'categorias' => $categoriaModel->findAll(),
        ]);
    }
    public function show($id)
    {
        $categoriaModel=  new CategoriaModel();
        echo view('/categoria/show.php',[
            'categorias'=>$categoriaModel->find($id)
        ]);
    }
    public function edit($id)
    {
        $categoriaModel= new CategoriaModel();
        echo view('/categoria/edit.php', [
            'categorias'=>$categoriaModel->find($id)
        ]);
    }
    public function create()
    {
        $categoriaModel= new CategoriaModel();
        $categoriaModel->insert([
            'titulo'=>$this->request->getPost('titulo')
        ]);
    }
    public function new()
    {
        echo view('/categoria/new.php');
    }
    public function delete($id)
    {
        $categoriaModel= new CategoriaModel();
        $categoriaModel->delete($id);
        echo "Delete";
    }
    public function update($id)
    {
        $categoriaModel= new CategoriaModel();
        $categoriaModel->update($id, [
            'titulo'=>$this->request->getPost('titulo')
        ]);
    }
}
