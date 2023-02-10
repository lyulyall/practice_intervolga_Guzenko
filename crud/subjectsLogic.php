<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php//db.php';

class SubjectsTable
{
	public static function addSubject()
	{
		if (array_key_exists('addSubject', $_POST))
		{
			if ( !empty($_POST['subjectName']))
			{
				$serv['subjectName'] = htmlspecialchars($_POST['subjectName']);
				$sql = "INSERT INTO `subjects` (`subject_name`) VALUES (:subjectName)";

				query($sql, $serv);
				header('Location: /practice_intervolga/php/subjects.php');
			}
			else
			{
				echo "<script>alert(\"Ошибка! Все поля должны быть заполнены\");</script>";
			}
		}
	}

	public static function changeSubject()
	{
		if (array_key_exists('saveSubject', $_POST))
		{
			if ( !empty($_POST['subject_name']))
			{
				$serv['id']=$_GET['id'];
				$serv['subject_name']= htmlspecialchars($_POST['subject_name']);

				$sql = "UPDATE `subjects` SET `subject_name`=:subject_name WHERE `id`=:id";

				query($sql, $serv);
				header('Location: /practice_intervolga/php/subjects.php');
			}
			else
			{
				echo "<script>alert(\"Ошибка! Поля не должны быть пустые\");</script>";
			}
		}
	}
}
?>