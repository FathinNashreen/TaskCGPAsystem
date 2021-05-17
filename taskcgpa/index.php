<?php
require 'config.php';
include 'header.php';

if (isset($_POST['addstud'])) {
    $stmt = $conn->prepare('INSERT INTO student(stud_name,stud_matricno,stud_id,stud_age,stud_course,stud_sem,stud_credithour) VALUE(:stud_name,:stud_matricno,:stud_id.:stud_age,:stud_course,:stud_sem,:stud_credithour)');

    $stmt->bindValue('stud_name', $_POST['stud_name']);
    $stmt->bindValue('stud_matricno', $_POST['stud_matricno']);
    $stmt->bindValue('stud_id', $_POST['stud_id']);
    $stmt->bindValue('stud_age', $_POST['stud_age']);
    $stmt->bindValue('stud_course', $_POST['stud_course']);
    $stmt->bindValue('stud_sem', $_POST['stud_sem']);
    $stmt->bindValue('stud_credithour', $_POST['stud_credithour']);


    $stmt->execute();
    header("location:index.php");
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $stmt = $conn->prepare('DELETE FROM student WHERE stud_id=:stud_id');
    $stmt->bindValue('stud_id', $_GET['stud_id']);
    $stmt->execute();

    echo "Delete Success";
}

$stmt = $connection->prepare('SELECT * FROM student');
$stmt->execute();

?>

<!DOCTYPE html>
<body>
    <div class="container">
            <h2>Student CGPA GPA System</h2>
            <table border="1" width="100%">
                <tr>
                    <th>Student Name</th>
                    <th>Matric Nunber</th>
                    <th>Student ID</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Total Credit Hour</th>
                    <th>Action</th>
                </tr>
            <tbody>
                <?php while ($student = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                        <tr>
                            <td class="data-content"><?php echo $student->stud_name; ?></td>
                            <td class="data-content"><?php echo $student->stud_matricno; ?></td>
                            <td class="data-content"><?php echo $student->stud_id; ?></td>
                            <td class="data-content"><?php echo $student->stud_age; ?></td>
                            <td class="data-content"><?php echo $student->stud_course; ?></td>
                            <td class="data-content"><?php echo $student->stud_sem; ?></td>
                            <td class="data-content"><?php echo $student->stud_credithour; ?></td>
                            <td class="data-content">
                                <a class="btn btn-primary" href="result.php?id=<?php echo $student->stud_id ?>">View</a>
                                <a class="btn btn-secondary" href="editstudent.php?id=<?php echo $student->stud_id ?>">Edit</a>
                                <a class="btn btn-danger" href="index.php?id=<?php echo $student->stud_id ?> &action=delete">Delete</a>
                            </td>
                        </tr>
                    <?php } 
                ?>
            </tbody>
            </table>
    </div>
</body>
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
        width: 30%;   
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
