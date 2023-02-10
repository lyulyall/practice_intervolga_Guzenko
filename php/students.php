<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/studentsLogic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/GetLogic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';
$groupList = getItemsFromDBTable('groups');
$studentsList=getStudents();
StudentTable::addStudent();
StudentTable::changeStudent();
?>

 <!--Студенты-->
<div class="container main">

    <!-- Button trigger modal -->
    <div class="row mt-3">
        <div class="col-12 center">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">+</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить студента</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="form-label">Имя:</label>
                        <input type="text" class="form-control" name="name" id="name">

                        <label for="surname" class="form-label">Фамилия: </label>
                        <input type="text" class="form-control"  name="surname" id="surname">

                        <label for="groupId" class="form-label">Выберите группу: </label>
                        <select required name="groupId" class="form-select">
							<?php foreach ($groupList as $item): ?>
                                <option value="<?= $item['id'] ?>"> <?= $item['specialty']?> </option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="addStudent">Добавить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


	<?php if (count($studentsList) > 0):?>
        <table class="table table-sm table-bordered table-striped tableSt">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Студенты</th>
                <th scope="col">Группа</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>

            <tbody>
            <tr>
				<?php foreach ($studentsList as $item):?>
                    <tr>
                        <td><?=$item['id']?></td>
                        <td><?=$item['surname']?> <?=$item['name']?></td>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Редактировать студента</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="name" class="form-label">Имя:</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?=$item['name']?>">

                                        <label for="surname" class="form-label">Фамилия</label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                               value="<?=$item['surname']?>">

                                        <select name="groupId" class="form-select top" >
                                            <option value="<?= $item['group_id'] ?>"><?= $item['specialty']?> </option>
											<?php foreach ($groupList as $group): ?>
												<?php if ($group['id'] === $item['group_id']): ?>
													<?php continue; ?>
												<?php else: ?>
                                                    <option value="<?= $group['id'] ?>"> <?= $group['specialty']?> </option>
												<?php endif; ?>
											<?php endforeach; ?>

                                        </select>
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

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/footer.php';
?>