<?php
session_start();

$errors = [];
$studentData = [
    "name" => "",
    "pob" => "",
    "dob" => "",
    "address" => "",
    "gender" => "",
    "telephone" => "",
    "email" => "",
    "parent_name" => "",
    "parent_telephone" => "",
    "relationship" => "",
    "student_id" => "",
    "faculty" => "",
    "department" => "",
    "class" => "",
    "registration_date" => ""
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($studentData as $fieldName => $value) {
        $studentData[$fieldName] = trim($_POST[$fieldName] ?? "");
    }

    // Check that every text/select/date field has an entry.
    foreach ($studentData as $fieldName => $value) {
        if ($value === "") {
            $errors[$fieldName] = "Please enter/select " . str_replace("_", " ", $fieldName) . ".";
        }
    }

    // Name must contain only letters and spaces.
    if (
        $studentData["name"] !== "" &&
        !preg_match("/^[\p{L} ]+$/u", $studentData["name"])
    ) {
        $errors["name"] = "Name must contain only letters and spaces.";
    }

    // Validate email format.
    if (
        $studentData["email"] !== "" &&
        !filter_var($studentData["email"], FILTER_VALIDATE_EMAIL)
    ) {
        $errors["email"] = "Please enter a valid email address.";
    }

    // Validate uploaded image.
    $allowedExtensions = ["png", "jpg", "jpeg", "gif", "webp"];
    $imagePath = "";

    if (!isset($_FILES["image"]) || $_FILES["image"]["error"] === UPLOAD_ERR_NO_FILE) {
        $errors["image"] = "Please upload a profile image.";
    } elseif ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        $errors["image"] = "The image could not be uploaded. Please try again.";
    } else {
        $imageFile = $_FILES["image"];
        $extensionension = strtolower(pathinfo($imageFile["name"], PATHINFO_EXTENSION));

        if (!in_array($extensionension, $allowedExtensions, true)) {
            $errors["image"] = "Allowed image types: PNG, JPG, JPEG, GIF, WEBP.";
        } elseif ($imageFile["size"] > 2 * 1024 * 1024) {
            $errors["image"] = "Image size must not exceed 2 MB.";
        } else {
            // Check the actual file content, not only the filename extension.
            $imageInfo = @getimagesize($imageFile["tmp_name"]);
            if ($imageInfo === false) {
                $errors["image"] = "The selected file is not a valid image.";
            }
        }
    }

    if (empty($errors)) {
        $uploadDirectory = __DIR__ . "/uploads/";

        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $newFileName = bin2hex(random_bytes(16)) . "." . $extensionension;
        $destination = $uploadDirectory . $newFileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
            $imagePath = "uploads/" . $newFileName;
            $_SESSION["student"] = $studentData;
            $_SESSION["student"]["image"] = $imagePath;

            // Redirect to a separate page to display the submitted information.
            header("Location: result.php");
            exit;
        } else {
            $errors["image"] = "The image could not be saved. Check the uploads fstudentDataer permissions.";
        }
    }
}

function safeText
{
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}

