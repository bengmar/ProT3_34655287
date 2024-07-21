<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\usuario_Model;
use CodeIgniter\HTTP\UserAgent;

class UsuarioController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function registrarse()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('back/usuario/registrarse_view');
        echo view('front/footer_view');
    }
    public function formValidation()
    {
        $input = $this->validate(
            [
                'apellido' => 'required|min_length[3]|max_length[25]',
                'nombre' => 'required|min_length[3]',
                'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
                'usuario' => 'required|min_length[3]',
                'pass' => 'required|min_length[4]|max_length[20]',
                'provincia' => 'required|min_length[4]',
                'codigo_postal' => 'required|min_length[4]'
            ],
        );
        $formModel = new usuario_Model();

        if (!$input) {
            $data['titulo'] = 'Registro';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('front/logo_view');
            echo view('back/usuario/registrarse_view', ['validation' => $this->validator]);
            echo view('front/footer_view');
        } else {
            $formModel->save([
                'apellido' => $this->request->getVar('apellido'),
                'nombre' => $this->request->getVar('nombre'),
                'email' => $this->request->getVar('email'),
                'usuario' => $this->request->getVar('usuario'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'provincia' => $this->request->getVar('provincia'),
                'codigo_postal' => $this->request->getVar('codigo_postal')
            ]);
            session()->setFlashdata('success', 'Se ha registrado el usuario');
            return $this->response->redirect('registrarse');
        }
    }

    public function update($id)
    {
        $userModel = new usuario_Model();
        $input = $this->validate(
            [
                'apellido' => 'required|min_length[3]|max_length[25]',
                'nombre' => 'required|min_length[3]',
                'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
                'usuario' => 'required|min_length[3]',
                'pass' => 'required|min_length[4]|max_length[20]',
            ]
        );
        if (!$input) {
            session()->setFlashdata('msg','Debe rellenar todos los campos.Reintente');
            return redirect()->to('/panel');
        }


        if ($input) {
            $data = [
                'apellido' => $this->request->getPost('apellido'),
                'nombre' => $this->request->getPost('nombre'),
                'email' => $this->request->getPost('email'),
                'usuario' =>  $this->request->getPost('usuario'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            ];
            $userModel->update($id, $data);
            session()->setFlashdata('msg','Datos actualizados correctamente.');
            return redirect()->to("/panel");
        }
    }

    public function editarCuenta()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');
        $title['titulo'] = 'Edición De Usuario';
        $model = new usuario_Model();
        $userData['user'] = $model->find($id_usuario);

        echo view('front/head_view', $title);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('back/usuario/edicion_view', $userData);
        echo view('front/footer_view');
    }
}
