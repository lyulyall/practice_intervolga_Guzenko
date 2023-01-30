<?php
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
?>

<!--Рейтинг-->
<div class="container">
    <?php $data=allStudents(); ?>
    <?php if (count($data) > 0): ?>
	    <table class="table table-bordered">
		    <thead>
		    <tr>
			    <th class="scope">Cтуденты</th>
				<?php $subj=allSubjects(); ?>
			    <?php foreach ($subj as $item): ?>
				    <th> <?= $item['subject_name']?> </th>
			    <?php endforeach; ?>
            </tr>
		    </thead>

		    <tbody>
		    <tr>
				<?php $rat=rating($item['id']); ?>
				<?php foreach ($rat as $item): ?>
                    <th> <?= $item['surname']?> <?= $item['name']?></th>
                    <th> <?= $item['grade']?> </th>
				<?php endforeach; ?>



            </tr>
            </tbody>
	    </table>
    <?php endif; ?>
