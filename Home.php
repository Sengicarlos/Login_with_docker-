<?php
session_start();
include "db_conn.php";

// If form is submitted to update user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_user'])) {
    $id = intval($_POST['id']);
    $username = $_POST['user_name'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET user_name=?, name=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $username, $name, $password, $id);
    $stmt->execute();
}

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - User Table</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="edit.css">
    
</head>
<body>

<div class="header">
    <div class="header1" style="text-align: right; padding: 10px;">
    <a href="Logout.php" style="font-size: 18px;">Logout</a></div>
</div>

<h1>Users Table</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Name</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['user_name']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['password']) ?></td>
        <td>
            <a onclick="openEditModal(<?= htmlspecialchars(json_encode($row)) ?>)">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?');">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<!-- Modal and background -->
<div id="editModal">
    <h2>Edit User</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" id="editId">
        <label>Username:</label><br>
        <input type="text" name="user_name" id="editUsername" required><br><br>

        <label>Name:</label><br>
        <input type="text" name="name" id="editName" required><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" id="editPassword" required><br><br>

        <button type="submit" name="update_user">Update</button>
        <button type="button" onclick="closeModal()">Cancel</button>
    </form>
</div>

<div id="modalBackground" onclick="closeModal()"></div>

<script>
// Open the modal and fill the form
function openEditModal(user) {
    document.getElementById('editId').value = user.id;
    document.getElementById('editUsername').value = user.user_name;
    document.getElementById('editName').value = user.name;
    document.getElementById('editPassword').value = user.password;

    document.getElementById('editModal').style.display = 'block';
    document.getElementById('modalBackground').style.display = 'block';
}

// Close the modal
function closeModal() {
    document.getElementById('editModal').style.display = 'none';
    document.getElementById('modalBackground').style.display = 'none';
}
</script>

<footer></footer>

</body>
</html>
