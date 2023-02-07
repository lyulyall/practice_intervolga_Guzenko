<?php
include $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/GetLogic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/groupsLogic.php';
$groupList = GroupsTable::getItemsFromDBTable('groups');
GroupsTable::addGroups();
GroupsTable::changeGroups();
?>

<!--Группы-->
<div class="container main">
    <div class="row mt-3">
        <div class="col-12 center">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">+</button>
        </div>
    </div>

    <!-- Добавление записи -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить группу</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="specialty" class="form-label">Название</label>
                        <input type="text" class="form-control" id="specialty" name="specialty">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="addGroups">Добавить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



	<?php if (count($groupList) > 0):?>
        <table class="table table-sm table-striped table-bordered tableSt">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Группа</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>

            <tbody>
                <tr>
				    <?php foreach ($groupList as $item):?>
                        <tr>
                            <td><?=$item['id']?></td>
                            <td><?=$item['specialty']?></td>
                            <td>
                                    <a href='?id=<?=$item['id']?>' type="button" class="btn btn-primary"
                                            data-toggle="modal" data-target="#change<?=$item['id']?>">Изменить</a>
                            </td>
                        </tr>

                        <!-- Редактирование записи -->
                        <div class="modal fade" id="change<?=$item['id']?>" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="?id=<?=$item['id']?>" method="post">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Изменить группу</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="specialty" class="form-label">Название группы</label>
                                            <input type="text" class="form-control" id="specialty" name="specialty"
                                                   value="<?=$item['specialty']?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="saveStudent">Сохранить</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>

				    <?php endforeach;?>

                </tr>
            </tbody>
        </table>
	<?php endif;?>

</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/footer.php'; ?>