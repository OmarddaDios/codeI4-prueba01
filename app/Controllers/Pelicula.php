<?php

namespace App\Controllers;
use App\Models\PeliculaModel;

class Pelicula extends BaseController
{
    public function show($id){
        $peliculaModel= new PeliculaModel();
        
        echo view('/pelicula/show.php',[
            'peliculas' => $peliculaModel->find($id)
        ]);
    }
    public function new(){
        echo view('/pelicula/new.php');
    }
    public function create()
    {
        $peliculaModel= new PeliculaModel();
        $peliculaModel->insert([
            'titulo' =>$this->request->getPost('titulo'), 
            'descripcion' =>$this->request->getPost('descripcion')
            
        ]);
       
    }

    public function edit($id)
    {
        $peliculaModel= new PeliculaModel();

        echo view('/pelicula/edit',[
            'pelicula' => $peliculaModel->find($id)
        ]);
    }
    public function update($id)
    {
        $peliculaModel= new PeliculaModel();
        $peliculaModel->update($id,[
            'titulo' =>$this->request->getPost('titulo'),
            'descripcion' =>$this->request->getPost('descripcion')
        ]);
        echo "actualizado";

    }

    public function delete($id)
    {
        $peliculaModel= new PeliculaModel();
        $peliculaModel->delete($id);
        echo "Delete";
    }

    public function index(){

        $peliculaModel= new PeliculaModel();
        
        echo view('/pelicula/index.php', [
            'peliculas' => $peliculaModel->findAll(),
        ]);
    }
}