<?php
require_once "../php/db.php";

class StudentTable
{
	public static function getStudents()
	{
		return allStudents();
	}

	public static function addStudent()
	{
		if (array_key_exists('addStudent', $_POST))
		{
			if ( !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['group_id ']) )
			{
				$serv['name'] = htmlspecialchars($_POST['name']);
				$serv['surname'] = htmlspecialchars($_POST['surname']);
				$serv['group_id'] = htmlspecialchars($_POST['group_id']);

				$sql = "INSERT INTO `students` (`surname`, `name`, `group_id `) VALUES (:surname, :name, :group_id)";

				$pdo = dbconnect();
				$stmt = $pdo->prepare($sql);
				$stmt->execute($serv);
				header('Location: /practice_intervolga/php/students.php');
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
