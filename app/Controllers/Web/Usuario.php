<?php

namespace App\Controllers\Web;
use App\Models\UsuarioModel;
use App\Controllers\BaseController;

class Usuario extends BaseController
{
    public function crear_usuario()
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->insert([
            'usuario'=>'admin',
            'email'=>'admin@gmail.com',
            'contrasena'=> $usuarioModel->contrasenaHash('123456')
        ]);
    }
    public function probar_contrasena()
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->contrasenaVerificar('123456', '$2y$10$OIsNFX1aCTRimwNG4oA/ke/rVOs8EorbdEOKyBVx.49KNT5PRi2Pa');
    }
    public function index()
    {
        //
    }
    public function login()
    {
        echo view('web/usuario/login');
    }
    public function login_post()
    {
       $usuarioModel=new UsuarioModel();
       $email = $this->request->getPost('email');
       $contrasena = $this->request->getPost('contrasena');

       $usuario = $usuarioModel->select('id,usuario,email,contrasena,tipo')->orWhere('email', $email)->orWhere('usuario', $email)->first();

       if (!$usuario) {
            return redirect()->back()->with('hellothere', 'Usuario y/o contraseña invalida');
       }
       if ($usuarioModel->contrasenaVerificar($contrasena, $usuario->contrasena)) {
            
            unset($usuario->contrasena);
            session()->set('usuario', $usuario);

            return redirect()->to('/dashboard/categoria')->withInput('hellothere', "BIENVENIDO $usuario->usuario");
       }
       return redirect()->back()->with('hellothere', 'Usuario y/o contraseña invalida');
    }
    public function register()
    {
        echo view('web/usuario/register');
    }
    public function register_post()
    {
       $usuarioModel=new UsuarioModel();


        if ($this->validate('usuarios')) {
            $usuarioModel->insert([
                'usuario' => $this->request->getPost('usuario'),
                'email' => $this->request->getPost('email'),
                'contrasena' =>$usuarioModel->contrasenaHash($this->request->getPost('contrasena'))
            ]);
            return redirect()->to(route_to('usuario.login'))->withInput('hellothere','Registro exitoso');
        }else{
                session()->setFlashdata([
                    'validation'=> $this->validator
                ]);
                return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
