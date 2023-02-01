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

function allStudents()
{
	$sql= "SELECT * FROM `students`";

	return getData($sql);
}

function rating($stud_id, $subj_id)
{
	$sql = "SELECT grades.grade, subjects.subject_name as 'subject',  students.id
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id
    WHERE grades.student_id=$stud_id
 	ORDER BY students.id, subjects.id ";

	return getData($sql);
}
function grades()
{
	$sql = "SELECT grades.grade, subjects.subject_name as 'subject', students.surname as 'surname', students.id,
 students.name as 'name'
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id ";

	return getData($sql);
}


function allSubjects()
{
	$sql = "SELECT * FROM `subjects` ORDER BY subjects.id ";

	return getData($sql);
}

function allGroups()
{
	$sql = "SELECT * FROM `groups`";

	return getData($sql);
}


?>
