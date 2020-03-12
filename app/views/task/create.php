<?php include_once '../app/views/partials/header.php' ?>

<div class="container">

    <?php include_once '../app/views/partials/messages.php' ?>

    <form action="/task/store" method="POST" class="pt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Введите имя пользователя">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Введите email">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="content" class="form-control" placeholder="Введите текст задачи">
                </div>
            </div>

            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Добавить</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../app/views/partials/footer.php' ?>
