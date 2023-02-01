<?php
require_once '../crud/studentsLogic.php';
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
$groupList = StudentTable::getStudents();
?>

 <!--Студенты-->
<div class="container">
    <a href="/practice_intervolga/crud/addStudents.php"><button class="btn btn-success" name="addStudent">Добавить</button></a>
	<?php if (count($groupList) > 0): ?>
        <table class="table table-sm table-bordered tableSt">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Студенты</th>
                <th scope="col">Действия</th>
            </tr>

            <tr>
				<?php foreach ($groupList as $item): ?>
                    <tr>
                        <td><?= $item['id']?></td>
                        <td><?= $item['surname']?> <?= $item['name']?></td>
                        <td>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="changeSt"
                                    value="<?= $item['id'] ?>">Изменить
                                </button>
                            </form>
                    </tr>
				<?php endforeach; ?>
            </tr>

            </tbody>
        </table>
	<?php endif; ?>
</div>
