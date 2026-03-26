<?php include 'db.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM patients WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#f8f9fa;">

<div class="container mt-5">

    <h2 class="text-center mb-4">Edit Patient</h2>

    <div class="card p-4 shadow">

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" 
                       value="<?php echo $data['name']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" 
                       value="<?php echo $data['age']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Disease</label>
                <input type="text" name="disease" class="form-control" 
                       value="<?php echo $data['disease']; ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>

        </form>

    </div>

</div>

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn->query("UPDATE patients SET 
        name='{$_POST['name']}',
        age='{$_POST['age']}',
        disease='{$_POST['disease']}'
        WHERE id=$id");

    header("Location: index.php");
}
?>