function showErro($fieldName, $errors)
{
    if (isset($errors[$fieldName])) {
        return '<div class="text-danger small mt-1">' . e($errors[$fieldName]) . '</div>';
    }
    return "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm mx-auto" style="max-width: 1000px;">
            <div class="card-header bg-primary text-white text-center py-3">
                <h1 class="h3 mb-1">Student Registration Form</h1>
                <p class="mb-0">Jamhuriya University of Science &amp; Technology</p>
            </div>
            <div class="card-body p-4">
                <p class="text-muted">Fields marked with * are required.</p>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Please correct the following:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($errors as $statusMessage): ?>
                                <li><?= e($statusMessage) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" enctype="multipart/form-data" id="registrationForm" novalidate>
                    <fieldset class="border rounded p-3 mb-4">
                        <legend class="float-none w-auto px-2 fs-5 text-primary">Personal Information</legend>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                                    id="name" name="name" value="<?= e($studentData['name']) ?>" required>
                                <?= showErro("name", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="pob" class="form-label">Place of Birth (POB) *</label>
                                <input type="text" class="form-control" id="pob" name="pob" value="<?= e($studentData['pob']) ?>" required>
                                <?= showErro("pob", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth (DOB) *</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?= e($studentData['dob']) ?>" required>
                                <?= showErro("dob", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address *</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= e($studentData['address']) ?>" required>
                                <?= showErro("address", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender *</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Choose gender</option>
                                    <option value="Male" <?= $studentData['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= $studentData['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                                </select>
                                <?= showErro("gender", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Telephone *</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" value="<?= e($studentData['telephone']) ?>" required>
                                <?= showErro("telephone", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                    id="email" name="email" value="<?= e($studentData['email']) ?>" required>
                                <?= showErro("email", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Profile Image * (PNG/JPG/JPEG/GIF/WEBP)</label>
                                <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid' : '' ?>"
                                    id="image" name="image" accept=".png,.jpg,.jpeg,.gif,.webp,image/*" required>
                                <?= showErro("image", $errors) ?>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border rounded p-3 mb-4">
                        <legend class="float-none w-auto px-2 fs-5 text-primary">Parent Information</legend>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="parent_name" class="form-label">Parent Name *</label>
                                <input type="text" class="form-control" id="parent_name" name="parent_name" value="<?= e($studentData['parent_name']) ?>" required>
                                <?= showErro("parent_name", $errors) ?>
                            </div>
                            <div class="col-md-4">
                                <label for="parent_telephone" class="form-label">Parent Telephone *</label>
                                <input type="tel" class="form-control" id="parent_telephone" name="parent_telephone" value="<?= e($studentData['parent_telephone']) ?>" required>
                                <?= showErro("parent_telephone", $errors) ?>
                            </div>
                            <div class="col-md-4">
                                <label for="relationship" class="form-label">Relationship *</label>
                                <select class="form-select" id="relationship" name="relationship" required>
                                    <option value="">Choose relationship</option>
                                    <?php foreach (["Father", "Mother", "Guardian"] as $relation): ?>
                                        <option value="<?= e($relation) ?>" <?= $studentData['relationship'] === $relation ? 'selected' : '' ?>>
                                            <?= e($relation) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= showErro("relationship", $errors) ?>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border rounded p-3 mb-4">
                        <legend class="float-none w-auto px-2 fs-5 text-primary">Academic Information</legend>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="student_id" class="form-label">Student ID *</label>
                                <input type="text" class="form-control" id="student_id" name="student_id" value="<?= e($studentData['student_id']) ?>" required>
                                <?= showErro("student_id", $errors) ?>
                            </div>
                            <div class="col-md-4">
                                <label for="faculty" class="form-label">Faculty *</label>
                                <input type="text" class="form-control" id="faculty" name="faculty" value="<?= e($studentData['faculty']) ?>" required>
                                <?= showErro("faculty", $errors) ?>
                            </div>
                            <div class="col-md-4">
                                <label for="department" class="form-label">Department *</label>
                                <input type="text" class="form-control" id="department" name="department" value="<?= e($studentData['department']) ?>" required>
                                <?= showErro("department", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="class" class="form-label">Class *</label>
                                <input type="text" class="form-control" id="class" name="class" value="<?= e($studentData['class']) ?>" required>
                                <?= showErro("class", $errors) ?>
                            </div>
                            <div class="col-md-6">
                                <label for="registration_date" class="form-label">Registration Date *</label>
                                <input type="date" class="form-control" id="registration_date" name="registration_date" value="<?= e($studentData['registration_date']) ?>" required>
                                <?= showErro("registration_date", $errors) ?>
                            </div>
                        </div>
                    </fieldset>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Register</button>
                        <button type="reset" class="btn btn-outline-secondary">Clear Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (!empty($errors)): ?>
        <script>
            // Move the user to the first field with an error.
            document.addEventListener("DOMContentLoaded", function() {
                const firstInvalid = document.querySelector(
                    "#registrationForm [name='<?= e(array_key_first($errors)) ?>']"
                );
                if (firstInvalid) {
                    firstInvalid.focus();
                    firstInvalid.scrollIntoView({
                        behavior: "smooth",
                        block: "center"
                    });
                }
            });
        </script>
    <?php endif; ?>
</body>

</html>