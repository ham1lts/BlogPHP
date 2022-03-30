<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <a class="navbar-brand" href="<?= URL ?>">Bis2Bis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>" data-tooltip="tooltip" title="Página Inicial">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/pages/about" data-tooltip="tooltip" title="Sobre nós">Sobre nós</a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <span class="navbar-text">
                        <p>Olá <?= $_SESSION['user_name']; ?> </p>
                    </span>
                    <a class="btn btn-sm btn-danger" href="<?= URL ?>/user/logout">Sair</a>
                <?php } else { ?>
                    <span class="navbar-text">
                        <a class="btn btn-info" href="<?= URL ?>/user/login" data-tooltip="tooltip" title="Tem uma conta? Faça login">Entrar</a>
                        <a class="btn btn-info" href="<?= URL ?>/user/register" data-tooltip="tooltip" title="Não tem uma conta? Cadastre-se">Cadastre-se</a>
                    </span>
                <?php } ?>
            </div>
        </nav>
    </div>
</header>