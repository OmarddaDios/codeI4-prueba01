<?php

namespace App\Controllers\Dashboard;
use App\Models\PeliculaModel;
use App\Controllers\BaseController;

class Pelicula extends BaseController
{
    public function show($id){
        $peliculaModel= new PeliculaModel();
        
        echo view('Dashboard/pelicula/show.php',[
            'peliculas' => $peliculaModel->find($id)
        ]);
        
    }
    public function new(){
        echo view('Dashboard/pelicula/new.php');
    }
    public function create()
    {
        $peliculaModel= new PeliculaModel();
        $peliculaModel->insert([
            'titulo' =>$this->request->getPost('titulo'), 
            'descripcion' =>$this->request->getPost('descripcion')
            
        ]);
        return redirect()->to('/dashboard/pelicula');
       
    }

    public function edit($id)
    {
        $peliculaModel= new PeliculaModel();

        echo view('Dashboard/pelicula/edit',[
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
        
        return redirect()->to('/dashboard/pelicula');
    }

    public function delete($id)
    {
        $peliculaModel= new PeliculaModel();
        $peliculaModel->delete($id);
        return redirect()->back();
    }

    public function index(){

        $peliculaModel= new PeliculaModel();
        
        echo view('Dashboard/pelicula/index.php', [
            'peliculas' => $peliculaModel->findAll(),
        ]);
    }
}