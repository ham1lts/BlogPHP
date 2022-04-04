<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->customerModel = $this->model('Customer');
    }

    public function index()
    {

        $data = $this->postModel->myPosts();
        $this->view('posts/index', $data);
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
