<?php

class User extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('Customer');
    }

    public function register()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) {
            $data = [
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
                } elseif (strlen($formulario['senha']) < 8) {
                    $data['senha_erro'] = "A senha deve conter no mínimo 8 caracteres.";
                } elseif ($formulario['senha'] != $formulario['confirma_senha']) {
                    $data['confirma_senha_erro'] = "As senhas são diferentes.";
                } elseif (Check::checkEmail($formulario['email'])) {
                    $data['email_erro'] = "Não é um e-mail válido.";
                } elseif ($this->userModel->checkEmailsAlreadyExists($data['email'])) {
                    $data['email_erro'] = "Email Já cadastrado!";
                } else {
                    $data['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if ($this->userModel->registerUser($data)) {
                        Session::alert('register', 'Cadastro Realizado com Sucesso!', 'alert alert-dismissible alert-success');
                        Url::redirect('user/login');
                    } else {
                        Session::alert('register', 'Nao foi Possível Salvar', 'alert alert-danger');
                    }
                }
            }
        } else {
            $data = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => ''
            ];
        }
        $this->view('customer/register', $data);
    }

    public function login()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) {
            $data = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
            ];

            if (in_array("", $formulario)) {

                foreach ($data as $key => $form) {
                    if (empty($form)) {
                        $data[$key . '_erro'] = "Preencha o Campo acima";
                    }
                }

                if (Check::checkEmail($formulario['email'])) {
                    $data['email_erro'] = "Email inválido!";
                }
            } else {
                if (strlen($formulario['senha']) < 8) {
                    $data['senha_erro'] = "A senha deve conter no mínimo 8 caracteres.";
                } elseif (Check::checkEmail($formulario['email'])) {
                    $data['email_erro'] = "Email inválido!";
                } elseif (!$this->userModel->checkEmailsAlreadyExists($data['email'])) {
                    $data['email_erro'] = "Email Não Cadastrado";
                } else {
                    if ($user = $this->userModel->login($formulario['email'], $formulario['senha'])) {
                        $this->userSession($user);
                    } else {
                        Session::alert('usuario', 'Usuario ou senha invalidos', 'alert alert-danger');
                    }
                }
            }
        } else {
            $data = [
                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => ''
            ];
        }

        $this->view('customer/login', $data);
    }

    private function userSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;

        Url::redirect('posts');
    }

    public function logout()
    {

        $_SESSION['user_id'];
        $_SESSION['user_name'];
        $_SESSION['user_email'];

        session_destroy();

        Url::redirect('user/login');
    }
}
