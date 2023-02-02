<?php
require_once "../php/db.php";

class GroupsTable
{
	public static function addGroups()
	{
		if (array_key_exists('addGroups', $_POST))
		{
			if ( !empty($_POST['specialty']))
			{
				$serv['specialty'] = htmlspecialchars($_POST['specialty']);
				$sql = "INSERT INTO `groups` (`specialty`) VALUES (:specialty)";

				$pdo = dbconnect();
				$stmt = $pdo->prepare($sql);
				$stmt->execute($serv);
				header('Location: /practice_intervolga/php/groups.php');
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