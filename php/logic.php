<?php
require_once 'db.php';



function allStudents()
{
	$sql= "SELECT * FROM `students`";

	$pdo = dbconnect();
	$query = $pdo->prepare($sql);
	$query->execute();
	$data = $query->fetchAll(PDO::FETCH_ASSOC);

	return $data;
}

function rating($stud_id)
{
	$sql = "SELECT grades.grade, subjects.subject_name as 'subject', students.surname as 'surname', 
students.name as 'name'
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id 
    WHERE students.id=grades.student_id ORDER BY grades.subject_id ";

	$pdo = dbconnect();
	$query = $pdo->prepare($sql);
	$query->execute();
	$dataRating = $query->fetchAll(PDO::FETCH_ASSOC);

	return $dataRating;
}

function grades()
{
	$sql = "SELECT grades.grade, subjects.subject_name as 'subject', students.surname as 'surname',
 students.name as 'name'
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id ";

	$pdo = dbconnect();
	$query = $pdo->prepare($sql);
	$query->execute();
	$dataGrade = $query->fetchAll(PDO::FETCH_ASSOC);

	return $dataGrade;
}


function allSubjects()
{
	$sqlSubj = "SELECT * FROM `subjects` ORDER BY subjects.id ";

	$pdo = dbconnect();
	$querySubj = $pdo -> prepare($sqlSubj);
	$querySubj -> execute();
	$dataSubj = $querySubj -> fetchAll(PDO::FETCH_ASSOC);

	return $dataSubj;
}

?>