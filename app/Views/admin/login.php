<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header">
            Faça Login
        </div>
        <div class="card-body">
            <?php Session::alert('usuario') ?>
            <?php Session::alert('register') ?>
            <form name="login" method="POST" action="<?= URL ?>/admin/login" class="mt-4">
                <div class="form-group">
                    <label for="email">Usuário ou Email: <sup class="text-danger">*</sup></label>
                    <input type="email" name="email" id="email" class="form-control <?= $data['email_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $data['email_erro'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="senha" id="senha" class="form-control  <?= $data['senha_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $data['senha_erro'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>