<?php

class Posts extends Controller
{

    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->customerModel = $this->model('Customer');
    }

    public function index()
    {
        Url::redirect('./');
    }

    public function registerPost()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) {
            $data = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto'])
            ];

            if (in_array("", $formulario)) {

                foreach ($data as $key => $form) {
                    if (empty($form)) {
                        $data[$key . '_erro'] = "Preencha o Campo acima";
                    }
                }
            } else {
                $this->postModel->registerPost($_SESSION['user_id'], $data);
                Session::alert('post', 'Post Cadastrado com Sucesso!', 'alert alert-dismissible alert-success');
                Url::redirect('posts/index');
            }
        } else {
            $data = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => ''
            ];
        }
        $this->view('posts/registerpost', $data);
    }

    public function edit($view, $id)
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) {
            $data = [
                'id' => $id,
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto'])
            ];
            if (in_array("", $formulario)) {

                foreach ($data as $key => $form) {
                    if (empty($form)) {
                        $data[$key . '_erro'] = "Preencha o Campo acima";
                    }
                }
            } else {
                $this->postModel->updatedPost($data);
                Session::alert('post', 'Post Post Atualizado com Sucesso!', 'alert alert-dismissible alert-success');
                Url::redirect('posts/index');
            }
        } else {
            $post = $this->postModel->lerPostPorId($id);
            if ($post->user_id != $_SESSION['user_id']) {
                Session::alert('post', 'Você Não pode atualizar esse Post!', 'alert alert-danger alert-danger');
                Url::redirect('posts/index');
            }
            $data = [
                'id' => $id,
                'titulo' => $post->tittle,
                'texto' => $post->text,
                'titulo_erro' => '',
                'texto_erro' => ''
            ];
        }
        $this->view('posts/edit', $data);
    }

    public function ver($view, $id)
    {
        $post = $this->postModel->lerPostPorId($id);
        $user = $this->customerModel->lerUsuarioPorId($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/ver', $data);
    }

    public function deletePost($view, $id)
    {
        if (!$this->checkAuthorization($id)) :

            $id = filter_var($id, FILTER_VALIDATE_INT);
            $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

            if ($id && $method == 'POST') :
                if ($this->postModel->deletePost($id)) :
                    Session::alert('post', 'Post deletado com sucesso!');
                    Url::redirect('posts');
                endif;
            else :
                Session::alert('post', 'Você não tem autorização para deletar esse Post', 'alert alert-danger');
                Url::redirect('posts');
            endif;

        else :
            Session::alert('post', 'Você não tem autorização para deletar esse Post', 'alert alert-danger');
            Url::redirect('posts');
        endif;
    }

    private function checkAuthorization($id)
    {

        $post = $this->postModel->lerPostPorId($id);
        if ($post->user_id != $_SESSION['user_id']) :
            return true;
        else :
            return false;
        endif;
    }
}
