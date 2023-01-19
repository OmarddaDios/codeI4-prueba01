<?php
namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
class Categoria extends ResourceController{
    protected $modelName = 'App\Models\CategoriaModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        return $this->respond($this->model->find($id));
    }

    public function create()
    {
        if($this->validate('categorias')){
            $id = $this->model->insert([
                'id'=>$this->request->getPost('id'),
                'titulo'=>$this->request->getPost('titulo')
            ]);
            } else {
                return $this->respond($this->validator->getErrors(), 400);
            }
            return $this->respond($id);
    
    }
    public function update($id = null)
    {
        if($this->validate('categorias')){
            $this->model->update($id, [
                'id'=>$this->request->getRawInput()['id'],
                'titulo'=>$this->request->getRawInput()['titulo']
            ]);
            } else {
                return $this->respond($this->validator->getErrors(), 400);
            }
            return $this->respond("Se actualizo el $id id");
    }
    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond("Se elimino el registro con id $id");
    }
}