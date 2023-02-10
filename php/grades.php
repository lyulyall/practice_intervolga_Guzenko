<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/gradesLogic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/getLogic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';
$subjectsList = getItemsFromDBTable('subjects');
$studentsList = getItemsFromDBTable('students');
GradesTable::addGrade();
GradesTable::changeGrade();
?>

<!--Оценки-->
<div class="container main">
    <div class="row mt-3">
        <div class="col-12 center">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">+</button>
        </div>
    </div>

    <!-- Добавление оценок -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Выставить баллы</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="grade" class="form-label">Баллы:</label>
                        <input type="text" class="form-control"  name="grade" id="grade">

                        <label for="subjectId" class="form-label">Выберите предмет: </label>
                        <select required name="subjectId" class="form-select">
							<?php foreach ($subjectsList as $item): ?>
                                <option value="<?= $item['id'] ?>"> <?= $item['subject_name']?> </option>
							<?php endforeach; ?>
                        </select>

                        <label for="studentId" class="form-label">Выберите студента: </label>
                        <select required name="studentId" class="form-select">
							<?php foreach ($studentsList as $item): ?>
                                <option value="<?= $item['id'] ?>"> <?= $item['surname']?> <?= $item['name']?> </option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="addGrades">Добавить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php $gradesList=getAllGrades(); ?>
	<?php if (count($gradesList) > 0): ?>
		<table class="table table-bordered table-sm">
			<thead>
			<tr>
                <th scope="col">id</th>
				<th scope="col">Cтуденты</th>
				<th scope="col">Предмет</th>
				<th scope="col"'">Баллы</th>
                <th scope="col">Действия</th>
			</tr>
			</thead>

			<tbody>
			<tr class="small_top_margin">
				<?php foreach ($gradesList as $item): ?>
			        <tr>
                        <td><?= $item['id']?></td>
				        <td><?= $item['surname'],' ', $item['name']?></td>
				        <td> <?= $item['subject']?> </td>
				        <td><?= $item['grade']?></td>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Изменить баллы <?= $item['surname'],' ', $item['name']?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="grade" class="form-label">Баллы:</label>
                                        <input type="text" class="form-control" name="grade" id="grade" value="<?=$item['grade']?>">


                                        <select required name="subjectId" class="form-select top" >
                                            <option value="<?= $item['subject_id'] ?>"><?= $item['subject']?> </option>
											<?php foreach ($subjectsList as $subject): ?>
                                                <?php if ($subject['id'] === $item['subject_id']): ?>
                                                    <?php continue; ?>
                                                <?php else: ?>
                                                <option value="<?= $subject['id'] ?>"> <?= $subject['subject_name']?> </option>
												<?php endif; ?>
											<?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="saveGrade">Сохранить</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
			    <?php endforeach; ?>
            </tr>
			</tbody>
        </table>
	<?php endif; ?>
</div>

<?php include 'footer.php'; ?>