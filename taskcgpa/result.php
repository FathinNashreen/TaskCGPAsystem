<?php
require 'config.php';
include 'header.php';

$stmt = $conn->prepare('SELECT * FROM student WHERE stud_id=:stud_id');
$stmt->bindValue('stud_id', $_GET['stud_id']);
$stmt->execute();
$student = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $stmt = $connection->prepare('DELETE FROM result WHERE result_id=:result_id');

    $stmt->bindValue('result_id', $_GET['result_id']);
    $stmt->execute();
    header("location:index.php");
}