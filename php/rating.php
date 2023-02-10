<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/GetLogic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';
$groups = allData('groups');
?>

<!--Рейтинг-->
<div class="container main">
    <form class="dropdown" method="get">
        <select name="group" class="form-select" >
            <option>
				<?php if (isset($_GET['group'])):
                    echo getGroup($_GET['group'])[0]['specialty']?>
                <?php else: ?>
                Выберите группу
				<?php endif; ?>
            </option>
            <?php foreach ($groups as $item): ?>
				<?php if ($item['id'] === $_GET['group']): ?>
					<?php continue; ?>
				<?php else: ?>
                    <option value="<?= $item['id'] ?>"> <?= $item['specialty']?> </option>
				<?php endif; ?>
			<?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary my-4" name="build">Построить рейтинг</button>
    </form>


    <?php if (array_key_exists('build', $_GET)): ?>
        <?php $students = ratingGroupStudents($_GET['group']);?>
		<?php if (count($students) > 0): ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="scope">Cтуденты</th>
				    <?php $subjects=allSubjects(); ?>
				    <?php foreach ($subjects as $subj): ?>
                        <th> <?= $subj['subject_name']?> </th>
				    <?php endforeach; ?>
                </tr>
                </thead>

                <tbody>
				<?php foreach ($students as $stud): ?>
                    <tr>
						<?php $rating=ratingGroupGrades($stud['id'], $_GET['group']); ?>
                        <th> <?= $stud['surname']?> <?= $stud['name']?></th>
						<?php foreach ($rating as $rat): ?>
                            <td> <?=$rat['grade']?></td>
						<?php endforeach; ?>
                    </tr>
				<?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <?php echo 'Студентов нет' ?>
	    <?php endif; ?>
	<?php endif; ?>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/footer.php';
?>


