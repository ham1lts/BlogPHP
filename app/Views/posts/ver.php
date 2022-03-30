<div class="container">
    <div class="p-5 m-5 bg-light rounded border shadow">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL ?>/posts/">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['post']->tittle ?></li>
            </ol>
        </nav>

        <div class="card text-center">
            <div class="card-header bg-secondary text-white font-weight-bold">
                <?= $data['post']->tittle ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $data['post']->text ?></p>
            </div>
            <div class="card-footer text-muted">
                <small>
                    Escrito por: <b><?= $data['user']->name ?></b> em <i><?= date('d-m-y H:i',strtotime($data['post']->created_at)) ?></i>
                </small>
            </div>
            <?php if ($data['post']->user_id == $_SESSION['user_id']){ ?>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="<?= URL . '/posts/edit/' . $data['post']->id ?>" class="btn btn-sm btn-primary">Editar</a>
                    </li>
                    <li class="list-inline-item">
                        <form action="<?= URL . '/posts/deletepost/' . $data['post']->id ?>" method="POST">
                            <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
                        </form>
                    </li>
                </ul>
                <?php } ?>
        </div>
    </div>
</div>