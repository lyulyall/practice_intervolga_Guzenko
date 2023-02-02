<?php
require_once '../crud/studentsLogic.php';
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
$groupList = StudentTable::getItemsFromDBTable('groups');
?>

<!--Группы-->
<div class="container">
    <a class="center" href="/practice_intervolga/crud/addGroups.php"><button class="btn btn-success">
            +</button>
    </a>
	<?php if (count($groupList) > 0):?>
        <table class="table table-sm table-bordered tableSt">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Группа</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>

            <tbody>
                <tr>
				    <?php foreach ($groupList as $item):?>
                        <tr>
                            <td><?=$item['id']?></td>
                            <td><?=$item['specialty']?></td>
                            <td>
                            <form method="post">
                                <button type="submit" class="btn btn-primary" name="changeSt"
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