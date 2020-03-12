<?php include_once '../app/views/partials/header.php' ?>

<div class="container">
    <?php include_once '../app/views/partials/messages.php' ?>

    <div class="row justify-content-md-center">
        <div class="col-4">
            <form action="/auth/login" method="POST">
                <div class="form-group">
                    <label for="uname">Имя пользователя</label>
                    <input type="text" class="form-control" id="uname" placeholder="Введите логин" name="name">
                </div>
                <div class="form-group">
                    <label for="pwd">Пароль</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Введите пароль" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../app/views/partials/footer.php'; ?>
