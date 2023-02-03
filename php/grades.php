<?php
include 'header.php';
require_once '../crud/gradesLogic.php';
require_once 'logic.php';
require_once 'db.php';
$subjectsList = GradesTable::getItemsFromDBTable('subjects');
$studentsList = GradesTable::getItemsFromDBTable('students');
GradesTable::addGrade();
?>

<!--Оценки-->
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
                        <label for="grade" class="form-label">Баллы:</label>
                        <input type="text" class="form-control"  name="grade" id="grade">

                        <select required name="subjectId" class="form-select">
                            <option>Выберите предмет</option>
							<?php foreach ($subjectsList as $item): ?>
                                <option value="<?= $item['id'] ?>"> <?= $item['subject_name']?> </option>
							<?php endforeach; ?>
                        </select>

                        <select required name="studentId" class="form-select">
                            <option>Выберите студента</option>
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

    <?php $gradesList=grades(); ?>
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
                            <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="changeGrade"
                                    value="">Изменить
                                </button>
                            </form>
                        </td>
			        </tr>
			    <?php endforeach; ?>
            </tr>
			</tbody>
        </table>
	<?php endif; ?>
</div>

<?php include 'footer.php'; ?>