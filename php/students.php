<?php
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
?>

 <!--Студенты-->
<div class="container">
	<?php $data=allStudents(); ?>
	<?php if (count($data) > 0): ?>
        <table class="table table-sm table-bordered tableSt">
            <tr>
                <th scope="col">Студенты</th>
                <th scope="col">Действия</th>
            </tr>

            <tr>
				<?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= $item['surname']?> <?= $item['name']?></td>
                        <td>
                            <form action="" method="get">
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
