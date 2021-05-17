<?php
require 'config.php';
include 'header.php';

if (isset($_POST['add'])) {

    $stmt = $connection->prepare("INSERT INTO subject(sub_id, sub_code, sub_name, credit_hour VALUE (:sub_id,:sub_code,:sub_name,:credit_hour)");
    $stmt->bindValue('sub_id', $_POST['sub_id']);
    $stmt->bindValue('sub_code', $_POST['sub_code']);
    $stmt->bindValue('sub_name', $_POST['sub_name']);
    $stmt->bindValue('credit_hour', $_POST['credit_hour']);

    $stmt->execute();
    header("Location:subject.php");
}

$stmt = $connection->prepare("SELECT * FROM subject");
$stmt->execute();

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $stmt = $conn->prepare("DELETE FROM subject WHERE sub_id=:sub_id");
    $stmt->bindValue('sub_id', $_GET['sub_id']);
    $stmt->execute();
    header("location:subject.php");
}
?>

<!DOCTYPE html>
<body>
    <div class="container">
            <h2>List of Subject</h2>
            <table border="1" width="100%">
                <tr>
                    <th>Subject ID</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Credit Hour</th>
                    <th>Action</th>
                </tr>
            <tbody>
                <?php while ($subject = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                        <tr>
                            <td class="data-content"><?php echo $subject->sub_id; ?></td>
                            <td class="data-content"><?php echo $subject->sub_code; ?></td>
                            <td class="data-content"><?php echo $subject->sub_name; ?></td>
                            <td class="data-content"><?php echo $subject->credit_hour; ?></td>
                            <td class="data-content">
                                <a class="btn btn-secondary" href="editsubject.php?id=<?php echo $subject->sub_id ?>">Edit</a>
                                <a class="btn btn-danger" href="index.php?id=<?php echo $subject->sub_id ?> &action=delete">Delete</a>
                            </td>
                        </tr>
                    <?php } 
                ?>
            </tbody>
            </table>
    </div>
    
    <div>
    <form>
        <div>
            <label class="form-label" for="sub_id">Subject ID: </label>
            <input type="text" name="sub_id" value="" id="sub_id" class="form-control" placeholder="Enter ID">
        </div>
        <div>
            <label class="form-label" for="sub_code">Subject Code: </label>
            <input type="text" name="sub_code" value="" id="sub_code" class="form-control" placeholder="Enter Subject Code">
        </div>
        <div>
            <label class="form-label" for="sub_name">Subject Name: </label>
            <input type="text" name="sub_name" value="" id="sub_name" class="form-control" placeholder="Enter Sunject Name">
        </div>
        <div>
            <label class="form-label" for="credit_hour">Credit Hour: </label>
            <input type="text" name="credit_hour" value="" id="credit_hour" class="form-control" placeholder="Enter Credit Hour">
        </div>
        <div>
            <button type="submit" name="add" value="add" class="btn btn-primary">Add Subject</button>
        </div>
    </form>
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