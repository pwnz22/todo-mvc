<?php include_once '../app/views/partials/header.php' ?>

<div class="container">
    <?php include_once '../app/views/partials/messages.php' ?>

    <a class="btn btn-primary mb-4" href="/task/create">Создать задачу</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="cursor-pointer">
                <a href="<?= addGetParams(['sortby' => 'username', 'sort' => $data['sort_order']]) ?>">
                    Имя пользователя
                    <i class="fa fa-fw <?= $_GET['sortby'] != 'username' ? 'fa-sort' : 'fa-sort-' . $_GET['sort'] ?>"></i>
                </a>
            </th>
            <th scope="col">
                <a href="<?= addGetParams(['sortby' => 'email', 'sort' => $data['sort_order']]) ?>">
                    Email
                    <i class="fa fa-fw <?= $_GET['sortby'] != 'email' ? 'fa-sort' : 'fa-sort-' . $_GET['sort'] ?>"></i>
                </a>
            </th>
            <th scope="col">
                <a href="<?= addGetParams(['sortby' => 'content', 'sort' => $data['sort_order']]) ?>">
                    Текст
                    <i class="fa fa-fw <?= $_GET['sortby'] != 'content' ? 'fa-sort' : 'fa-sort-' . $_GET['sort'] ?>"></i>
                </a>
            </th>
            <th scope="col">
                <a href="<?= addGetParams(['sortby' => 'status', 'sort' => $data['sort_order']]) ?>">
                    Статус
                    <i class="fa fa-fw <?= $_GET['sortby'] != 'status' ? 'fa-sort' : 'fa-sort-' . $_GET['sort'] ?>"></i>
                </a>
            </th>
            <?php if ($auth->isLoggedIn() && $auth->hasRole(\Delight\Auth\Role::ADMIN)): ?>
                <th>Действия</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['todos'] as $item): ?>
            <tr>
                <th scope="row"><?= $item->id ?> <?= $item->by_admin ? '(Отредактировано администратором)' : '' ?></th>
                <td><?= $item->username ?></td>
                <td><?= $item->email ?></td>
                <td><?= $item->content ?></td>
                <td><?= $item->status ? 'Выполнен' : 'Не выполнен' ?></td>
                <?php if ($auth->isLoggedIn() && $auth->hasRole(\Delight\Auth\Role::ADMIN)): ?>
                    <td>
                        <a href="/task/edit/<?= $item->id ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <ul class="pagination">
            <?php for ($i = 1; $i <= ceil($data['todos']->total() / $data['todos']->perPage()); $i++): ?>
                <li class="page-item"><a class="page-link" href="<?= addGetParams(['page' => $i]) ?>"><?= $i ?></a></li>
            <?php endfor; ?>
        </ul>
    </div>
</div>

<?php include_once '../app/views/partials/footer.php' ?>
