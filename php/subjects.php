<?php
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
?>
<!--Предметы-->
<div class="container">
	<?php if (count($dataSubj) > 0): ?>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">Предметы</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>

            <tbody>
                <tr>
				    <?php foreach ($dataSubj as $item): ?>
                        <tr>
                            <td><?= $item['subject_name']?> </td>
                            <td>
                                <form action="" method="get">
                                    <button type="submit" class="btn btn-primary" name="changeSubj"
                                        value="<?= $item['id'] ?>">Изменить
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





