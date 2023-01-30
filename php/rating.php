<?php
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
?>

<!--Рейтинг-->
<div class="container">
    <?php if (count($data) > 0): ?>
	    <table class="table table-bordered">
		    <thead>
		    <tr>
			    <th class="scope">Cтуденты</th>
			    <?php foreach ($data as $item): ?>
				    <th> <?= $item['subject']?> </th>
			    <?php endforeach; ?>
            </tr>
		    </thead>

		    <tbody>
		    <tr class="small_top_margin">
			    <th><?= $item['surname'],' ', $item['name']?></th>
                <?php foreach ($data as $item): ?>
				    <td><?= $item['grade']?></td>
			    <?php endforeach; ?>
            </tr>
            </tbody>
	    </table>
    <?php endif; ?>
