<?php
require_once '../crud/subjectsLogic.php';
include 'header.php';
require_once 'logic.php';
require_once 'db.php';
$subjectsList = SubjectsTable::getItemsFromDBTable('subjects');
SubjectsTable::addSubject();
?>

<!--Предметы-->
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
                        <h5 class="modal-title" id="exampleModalLabel">Добавить предмет</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="subjectName" class="form-label">Название предмета</label>
                        <input type="text" class="form-control" id="subjectName" name="subjectName" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="addSubject">Добавить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

	<?php if (count($subjectsList) > 0):?>
        <table class="table table-bordered table-striped table-sm">
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

<?php include 'footer.php'; ?>