<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');

try {
    // Instantiate our PDO Database Object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    //echo 'Connected to database!';
}
catch(PDOException $e){
    die($e->getMessage());
}



// SELECT QUERY MULTIPLE ROWS
// 1. Define the query
$sql = "SELECT * FROM student ORDER BY last asc";

// 2. Prepare the statement
$statement = $dbh->prepare($sql);

// 3. Execute the query
$statement->execute();

// 4. Process the Results
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Student List</h1>
            <ul>
                <?php
                    foreach ($result as $row){
                        echo "<li>".$row['last'].", ".$row['first']."</li>";
                    }
                ?>
            </ul>
        </div>
        <div class="col">
            <form action="add-student.php" method="POST">
                <h2>Add New Student</h2>
                <div class="row mb-2">
                    <div class="col-3">
                        <label for="sid" class="form-label">SID</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="sid" name="sid" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label for="lName" class="form-label-col">Last</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="lName" name="lName" />
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-3">
                        <label for="fName" class="form-label">First</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="fName" name="fName" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label for="bday" class="form-label">Birthdate</label>
                    </div>
                    <div class="col-9">
                        <input type="date" class="form-control" id="bday" name="bday" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label for="gpa" class="form-label">GPA</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="gpa" name="gpa" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label for="advisor" class="form-label">Advisor</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="advisor" name="advisor" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col"></div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit" onsubmit="">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



<?php

function addStudent(){

}
