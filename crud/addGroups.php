<?php
include '../php/header.php';
require_once 'groupsLogic.php';
require_once '../php/groups.php';
GroupsTable::addGroups();
?>

<script>
    document.body.classList.add('dark_background');
</script>

<div class="container w-25 small_top_margin add_us forms">
	<form method="post">
		<a href="/practice_intervolga/php/groups.php" class=" close">&times;</a>
		<div class="row"><div class="col text-center"><h2>Добавить группу</h2></div></div>
		<div class="col-sm-6 py-4"">
			<label for="specialty" class="form-label">Название:</label>
			<input type="text" class="form-control"  name="specialty" id="specialty">
		</div>

		<button type="submit" class="btn btn-success" name="addGroups"> Добавить</button>
	</form>
</div>
