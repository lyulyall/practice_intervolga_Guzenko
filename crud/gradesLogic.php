<?php
require_once "../php/db.php";
class GradesTable
{

	public static function addGrade()
	{
		if (array_key_exists('addGrades', $_POST))
		{
			if ( !empty($_POST['grade']) && !empty($_POST['subjectId']) && !empty($_POST['studentId']) )
			{
				$serv['grade'] = htmlspecialchars($_POST['grade']);
				$serv['subjectId'] = htmlspecialchars($_POST['subjectId']);
				$serv['studentId'] = htmlspecialchars($_POST['studentId']);
				$sql = "INSERT INTO `grades` (`grade`, `subject_id`, `student_id`) VALUES (:grade, :subjectId, :studentId)";
				$pdo = dbconnect();
				$stmt = $pdo->prepare($sql);
				$stmt->execute($serv);
				header('Location: /practice_intervolga/php/grades.php');
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