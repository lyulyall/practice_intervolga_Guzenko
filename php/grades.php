<?php
include 'header.php';
require_once 'logic.php';
require_once 'db.php';
?>

<!--Оценки-->
<div class="container">

    <a class="center" href="/practice_intervolga/crud/addGrades.php"><button class="btn btn-success">
            +</button>
    </a>
	<?php $gradesList=grades(); ?>
	<?php if (count($gradesList) > 0): ?>
		<table class="table table-bordered table-sm">
			<thead>
			<tr>
                <th scope="col">id</th>
				<th scope="col">Cтуденты</th>
				<th scope="col">Предмет</th>
				<th scope="col"'">Баллы</th>
                <th scope="col">Действия</th>
			</tr>
			</thead>

			<tbody>
			<tr class="small_top_margin">
				<?php foreach ($gradesList as $item): ?>
			        <tr>
                        <td><?= $item['id']?></td>
				        <td><?= $item['surname'],' ', $item['name']?></td>
				        <td> <?= $item['subject']?> </td>
				        <td><?= $item['grade']?></td>
                        <td>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="changeGrade"
                                    value="">Изменить
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

<?php include 'footer.php'; ?>