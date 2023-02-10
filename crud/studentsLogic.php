<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';

class StudentTable
{

	public static function addStudent()
	{
		if (array_key_exists('addStudent', $_POST))
		{
			if ( !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['groupId']) )
			{
				$serv['name'] = htmlspecialchars($_POST['name']);
				$serv['surname'] = htmlspecialchars($_POST['surname']);
				$serv['groupId'] = htmlspecialchars($_POST['groupId']);
				$sql = "INSERT INTO `students` (`surname`, `name`, `group_id`) VALUES (:surname, :name, :groupId)";

				query($sql, $serv);
				header('Location: /practice_intervolga/php/students.php');
			}
			else
			{
				echo "<script>alert(\"Ошибка! Все поля должны быть заполнены\");</script>";
			}
		}
	}

	public static function changeStudent()
	{
		if (array_key_exists('saveStudent', $_POST))
		{
			if ( !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['groupId']) )
			{
				$serv['id']=$_GET['id'];
				$serv['name'] = htmlspecialchars($_POST['name']);
				$serv['surname'] = htmlspecialchars($_POST['surname']);
				$serv['groupId'] = htmlspecialchars($_POST['groupId']);

				$sql = "UPDATE `students` SET `name`=:name, `surname`=:surname,`group_id`=:groupId WHERE `id`=:id";

				query($sql, $serv);
				header('Location: /practice_intervolga/php/students.php');
			}
			else
			{
				echo "<script>alert(\"Ошибка! Поля не должны быть пустые\");</script>";
			}
		}
	}

}
?>