# Blog PHP

Projeto de um Blog feito em PHP.

## 🚀 Status do Projeto

- [x] Cadastro de usuário
- [x] Cadastro de Post
- [x] Autenticação de Usuário
- [x] Exclusão de Post
- [x] Edição de Post
- [ ] Usuário Administrativo
- [ ] Área Administrativa para auditorias/gerenciamento

### 📋 Pré-requisitos

O que você precisa para instalar o software e como instalá-lo?

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

Certifique-se de ter o Docker e o Docker Compose instalados na sua máquina antes de seguir os próximos passos.

### 🔧 Instalação

1. Clone o repositório para o seu diretório local:
    ```bash
    git clone https://github.com/ham1lts/BlogPHP.git BlogPHP
    ```

2. Acesse o diretório do projeto:
    ```bash
    cd BlogPHP
    ```

3. Suba o ambiente com o Docker Compose:
    ```bash
    docker-compose up -d
    ```

4. O Docker irá configurar os containers para o ambiente PHP, Apache e MySQL. Não há necessidade de modificar configurações manualmente ou acessar o Apache localmente.

### 🗂 Banco de Dados

O banco de dados será configurado automaticamente no Docker. No entanto, se preferir configurar manualmente:

### ▶️ Execução

1. Após executar o comando `docker-compose up -d`, acesse o blog pelo seguinte link:
    ```
    http://localhost/
    ```