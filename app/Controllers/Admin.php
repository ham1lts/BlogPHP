<?php

class Admin extends Controller
{
    
    public function __construct()
    {
        $this->adminModel = $this->model('UserAdmin');
    }


    public function index()
    {
        if (Session::beLoggedInAdmin()) {
            URL::redirect('admin/home');
        } else {
            $data = [
                'tituloPagina'    => 'Página Inicial.',
                'descricao' => 'Blog'
            ];

            $this->view('admin/login', $data);
        }
    }

    public function login()
    {
        $this->view('admin/login');
    }

    public function home()
    {
        echo 'Página Inicial De Controle';
    }

    public function register()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) {
            $data = [
                'usuario' => trim($formulario['usuario']),
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha'])
            ];

            if (in_array("", $formulario)) {

                foreach ($data as $key => $form) {
                    if (empty($form)) {
                        $data[$key . '_erro'] = "Preencha o Campo acima";
                    }
                }
            } else {
                if (Check::checkName($formulario['nome'])) {
                    $data['nome_erro'] = "O nome inserido é  inválido";
                } elseif ($this->adminModel->userIsValid($formulario['usuario'])){
                    $data['usuario_erro'] = "Usuario já registrado";
                } elseif (strlen($formulario['senha']) < 8) {
                    $data['senha_erro'] = "A senha deve conter no mínimo 8 caracteres.";
                } elseif ($formulario['senha'] != $formulario['confirma_senha']) {
                    $data['confirma_senha_erro'] = "As senhas são diferentes.";
                } elseif (Check::checkEmail($formulario['email'])) {
                    $data['email_erro'] = "Não é um e-mail válido.";
                } elseif ($this->adminModel->checkEmailsAlreadyExists($data['email'])) {
                    $data['email_erro'] = "Email Já cadastrado!";
                } else {
                    $data['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    
                    if ($this->adminModel->registerUser($data)) {
                        Session::alert('register', 'Cadastro Realizado com Sucesso!', 'alert alert-dismissible alert-success');
                        Url::redirect('admin/login');
                    } else {
                        Session::alert('register', 'Nao foi Possível Salvar', 'alert alert-danger');
                    }
                }
            }
        } else {
            $data = [
                'usuario'=>'',
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
                'usuario_erro'=>''
            ];
        }
        $this->view('admin/register', $data);
    }    

}
