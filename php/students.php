<?php
require_once '../crud/studentsLogic.php';
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
$groupList = StudentTable::getItemsFromDBTable('groups');
$studentsList = StudentTable::getItemsFromDBTable('students');
StudentTable::addStudent();
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

                        <select required name="group_id" class="form-select">
                            <option>Выберите группу</option>
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
        <table class="table table-sm table-bordered tableSt">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Студенты</th>
                <th scope="col">Действия</th>
            </tr>

            <tr>
				<?php foreach ($studentsList as $item):?>
                    <tr>
                        <td><?=$item['id']?></td>
                        <td><?=$item['surname']?> <?=$item['name']?></td>
                        <td>
                            <form method="post">
                                <button type="submit" class="btn btn-primary" name="changeSt" value="<?=$item['id']?>">
                                    Изменить
                                </button>
                            </form>
                        </td>
                    </tr>
				<?php endforeach;?>
            </tr>

            </tbody>
        </table>
	<?php endif;?>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/footer.php';
?>