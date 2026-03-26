<?php include 'db.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2>Add Patient</h2>

    <form method="POST">
        <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
        <input type="number" name="age" class="form-control mb-2" placeholder="Age" required>
        <input type="text" name="disease" class="form-control mb-2" placeholder="Disease" required>

        <button class="btn btn-primary">Add Patient</button>
    </form>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $disease = $_POST['disease'];

    $sql = "INSERT INTO patients (name, age, disease) 
            VALUES ('$name', '$age', '$disease')";

    if($conn->query($sql)){
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>