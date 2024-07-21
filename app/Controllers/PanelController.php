<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class PanelController extends BaseController
{
    public function index()
    {

        $session = session();
        $id_usuario = $session->get('id_usuario');
        $nombre = $session->get('usuario');
        $perfil = $session->get('perfil_id');
        $title['titulo'] = 'Panel De Usuario';
        $titleAdmin['titulo'] = 'Panel ADMIN';



        if ($perfil == 1) {
            $model = new usuario_Model();
            $data['usuarios'] = $model->findAll();
            

            //Vista a retornar si nos logueamos como ADMINISTRADOR
            echo view('front/head_view', $titleAdmin);
            echo view('front/navbar_view');
            echo view('front/logo_view');
            echo view('back/usuario/admin_logueado_view', $data);
            echo view('front/footer_view');
        } else {
            // Redireccionar o mostrar una vista alternativa para clientes
            $model = new usuario_Model();
            $userData['user'] = $model->find($id_usuario);
        
                echo view('front/head_view', $title);
                echo view('front/navbar_view');
                echo view('front/logo_view');
                echo view('back/usuario/usuario_logueado_view', $userData);
                echo view('front/footer_view'); 
        }
        
    }
    public function eliminar($id_usuario)
    {
        $session = session();
        $model = new usuario_Model();
        $perfil = $session->get('perfil_id');
        if($perfil == 2) {
            $model->delete($id_usuario);
            $session->destroy();
            return redirect()->to('/principal');
        } else {
            $model->delete($id_usuario);
            return redirect()->to('/panel');
        }
        
    }

    

}
