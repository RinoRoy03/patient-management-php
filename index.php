<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#f8f9fa;">

<div class="container mt-5">

    <h2 class="text-center mb-4">Patient Management System</h2>

    <!-- Top Section -->
    <div class="d-flex justify-content-between mb-3">
        <a href="add.php" class="btn btn-primary">Add Patient</a>

        <!-- 🔍 Search -->
        <form method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search by name">
            <button class="btn btn-success">Search</button>
        </form>
    </div>

    <!-- Table -->
    <table class="table table-bordered table-striped text-center">
        <tr class="table-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Disease</th>
            <th>Actions</th>
        </tr>

<?php
// 🔍 Search Logic
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = $conn->query("SELECT * FROM patients WHERE name LIKE '%$search%'");
} else {
    $result = $conn->query("SELECT * FROM patients");
}

// 🔁 Display Data
while($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['disease']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
<?php } ?>

    </table>

</div>

</body>
</html>