<header class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>">BlogPHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link active" href="<?= URL ?>" data-tooltip="tooltip" title="Página Inicial">Inicio</a>
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>/pages/about" data-tooltip="tooltip" title="Sobre nós">Sobre nós</a>
                </li>
            </ul>
            <form class="d-flex">
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <span class="navbar-text">
                        <a>Olá <?= $_SESSION['user_name']; ?>  </a>
                        <a href=""> </a>
                    </span>
                    <a class="btn btn-sm btn-danger" href="<?= URL ?>/user/logout">Sair</a>
                <?php } else { ?>
                    <span class="nav-text">
                        <a class="btn btn-info" href="<?= URL ?>/user/login" data-tooltip="tooltip" title="Tem uma conta? Faça login">Entrar</a>
                        <a class="btn btn-info" href="<?= URL ?>/user/register" data-tooltip="tooltip" title="Não tem uma conta? Cadastre-se">Cadastre-se</a>
                    </span>
                <?php } ?>
            </form>
        </div>
    </div>
</nav>
</header>