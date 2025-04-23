<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id = $id");
    $student = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $full_name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $schedule = $_POST['schedule'];

    $conn->query("UPDATE students SET full_name='$full_name', age='$age', course='$course', schedule='$schedule' WHERE id=$id");

    header("Location: students.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/enroll.css">
</head>
<body>

<header>Welcome Admin</header>

<div class="container">
  <aside>
    <nav>
      <ul>
        <li><a href="admin_dashboard.html">Dashboard</a></li>
        <li><a href="enroll.html">Enroll Student</a></li>
        <li><a href="students.php">Student Records</a></li>
        <li><a href="courses.html">Courses</a></li>
        <li><a href="logout.html">Logout</a></li>
      </ul>
    </nav>
  </aside>

  <main>
    <h1>Edit Student</h1>
    <form method="post" class="enroll-form">
      <label>Full Name:</label>
      <input type="text" name="name" value="<?php echo $student['full_name']; ?>" required>

      <label>Age:</label>
      <input type="number" name="age" value="<?php echo $student['age']; ?>" required>

      <label>Course:</label>
      <input type="text" name="course" value="<?php echo $student['course']; ?>" required>

      <label>Schedule:</label>
      <input type="text" name="schedule" value="<?php echo $student['schedule']; ?>" required>

      <button type="submit" name="update">Update Student</button>
    </form>
  </main>
</div>

</body>
</html>
