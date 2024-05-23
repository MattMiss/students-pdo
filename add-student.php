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

// UPDATE query
// 1. Define the query
$sql = "INSERT INTO student (sid, last, first, birthdate, gpa, advisor) VALUES (:sid, :last, :first, :birthdate, :gpa, :advisor)";

// 2. Prepare the statement
$statement = $dbh->prepare($sql);

// 3. Bind the parameters
$sid = $_POST['sid'];
$last = $_POST['lName'];
$first = $_POST['fName'];
$birthdate = $_POST['bday'];
$gpa = $_POST['gpa'];
$advisor = $_POST['advisor'];

$statement->bindParam(':sid', $sid);
$statement->bindParam(':last', $last);
$statement->bindParam(':first', $first);
$statement->bindParam(':birthdate', $birthdate);
$statement->bindParam(':gpa', $gpa);
$statement->bindParam(':advisor', $advisor);


// 4. Execute the query
try {
    $successful = $statement->execute();
    if ($successful){
        echo "<p>". $first . " " . $last . " was inserted successfully!</p>";
    }
} catch (\PDOException $e) {
    echo $e->getMessage() . '<BR>';
}

?>
<br>
<a href="../students-pdo">Go Back</a>