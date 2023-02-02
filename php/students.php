<?php
require_once '../crud/studentsLogic.php';
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
$studentsList = StudentTable::getItemsFromDBTable('students');
?>

 <!--Студенты-->
<div class="container">
    <a class="center" href="/practice_intervolga/crud/addGrades.php"><button class="btn btn-success">
            Добавить студента</button>
    </a>
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