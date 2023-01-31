<?php
require_once 'header.php';
require_once 'logic.php';
require_once 'db.php';
?>

<!--Рейтинг-->
<div class="container">

    <!-- Выбор группы их выпадающего списка-->
	<?php $groups=allGroups(); ?>
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
				<?php foreach ($data as $item): ?>
                    <tr>
						<?php $rat=rating($item['id']); ?>
                        <th> <?= $item['surname']?> <?= $item['name']?></th>
                        <?php foreach ($rat as $item2): ?>
                            <td> <?= $item2['grade']?> </td>
                        <?php endforeach; ?>

                    </tr>
				<?php endforeach; ?>
            </tbody>
	    </table>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>