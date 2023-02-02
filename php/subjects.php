<?php
require_once '../crud/subjectsLogic.php';
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
$subjectsList = SubjectsTable::getItemsFromDBTable('subjects');
?>

<!--Предметы-->
<div class="container">
    <a class="center" href="/practice_intervolga/crud/addSubjects.php"><button class="btn btn-success">
            +</button>
    </a>
	<?php if (count($subjectsList) > 0):?>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Предметы</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>

            <tbody>
                <tr>
				    <?php foreach ($subjectsList as $item):?>
                        <tr>
                            <td><?=$item['id']?></td>
                            <td><?=$item['subject_name']?> </td>
                            <td>
                                <form method="post">
                                    <button type="submit" class="btn btn-primary" name="changeSubj"
                                        value="<?=$item['id']?>">Изменить
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