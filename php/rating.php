<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/crud/getLogic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';
$groups = getAllData('groups');
?>

<!--Рейтинг-->
<div class="container main">
    <form class="dropdown" method="get">
        <select name="group" class="form-select" required>
            <option value="<?php if (isset($_GET['group'])) echo $_GET['group']?>">
				<?php if (isset($_GET['group']))
                    echo getGroup($_GET['group'])[0]['specialty'];
                    else
                        echo "Выберите группу"; ?>
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
				    <?php $subjects=getAllSubjects(); $i=0; ?>
				    <?php foreach ($subjects as $subj): ?>
                        <th> <?= $subj['subject_name']; $th_subj[$i] = $subj['id']; $i++;?> </th>
				    <?php endforeach; ?>
                </tr>
                </thead>

                <tbody>
				<?php foreach ($students as $stud): ?>
                    <tr>
                        <th> <?= $stud['surname']?> <?= $stud['name']?></th>
                        <?php for ($j = 0; $j<$i; $j++): ?>
                        <?php if (getGrade($stud['id'], $th_subj[$j])!=[]): ?>
                                <td> <?=getGrade($stud['id'], $th_subj[$j])[0]['grade']?></td>
							<?php else: ?>
                                <td> <?='-'?></td>
							<?php endif; ?>
                        <?php endfor; ?>
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


