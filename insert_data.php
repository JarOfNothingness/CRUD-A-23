<?php
include("../LoginRegisterAuthentication/connection.php");

if (isset($_POST['add_students'])) {
    $learners_name = $_POST['learners_name'];
    $region = $_POST['region'];
    $division = $_POST['division'];
    $school_id = $_POST['school_id'];
    $school_year = $_POST['school_year'];
    $grade = $_POST['grade'];
    $school_level = $_POST['school_level'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];

    $query = "INSERT INTO students (learners_name, region, division, school_id, school_year, grade, school_level, gender, subject) VALUES ('$learners_name', '$region',  '$division', '$school_id', '$school_year', '$grade', '$school_level', '$gender', '$subject')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: crud.php?insert_msg=Student added successfully!");
    } else {
        header("Location: crud.php?insert_msg=Error adding student: " . mysqli_error($connection));
    }
}
?>