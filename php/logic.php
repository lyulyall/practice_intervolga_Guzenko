<?php
require_once 'db.php';


$sql = "SELECT grades.id, grades.grade, subjects.subject_name as 'subject', students.surname as 'surname', students.name as 'name'
    FROM `grades`
    JOIN `subjects` ON grades.subject_id=subjects.id JOIN `students` ON grades.student_id=students.id";

$query = $pdo->prepare($sql);
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);



$sqlStud = "SELECT students.id, students.surname, students.name FROM `students`";

$queryStud = $pdo->prepare($sqlStud);
$dataStud = $pdo->query($sqlStud)->fetchAll(PDO::FETCH_ASSOC);


$sqlSubj = "SELECT subjects.id, subjects.subject_name FROM `subjects`";

$querySubj = $pdo->prepare($sqlSubj);
$dataSubj = $pdo->query($sqlSubj)->fetchAll(PDO::FETCH_ASSOC);


?>