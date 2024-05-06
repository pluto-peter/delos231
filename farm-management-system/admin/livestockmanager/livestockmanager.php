<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>




<?php
$sql = 'SELECT * FROM calves';
$result = mysqli_query($conn, $sql);
$calf_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
$sql1 = 'SELECT * FROM pasture';
$result1 = mysqli_query($conn, $sql1);
$pasture_data = mysqli_fetch_all($result1, MYSQLI_ASSOC);
?>

<?php
$sql2 = 'SELECT * FROM artificialinsemination';
$result2 = mysqli_query($conn, $sql2);
$ai_data = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>



<?php



$section = $birthDate = $breed  = $gender = $healthStatus = $comments = '';

$sectionErr = $birthDateErr = $breedErr = $genderErr = $healthStatusErr = $commentsErr = '';

//form stuff 

if (isset($_POST['submit'])) {
    if (empty($_POST['section'])) {
        $sectionErr = 'Enter Section Name/No.';
    } else {
        $section = filter_input(INPUT_POST,  'section', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['birthdate'])) {
        $birthDateErr = 'Enter Birth Date';
    } else {
        $birthDate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['gender'])) {
        $genderErr = 'Enter Gender';
    } else {
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['breed'])) {
        $breedErr = 'Enter Breed';
    } else {
        $breed = filter_input(INPUT_POST, 'breed', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

   

    if (empty($_POST['healthstatus'])) {
        $healthStatusErr = 'Enter Health Status';
    } else {
        $healthStatus = filter_input(INPUT_POST, 'healthstatus', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['comments'])) {
        $commentsErr = 'Enter Short Comment';
    } else {
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($sectionErr) && empty($birthDateErr) && empty($genderErr) && empty($breedErr) && empty($healthStatusErr) && empty($commentsErr)) {
        //add data to mysql database
        $sql = "INSERT INTO calves (section, birthdate, gender, breed, healthstatus, comments) VALUES ('$section', '$birthDate', '$gender', '$breed', '$healthStatus', '$comments')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: livestockmanager.php#sqltable');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>




<?php



$date = $section1 = $herd  = $pasture = $instructions = $manager = '';

$dateErr = $section1Err = $herdErr = $pastureErr = $instructionsErr = $managerErr = '';

//form stuff 

if (isset($_POST['submit2'])) {
    if (empty($_POST['date'])) {
        $dateErr = 'Enter Date';
    } else {
        $date = filter_input(INPUT_POST,  'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['herd'])) {
        $herdErr = 'Enter Herd Name/No.';
    } else {
        $herd = filter_input(INPUT_POST, 'herd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['pasture'])) {
        $pastureErr = 'Enter Pasture Name/No.';
    } else {
        $pasture = filter_input(INPUT_POST, 'pasture', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['sections'])) {
        $section1Err = 'Enter section Name/No.';
    } else {
        $section1 = filter_input(INPUT_POST, 'sections', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

   

    if (empty($_POST['instructions'])) {
        $instructionsErr = 'Enter Short Instructions';
    } else {
        $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['manager'])) {
        $managerErr = 'Enter Managers Name';
    } else {
        $manager = filter_input(INPUT_POST, 'manager', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($section1Err) && empty($dateErr) && empty($herdErr) && empty($pastureErr) && empty($instructionsErr) && empty($managerErr)) {
        //add data to mysql database
        $sql = "INSERT INTO pasture (section, date, herd, pasture, instructions, manager) VALUES ('$section1', '$date', '$herd', '$pasture', '$instructions', '$manager')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: livestockmanager.php#sqltable2');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>





<?php



$name = $idnumber = $breed2  = $vet = $comment = '';

$nameErr = $idnumberErr = $breed2Err = $vetErr = $commentErr = '';

//form stuff 

if (isset($_POST['submit3'])) {
    if (empty($_POST['name'])) {
        $nameErr = 'Enter Livestock Name';
    } else {
        $name = filter_input(INPUT_POST,  'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['idnumber'])) {
        $idnumberErr = 'Enter Livestock ID No.';
    } else {
        $idnumber = filter_input(INPUT_POST, 'idnumber', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['breed'])) {
        $breed2Err = 'Enter breed';
    } else {
        $breed2 = filter_input(INPUT_POST, 'breed', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['vet'])) {
        $vetErr = 'Enter Vet Name/No.';
    } else {
        $vet = filter_input(INPUT_POST, 'vet', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

   

    if (empty($_POST['comment'])) {
        $commentErr = 'Enter Short Comment';
    } else {
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($nameErr) && empty($idnumberErr) && empty($breed2Err) && empty($vetErr) && empty($commentErr)) {
        //add data to mysql database
        $sql = "INSERT INTO artificialinsemination (name, idnumber, breed, vet, comments) VALUES ('$name', '$idnumber', '$breed2', '$vet', '$comment')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: livestockmanager.php#sqltable3');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>




<div class="livestock1" id="livestock1">
    <h1>add newborn calf</h1>
    <form action="" method="post" class="livestockform1">
        <div>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" <?php echo $sectionErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $sectionErr; ?></div>
        <label for="birthdate">Birth Date:</label>
        <input type="date" name="birthdate" id="birthdate" <?php echo $birthDateErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $birthDateErr; ?></div>
        <label for="gender">Gender:</label>
        <input type="text" name="gender" id="gender" <?php echo $genderErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $genderErr; ?></div>
        </div>
        <div>
        <label for="breed">Breed:</label>
        <input type="text" name="breed" id="breed" <?php echo $breedErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $breedErr; ?></div>
        <label for="healthstatus">Health Status:</label>
        <input type="text" name="healthstatus" id="healthstatus" <?php echo $healthStatusErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $healthStatusErr; ?></div>
        <label for="comments">Comments:</label>
        <input type="text" name="comments" id="comments" <?php echo $commentsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $commentsErr; ?></div>
        </div>
        <input type="submit" value="add calf" name="submit" class="btn3">
    </form>
</div>


<div class="sqltable" id="sqltable">

    <h1 class="priority_header">recent offspring</h1>

    <?php if (empty($calf_data)) : ?>
        <p>No Recent offspring</p>
    <?php endif; ?>

    <?php foreach ($calf_data as $item) : ?>

        <table>
            <thead>
                <th>section</th>
                <th>birth date</th>
                <th>gender</th>
                <th>breed</th>
                <th>health status</th>
                <th>comments</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['birthdate']; ?></td>
                <td><?php echo $item['gender']; ?></td>
                <td><?php echo $item['breed']; ?></td>
                <td><?php echo $item['healthstatus']; ?></td>
                <td><?php echo $item['comments']; ?></td>
                <td>
                <a href="deletelivestock.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<div class="livestock2" id="livestock2">
    <h1>pasture management</h1>
    <form action="" method="post" class="livestockform2">
    <div>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" <?php echo $dateErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $dateErr; ?></div>
        <label for="livestock">Herd:</label>
        <input type="text" name="herd" id="livestock" <?php echo $herdErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $herdErr; ?></div>
        <label for="pasture">Pasture:</label>
        <input type="text" name="pasture" id="pasture" <?php echo $pastureErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $pastureErr; ?></div>
        </div>
        <div>
        <label for="section">Section:</label>
        <input type="text" name="sections" id="section" <?php echo $section1Err ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $section1Err; ?></div>
        <label for="instructions">Instructions:</label>
        <input type="text" name="instructions" id="instructions" <?php echo $instructionsErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $instructionsErr; ?></div>
        <label for="manager">Manager:</label>
        <input type="text" name="manager" id="manager" <?php echo $managerErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $managerErr; ?></div>
        </div>
        <input type="submit" name="submit2" value="assign pasture" class="btn3">
    </form>
</div>



<div class="sqltable" id="sqltable2">

    <h1 class="priority_header">recent pasture assignments</h1>

    <?php if (empty($pasture_data)) : ?>
        <p>No Recent Activities</p>
    <?php endif; ?>

    <?php foreach ($pasture_data as $item) : ?>

        <table>
            <thead>
                <th>date</th>
                <th>herd</th>
                <th>pasture</th>
                <th>section</th>
                <th>instructions</th>
                <th>manager</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['date']; ?></td>
                <td><?php echo $item['herd']; ?></td>
                <td><?php echo $item['pasture']; ?></td>
                <td><?php echo $item['section']; ?></td>
                <td><?php echo $item['instructions']; ?></td>
                <td><?php echo $item['manager']; ?></td>
                <td>
                <a href="deletelivestock1.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<div class="livestock3" id="livestock3">
    <h1>artificial insemination</h1>
    <form action="" method="post" class="livestockform3">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" <?php echo $nameErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $nameErr; ?></div>
        <label for="idnumber">ID No.</label>
        <input type="text" name="idnumber" id="idnumber" <?php echo $idnumberErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $idnumberErr; ?></div>
        <label for="breed">Breed:</label>
        <input type="text" name="breed" id="seed" <?php echo $breed2Err ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $breed2Err; ?></div>
        </div>
        <div>
        <label for="vet">Vet. Name:</label>
        <input type="text" name="vet" id="vet" <?php echo $vetErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $vetErr; ?></div>
        <label for="comments">Comments:</label>
        <input type="text" name="comment" id="comments" <?php echo $commentErr ? 'errormsg' : null; ?>>
        <div class="errormsg"><?php echo $commentErr; ?></div>
        </div>
        <input type="submit" name="submit3" value="add data" class="btn3">
    </form>
</div>


<div class="sqltable" id="sqltable3">

    <h1 class="priority_header">recent a.i. records</h1>

    <?php if (empty($ai_data)) : ?>
        <p>No Recent Activities</p>
    <?php endif; ?>

    <?php foreach ($ai_data as $item) : ?>

        <table>
            <thead>
                <th>name</th>
                <th>id number</th>
                <th>breed</th>
                <th>vet</th>
                <th>comments</th>
                <th>date</th>
                <th>action</th>
            </thead>
            <tbody>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['idnumber']; ?></td>
                <td><?php echo $item['breed']; ?></td>
                <td><?php echo $item['vet']; ?></td>
                <td><?php echo $item['comments']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td>
                <a href="deletelivestock2.php?id=<?php echo $item['id']; ?>" class="tablebtn1">DELETE</a>
                </td>
            </tbody>
        </table>

    <?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>