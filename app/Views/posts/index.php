<div class="container py-5">
    <?= Session::alert('post') ?>
    <div class="card bg-light">
        <div class="card-header bg-info text-white">
            POSTAGENS
            <?php if(isset($_SESSION['user_id'])){?>
            <div class="float-right">
                <a href="<?= URL ?>/posts/registerpost" class="btn btn-light">Escrever</a>
            </div>
            <?php }; ?>
        </div>
        <div class="card-body">
            <?php foreach ($data as $post) : ?>
                <div class="card m-4 shadow">
                    <div class="card-header bg-secondary text-white font-weight-bold">
                    <?= $post->tittle ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= $post->text ?></p>
                        <a href="<?= URL.'/posts/ver/'.$post->id ?>" class="btn btn-sm btn-outline-info float-right">Ler mais...</a>
                    </div>
                    <div class="card-footer text-muted">
                        <small>Escrito por: <b><?= $post->name ?></b> em <i><?= date('d-m-y H:i',strtotime($post->created_at)) ?></i></small>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>


</div>