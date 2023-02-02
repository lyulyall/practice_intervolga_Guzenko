<?php
include '../php/header.php';
require_once 'subjectsLogic.php';
require_once '../php/subjects.php';
SubjectsTable::addSubject();
?>

<script>
    document.body.classList.add('dark_background');
</script>

<div class="container w-25 small_top_margin add_us forms">
	<form method="post">
		<a href="/practice_intervolga/php/subjects.php" class=" close">&times;</a>
		<div class="row"><div class="col text-center"><h2>Добавить предмет</h2></div></div>
		<div class="col-sm-6 py-4"">
			<label for="subjectName" class="form-label">Название предмета:</label>
			<input type="text" class="form-control"  name="subjectName" id="subjectName">
		</div>

		<button type="submit" class="btn btn-success" name="addSubject"> Добавить</button>
	</form>
</div>
