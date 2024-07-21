<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class LoginController extends BaseController
{

    public function index()
    {
        helper(['form', 'url']);
        $data['titulo'] = 'Ingreso De Usuario';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('back/usuario/ingresar_view');
        echo view('front/footer_view');
    }
    public function auth()
    {
        $session = session();
        $model = new usuario_Model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/login');
            }
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'apellido' => $data['apellido'],
                    'nombre' => $data['nombre'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'provincia' => $data['provincia'],
                    'codigo_postal' => $data['codigo_postal'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE

                ];
                $session->set($ses_data);
                if ($session->get('perfil_id') == 1) {
                    session()->setFlashdata('msg', '¡¡ Bienvenido/a ADMIN!!');
                    return redirect()->to('/panel');
                } else {
                    session()->setFlashdata('msg', '¡¡ Bienvenido/a Usuario!!');
                    return redirect()->to('/panel');
                }
            } else {
                $session->setFlashdata('msg', 'Contraseña Incorrecta.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', '¡El correo no pertenece a un usuario registrado!');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
