<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Inicio';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('front/principal_view');
        echo view('front/footer_view');
    }
    public function quienes_somos()
    {
        $data['titulo'] = 'Quienes Somos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('front/quienes_somos_view');
        echo view('front/footer_view');
    }
    public function registrarse()
    {
        $data['titulo'] = 'Registrarse';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('back/usuario/registrarse_view');
        echo view('front/footer_view');
    }
    public function acerca_de()
    {
        $data['titulo'] = 'Acerca De';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('front/acerca_de_view');
        echo view('front/footer_view');
    }
    public function ingresar()
    {
        $data['titulo'] = 'Ingresar';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/logo_view');
        echo view('back/usuario/ingresar_view');
        echo view('front/footer_view');
    }
    
}
