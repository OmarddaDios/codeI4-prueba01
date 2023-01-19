<?php

namespace App\Controllers\Dashboard;
use App\Models\CategoriaModel;
use App\Controllers\BaseController;

class Categoria extends BaseController
{
    public function index(){

        $categoriaModel= new CategoriaModel();
        
        echo view('Dashboard/categoria/index.php', [
            'categorias' => $categoriaModel->findAll(),
        ]);
    }
    public function show($id)
    {
        $categoriaModel=  new CategoriaModel();
        echo view('Dashboard/categoria/show.php',[
            'categorias'=>$categoriaModel->find($id)
        ]);
    }
    
    public function create()
    {
        $categoriaModel= new CategoriaModel();
        if($this->validate('categorias')){
        $categoriaModel->insert([
            'id'=>$this->request->getPost('id'),
            'titulo'=>$this->request->getPost('titulo')
        ]);
        } else {
            session()->setFlashdata([
                'validation'=>$this->validator
            ]);
            return redirect()->back()->withInput();
        }
        return redirect()->to('dashboard/categoria')->with('hellothere', 'Registro creado');

    }
    public function new()
    {
        echo view('Dashboard/categoria/new.php');
    }
    public function delete($id)
    {
        $categoriaModel= new CategoriaModel();
        $categoriaModel->delete($id);
        session()->setFlashdata('hellothere', 'Registro eliminado');
        return redirect()->back();
    }
    public function update($id)
    {
        $categoriaModel= new CategoriaModel();
        if($this->validate('categorias')){
        $categoriaModel->update($id, [
            'id'=>$this->request->getPost('id'),
            'titulo'=>$this->request->getPost('titulo')
        ]);
        } else {
            session()->setFlashdata([
                'validation'=> $this->validator
            ]);
            return redirect()->back()->withInput();
        }
        return redirect()->to('/dashboard/categoria')->with('hellothere', 'Registro actualizado');
    }
    public function edit($id)
    {
        $categoriaModel= new CategoriaModel();
        echo view('Dashboard/categoria/edit.php', [
            'categorias'=>$categoriaModel->find($id)
        ]);
    }
}
