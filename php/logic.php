<?php
require_once 'db.php';

function getData($sql)
{
	$pdo = dbconnect();
	$stmt = $pdo -> prepare($sql);
	$stmt -> execute();
	$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

function grades()
{
	$sql = "SELECT grades.grade, subjects.subject_name as 'subject', students.surname, students.id,
 students.name
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id ";

	return getData($sql);
}


function allSubjects()
{
	$sql = "SELECT * FROM `subjects` ORDER BY subjects.id ";

	return getData($sql);
}

function allData($table)
{
	$sql = "SELECT * FROM $table";

	return getData($sql);
}

function ratingGroupGrades($stud_id, $group)
{
	$sql = "SELECT grades.grade, subjects.subject_name as 'subject',  students.id, students.name, students.surname
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id
    WHERE students.group_id=$group AND grades.student_id=$stud_id 
 	ORDER BY students.id, subjects.id ";

	return getData($sql);
}

function ratingGroupStudents($group)
{
	$sql = "SELECT * FROM `students` WHERE students.group_id=$group";

	return getData($sql);
}


?>
