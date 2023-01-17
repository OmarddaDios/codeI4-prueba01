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
        if($this->validate('peliculas')){
        $peliculaModel->insert([
            'titulo' =>$this->request->getPost('titulo'), 
            'descripcion' =>$this->request->getPost('descripcion')
            
        ]);
        } else {
        // var_dump($this->validator->getError('titulo'));
        session()->setFlashdata([
            'validation'=> $this->validator
        ]);
        return redirect()->back();
        }
        return redirect()->to('/dashboard/pelicula')->with('hellothere', 'Registro exitoso');
       
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
        if($this->validate('peliculas')){
            $peliculaModel->update($id,[
                'titulo' =>$this->request->getPost('titulo'),
                'descripcion' =>$this->request->getPost('descripcion')
            ]);
        } else {
            //  $this->validator->getError('titulo');
            session()->setFlashdata([
                'validation'=> $this->validator
            ]);
            return redirect()->back();
        }
         return redirect()->to('/dashboard/pelicula')->with('hellothere', 'Update exitoso');
    }

    public function delete($id)
    {
        $peliculaModel= new PeliculaModel();
        $peliculaModel->delete($id);
        session()->setFlashdata('hellothere', 'Registro eliminado');
        return redirect()->back();
        // return redirect()->back()->with('hellothere', 'Registro exitoso');
    }

    public function index(){
     session()->set('key', 'sesion activa');
        $peliculaModel= new PeliculaModel();
        // $db= \Config\Database::connect();
        // $builder= $db->table('peliculas');
        // return $builder->limit(10, 20)->getCompiledSelect();
        echo view('Dashboard/pelicula/index.php', [
            'peliculas' => $peliculaModel->findAll(),
        ]);
    }
}