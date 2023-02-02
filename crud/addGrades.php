<?php
include '../php/header.php';
require_once 'gradesLogic.php';
require_once '../php/grades.php';
$subjectsList = GradesTable::getItemsFromDBTable('subjects');
$studentsList = GradesTable::getItemsFromDBTable('students');
GradesTable::addGrade();
?>

<script>
    document.body.classList.add('dark_background');
</script>


<div class="container w-25 small_top_margin add_us forms">
	<form method="post">
		<a href="/practice_intervolga/php/grades.php" class=" close">&times;</a>
		<div class="row"><div class="col text-center"><h2>Добавить оценку</h2></div></div>
		<div class="col-sm-6">
			<label for="grade" class="form-label">Баллы:</label>
			<input type="text" class="form-control"  name="grade" id="grade">
		</div>

		<div class="col-md-auto py-4">
			<select required name="subjectId" class="form-select">
				<option>Выберите предмет</option>
				<?php foreach ($subjectsList as $item): ?>
					<option value="<?= $item['id'] ?>"> <?= $item['subject_name']?> </option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="col-md-auto py-4">
			<select required name="studentId" class="form-select">
				<option>Выберите студента</option>
				<?php foreach ($studentsList as $item): ?>
					<option value="<?= $item['id'] ?>"> <?= $item['surname']?> <?= $item['name']?> </option>
				<?php endforeach; ?>
			</select>
		</div>

		<button type="submit" class="btn btn-success" name="addGrades"> Добавить</button>
	</form>
</div>