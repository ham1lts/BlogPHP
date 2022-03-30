<?php

class Pages extends Controller
{

    public function index()
    {
        if (Session::beLoggedIn()) {
            URL::redirect('posts');
        } else {
            $data = [
                'tituloPagina'    => 'Página Inicial.',
                'descricao' => 'Blog Bis2Bis'
            ];

            $this->view('pages/home', $data);
        }
    }

    public function about()
    {
        $data = [
            'tituloPagina'    => 'Página Sobre nós.',
            'descricao' => 'Blog Bis2Bis'
        ];

        $this->view('pages/about', $data);
    }
}
