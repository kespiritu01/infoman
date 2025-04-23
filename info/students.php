<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
    <link rel="stylesheet" href="css/student.css">
</head>
<body>

<header>Welcome Admin</header>

<div class="container">
  <aside>
    <nav>
      <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="enrollment.php">Enroll Student</a></li>
        <li><a href="students.php" class="active">Student Records</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </nav>
  </aside>

  <main>
    <div class="main-header">
      <h1>Student Records</h1>
      <a href="enrollment.php" class="add-button">+ Add New Student</a>
    </div>

    <table class="student-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Age</th>
          <th>Course</th>
          <th>Schedule</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM students");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['schedule']}</td>
                    <td>
                      <a href='edit.php?id={$row['id']}'><button class='edit'>Edit</button></a>
                      <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this student?\");'><button class='delete'>Delete</button></a>
                    </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No students found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </main>
</div>

</body>
</html>
