<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/practice_intervolga/php/db.php';

function query($sql, $params = [])
{
	$pdo = dbconnect();
	$stmt = $pdo -> prepare($sql);
	$stmt -> execute($params);
	return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

function getAllGrades()
{
	$sql = "SELECT grades.id, grades.grade, subjects.id as 'subject_id', subjects.subject_name as 'subject', 
			students.surname, students.id as 'student_id', students.name
    		FROM `grades`
    		JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id";

	return query($sql, []);
}

function getItemsFromDBTable($table)
{
	if($table == 'students' || $table == 'subjects' || $table == 'grades' || $table == 'groups')
	{
		$sql = "SELECT * FROM $table";
		return query($sql, []);
	}
}


function getAllSubjects()
{
	$sql = "SELECT * FROM `subjects` ORDER BY subjects.id ";

	return query($sql, []);
}

function getStudents()
{
	$sql = "SELECT students.id, students.name, students.surname, groups.id as 'group_id', groups.specialty
			FROM `students` 
			JOIN `groups` ON students.group_id=groups.id ORDER BY students.id";

	return query($sql, []);
}

function getAllData($table)
{
	if($table == 'students' || $table == 'subjects' || $table == 'grades' || $table == 'groups')
	{
		$sql = "SELECT * FROM $table";
		return query($sql, []);
	}
}

function getGroup($id)
{
	$sql = "SELECT groups.specialty FROM groups WHERE groups.id=?";

	return query($sql, [$id]);
}


function ratingGroupStudents($group)
{
	$sql = "SELECT * FROM `students` WHERE students.group_id=?";

	return query($sql, [$group]);
}


function getGrade($stud_id, $subj_id)
{
	$sql = "SELECT grades.grade
    FROM `grades`
    WHERE grades.student_id=? AND grades.subject_id=?";

	return query($sql, [$stud_id, $subj_id]);
}