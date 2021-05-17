<?php
require 'config.php';
include 'header.php';

$stmt = $conn->prepare('SELECT * FROM student WHERE stud_id=:stud_id');
$stmt->bindValue('stud_id', $_GET['stud_id']);
$stmt->execute();

$student = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['studedit'])) {

    $stmt = $connection->prepare("UPDATE student SET stud_name=:stud_name, stud_matricno=:stud_matricno, stud_id=:stud_id, stud_age=:stud_age, stud_course=:stud_course, stud_sem=:studsem, stud_credithour=:stud_credithour WHERE stud_id=:stud_id");
    $stmt->bindValue('stud_name', $_POST['stud_name']);
    $stmt->bindValue('stud_matricno', $_POST['stud_matricno']);
    $stmt->bindValue('stud_id', $_POST['stud_id']);
    $stmt->bindValue('stud_age', $_POST['stud_age']);
    $stmt->bindValue('stud_course', $_POST['stud_course']);
    $stmt->bindValue('stud_sem', $_POST['stud_sem']);
    $stmt->bindValue('stud_credithour', $_POST['stud_credithour']);

    $stmt->execute();
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<form>
<h3>Edit Student</h3>

<table>
    <tr>
        <td>Student Name</td>
        <td><input class="form-control" type="text" name="stud_name" value="<?php echo $student->stud_name; ?>"></td>
    </tr>
    <tr>
        <td>Matric Number</td>
        <td><input class="form-control" type="text" name="stud_matricno" value="<?php echo $student->stud_matricno; ?>"></td>
    </tr>
    <tr>
        <td>Student ID</td>
        <td><input class="form-control" type="text" name="stud_id" value="<?php echo $student->stud_id; ?>"></td>
    </tr>
    <tr>
        <td>Age</td>
        <td><input class="form-control" type="text" name="stud_age" value="<?php echo $student->stud_age; ?>"></td>
    </tr>
    <tr>
        <td>Course</td>
        <td><input class="form-control" type="text" name="stud_course" value="<?php echo $student->stud_course; ?>"></td>
    </tr>
    <tr>
        <td>Semester</td>
        <td><input class="form-control" type="text" name="stud_sem" value="<?php echo $student->stud_sem; ?>"></td>
    </tr>
    <tr>
        <td>Total Credit Hour</td>
        <td><input class="form-control" type="text" name="stud_credithour" value="<?php echo $student->stud_credithour; ?>"></td>
    </tr>
    <tr>
        <td><input class="btn" type="submit" name="studedit" value="Edit Student"></td>
    </tr>
</table>
</form>
</html>

<style>
Body {  
  font-family: Arial, Helvetica, sans-serif;  
  background-color: lightyellow;  
} 

button {   
    background-color: #4CAF50;   
    width: 20%;  
    color: black;   
    padding: 15px;   
    margin: 10px 0px;   
    border: none;   
    cursor: pointer;   
    } 
	  
 form {   
    border: 3px solid #f1f1f1; 
	text-align: left; 
    }   

 input[type=text] {   
        width: 80%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid black;   
        box-sizing: border-box;   
    }  

 button:hover {   
    opacity: 0.7;   
    }    
</style>