<?php

$host = '127.0.0.1';
$db   = 'test';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //PDO::ATTR_EMULATE_PREPARES   => false,
];

try{

	$pdo = new PDO($dsn, $user, $pass, $opt);

	//question 1
	$pdo->beginTransaction();//表示第二个错了，第一个也不会传进去
	$stmt_1 = $pdo->prepare("INSERT INTO student (student_id, student_name, student_department, student_age) VALUES (?,?,?,?)");
	$stmt_1->execute([12345, 'student_001', 'Web Dev', 18]);
	$stmt_1->execute([12346, 'student_002', 'Web Dev', 19]);
	$pdo->commit();//这是结束语句


	//question 2
/*	$stmt_2 = $pdo->prepare("INSERT INTO course (course_id, course_name) VALUES (?,?)");
	$stmt_2->execute([54321, 'DataBase']);
	$insert_2 = $stmt_2->rowCount();
	echo $insert_2." record created successfully. ";
	$stmt_2 = $pdo->prepare("INSERT INTO student_course (student_id, course_id, grade) VALUES (?,?,?)");
	$stmt_2->execute([12345, 54321, 89]);
	$insert_2 = $stmt_2->rowCount();
	echo $insert_2." record created successfully. ";*/


	//question 3
/*	$stmt_3 = $pdo->prepare("DELETE FROM student WHERE student_age = 19");
	$stmt_3->execute();
	$deleted = $stmt_3->rowCount();
	echo $deleted." record deleted successfully. ";*/


	//question 4
	//safe mode on
	$stmt_4 = $pdo->query("SELECT reference_id FROM student_course WHERE student_id IN (SELECT student_id from student where student_age = 18) AND course_id IN (SELECT course_id from test.course where course_name = 'DataBase');");
	$reference_array = $stmt_4->fetch();
	$reference_set = "(";
	foreach($reference_array as $row){
		$reference_set.= $row['reference_id'].",";
	}
	$reference_set=rtrim($reference_set, ',');//去掉后面的，号
	$reference_set.=")";

	$stmt_4 = $pdo->prepare("UPDATE student_course SET grade = 91 where reference_id IN $reference_set");

	//safe mode off
/*	$stmt_4 = $pdo->prepare("UPDATE student_course, student, course SET grade = 91 where student.student_id = student_course.student_id AND course.course_id = student_course.course_id AND student_age = 18 AND course_name = 'DataBase'");*/

	
/*	$stmt_4->execute();
	$updated = $stmt_4->rowCount();
	echo $updated." record updated successfully. ";*/


	//question 5
/*	$stmt_5 = $pdo->query("SELECT student_name, course_name, grade from student, course, student_course WHERE student.student_id=student_course.student_id AND course.course_id = student_course.course_id AND student.student_age=18");
	while($row = $stmt_5->fetch()){

		echo $row['student_name']." ".$row['course_name']." ".$row['grade']."\n";
	}*/




}catch(PDOException $e){

	//roll back the transaction.
	/*$pdo->rollback();*/

	echo "Connection failed: " . $e->getMessage();
}
