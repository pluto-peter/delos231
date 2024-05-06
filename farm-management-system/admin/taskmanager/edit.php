<?php include 'inc/header.php'; ?>


<?php

if (isset($_POST['submit2'])) {
    # code...
    $department = $_POST['department'];
    $section = $_POST['section'];
    $instructions = $_POST['instructions'];
    $manager = $_POST['manager'];

    $sql = "UPDATE 'generaltasks' SET 'department' = '$department', 'section' = '$section', 'instructions' = '$instructions', 'manager' = '$manager' WHERE 'id' = '$id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        # code...
        echo 'succesful';
    } else {
        echo 'Error:' . $sql . $conn->error;
    }
}

if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];

    $sql = "SELECT * FROM 'generaltasks' WHERE 'id' = '$id'";

    $result = $conn -> query($sql);

    if ($result -> num_rows > 0) {
        # code...
        while ($row = $result -> fetch_assoc()) {
            # code...
            $department = $row['department'];
            $section = $row['section'];
            $instructions = $row['instructions'];
            $manager = $row['manager'];
            $id = $row['id'];
        }
        

        
    }

    ?>


<form action="" method="post" class="editgeneraltasks">
    <label for="department">department</label>
    <input type="text" name="department" id="department" value="<?php echo $department; ?>">
    <label for="section">section</label>
    <input type="text" name="section" id="section" value="<?php echo $department; ?>">
    <label for=""></label>
    <input type="text" name="instructions" id="instructions" value="<?php echo $department; ?>">
    <label for="manager">manager</label>
    <input type="text" name="manager" id="manager" value="<?php echo $department; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="update" name="update">
</form>

<?php
}else {
   // header('location: generaltasks.php');
}

?>


<?php include 'inc/footer.php'; ?>