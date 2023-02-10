<?php
require_once 'db.php';

function getData($sql, $params = [])
{
	$pdo = dbconnect();
	$stmt = $pdo -> prepare($sql);
	$stmt -> execute($params);
	return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

function getGrades()
{
	$sql = "SELECT grades.id, grades.grade, subjects.id as 'subject_id', subjects.subject_name as 'subject', 
			students.surname, students.id as 'student_id', students.name
    		FROM `grades`
    		JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id";

	return getData($sql, []);
}

function getItemsFromDBTable($table)
{
	if($table == 'students' || $table == 'subjects' || $table == 'grades' || $table == 'groups')
	{
		$sql = "SELECT * FROM $table";
		return getData($sql, []);
	}
}


function allSubjects()
{
	$sql = "SELECT * FROM `subjects` ORDER BY subjects.id ";

	return getData($sql, []);
}

function getStudents()
{
	$sql = "SELECT students.id, students.name, students.surname, groups.id as 'group_id', groups.specialty
			FROM `students` 
			JOIN `groups` ON students.group_id=groups.id ORDER BY students.id";

	return getData($sql, []);
}

function allData($table)
{
	if($table == 'students' || $table == 'subjects' || $table == 'grades' || $table == 'groups')
	{
		$sql = "SELECT * FROM $table";
		return getData($sql, []);
	}
}

function getGroup($id)
{
	$sql = "SELECT groups.specialty FROM groups WHERE groups.id=?";

	return getData($sql, [$id]);
}

function ratingGroupGrades($stud_id, $group)
{
	$sql = "SELECT grades.grade, subjects.subject_name as 'subject',  students.id, students.name, students.surname
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id
    WHERE students.group_id=? AND grades.student_id=? 
 	ORDER BY students.id, subjects.id";

	return getData($sql, [$group, $stud_id]);
}

function ratingGroupStudents($group)
{
	$sql = "SELECT * FROM `students` WHERE students.group_id=?";

	return getData($sql, [$group]);
}

