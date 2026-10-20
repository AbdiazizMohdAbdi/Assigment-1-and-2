<?php
session_start();

if (!isset($_SESSION["student"])) {
    header("Location: index.php");
    exit;
}

$student = $_SESSION["student"];

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 1000px;">
        <div class="card-header bg-success text-white text-center py-3">
            <h1 class="h3 mb-1">Registration Successful</h1>
            <p class="mb-0">Student Information</p>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-success">The form was submitted successfully.</div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr><th style="width: 30%">Information</th><th>Submitted Details</th></tr>
                    </thead>
                    <tbody>
                        <tr class="table-primary"><th colspan="2">Personal Information</th></tr>
                        <tr><th>Profile Image</th><td><img src="<?= e($student['image']) ?>" alt="Student profile image" style="width:120px;height:120px;object-fit:cover" class="rounded border"></td></tr>
                        <tr><th>Full Name</th><td><?= e($student["name"]) ?></td></tr>
                        <tr><th>Place of Birth</th><td><?= e($student["pob"]) ?></td></tr>
                        <tr><th>Date of Birth</th><td><?= e($student["dob"]) ?></td></tr>
                        <tr><th>Address</th><td><?= e($student["address"]) ?></td></tr>
                        <tr><th>Gender</th><td><?= e($student["gender"]) ?></td></tr>
                        <tr><th>Telephone</th><td><?= e($student["telephone"]) ?></td></tr>
                        <tr><th>Email</th><td><?= e($student["email"]) ?></td></tr>

                        <tr class="table-primary"><th colspan="2">Parent Information</th></tr>
                        <tr><th>Parent Name</th><td><?= e($student["parent_name"]) ?></td></tr>
                        <tr><th>Parent Telephone</th><td><?= e($student["parent_telephone"]) ?></td></tr>
                        <tr><th>Relationship</th><td><?= e($student["relationship"]) ?></td></tr>

                        <tr class="table-primary"><th colspan="2">Academic Information</th></tr>
                        <tr><th>Student ID</th><td><?= e($student["student_id"]) ?></td></tr>
                        <tr><th>Faculty</th><td><?= e($student["faculty"]) ?></td></tr>
                        <tr><th>Department</th><td><?= e($student["department"]) ?></td></tr>
                        <tr><th>Class</th><td><?= e($student["class"]) ?></td></tr>
                        <tr><th>Registration Date</th><td><?= e($student["registration_date"]) ?></td></tr>
                    </tbody>
                </table>
            </div>
            <a href="index.php" class="btn btn-primary">Register Another Student</a>
        </div>
    </div>
</div>
</body>
</html>
