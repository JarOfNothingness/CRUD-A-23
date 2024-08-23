<?php
// Start output buffering to avoid header issues
ob_start();

include('header.php');
include("../LoginRegisterAuthentication/connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statements to prevent SQL injection
    $query_check = "SELECT * FROM attendance WHERE student_id = ?";
    $stmt_check = mysqli_prepare($connection, $query_check);
    mysqli_stmt_bind_param($stmt_check, 'i', $id);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        // If related records exist, display an error message
        header('Location: Crud.php?delete_msg=Cannot delete record as it is linked to attendance data.');
        exit();
    } else {
        // If no related records, proceed with deletion
        $query = "DELETE FROM students WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('Location: Crud.php?delete_msg=You have successfully deleted the data!');
            exit();
        }
    }
}

// End output buffering and flush the buffer
ob_end_flush();
?>

