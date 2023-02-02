<?php
require_once "../php/db.php";

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

				$pdo = dbconnect();
				$stmt = $pdo->prepare($sql);
				$stmt->execute($serv);
				header('Location: /practice_intervolga/php/subjects.php');
			}
			else
			{
				echo "<script>alert(\"Ошибка! Все поля должны быть заполнены\");</script>";
			}
		}
	}

	public static function getItemsFromDBTable($table)
	{
		$sql = "SELECT * FROM $table";

		return getData($sql);
	}

}
?>