<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header">
            Faça Login
        </div>
        <div class="card-body">
            <?php Session::alert('usuario') ?>
            <form name="cadastrar" method="POST" action="<?= URL ?>/user/login" class="mt-4">
                <div class="form-group">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="email" name="email" id="email" value="<?= $data['email'] ?>" class="form-control <?= $data['email_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $data['email_erro'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="senha" id="senha" value="<?= $data['senha'] ?>" class="form-control  <?= $data['senha_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $data['senha_erro'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URL ?>/user/register">Não tem uma conta? Cadastre-se.</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>