<?php
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
$groups = allData('groups');
$students = allData('students');
?>

<!--Рейтинг-->
<div class="container main">

    <!-- Выбор группы их выпадающего списка-->
    <div class="dropdownbutton" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
        <div class="row justify-content-berween" role="button">
            <div class="col-md-auto title">Выберите группу... </div>
            <div class="col"></div>
            <div class="col-md-auto"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                          class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1
                    .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
        </div>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<?php foreach ($groups as $item): ?>
                <li><a id='<?= $item['id']?>' class="dropdown-item" href="#"> <?= $item['specialty']?></a></li>
			<?php endforeach; ?>

        </ul>
    </div>

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
                    <th> <?= $stud['surname']?> <?= $stud['name']?></th>
					<?php $rating=rating($stud['id'],  $subj['id']); ?>
					<?php foreach ($rating as $rat): ?>
                        <td> <?=$rat['grade']?></td>
					<?php endforeach; ?>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
	<?php endif; ?>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/footer.php';
?>


