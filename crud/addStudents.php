<?php
include '../php/header.php';
require_once '../php/students.php';
require_once 'studentsLogic.php';
$groupList = StudentTable::getItemsFromDBTable('groups');
StudentTable::addStudent();
?>

<script>
    document.body.classList.add('dark_background');
</script>


<div class="container w-25 small_top_margin add_us forms">
    <form method="post">
        <a href="/practice_intervolga/php/students.php" class=" close">&times;</a>
        <div class="row"><div class="col text-center"><h2>Добавить студента</h2></div></div>
        <div class="col-sm-6">
            <label for="name" class="form-label">Имя:</label>
            <input type="text" class="form-control"  name="name" id="name">
        </div>

        <div class="col-sm-6">
            <label for="surname" class="form-label">Фамилия: </label>
            <input type="text" class="form-control"  name="surname" id="surname">
        </div>

        <div class="col-md-6 py-4">
            <select required name="group_id" class="form-select">
                <option >Выберите группу</option>
				<?php foreach ($groupList as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['specialty'] ?></option>
				<?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success" name="addStudent"> Добавить</button>
    </form>
</div>