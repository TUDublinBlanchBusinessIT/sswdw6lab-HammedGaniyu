<?php
include 'dbcon.php';

$visitDate = $_POST['visitDate'];
$visitTime = $_POST['visitTime'];
$doctorID = $_POST['docid'];
$patientID = $_POST['ptntid'];
$cost = $_POST['cost'];

if (empty($visitDate) || empty($visitTime) || empty($doctorID) || empty($patientID) || empty($cost)) {
    die("Error: All fields must be filled out.");
}

$sql = "INSERT INTO Visit (visit_Date, visit_Time, doctor_Id, patient_id, cost)
        VALUES ('$visitDate', '$visitTime', '$doctorID', '$patientID', '$cost')";

echo "<p><strong>SQL Query:</strong> $sql</p>";

if ($conn->query($sql) === TRUE) {
    echo "New visit successfully added!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
