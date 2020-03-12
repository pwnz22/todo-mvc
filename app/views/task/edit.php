<?php include_once '../app/views/partials/header.php' ?>

<div class="container">

    <?php include_once '../app/views/partials/messages.php' ?>

    <form action="/task/update/<?= $data['todo']->id ?>" method="POST" class="pt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" value="<?= $data['todo']->username ?>" placeholder="Введите имя пользователя">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" value="<?= $data['todo']->email ?>" placeholder="Введите email">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="content" class="form-control" value="<?= $data['todo']->content ?>" placeholder="Введите текст задачи">
                </div>
            </div>

            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" name="status" <?= $data['todo']->status ? 'checked' : '' ?> class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Выполнено</label>
                </div>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../app/views/partials/footer.php' ?>
