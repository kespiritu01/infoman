<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, birthdate, gender, address, phone, email, guardian_name, guardian_relationship, guardian_phone, guardian_email, course, previous_school, schedule, applicant_signature) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssssssssssss", 
                      $_POST['first_name'], 
                      $_POST['last_name'], 
                      $_POST['birthdate'], 
                      $_POST['gender'], 
                      $_POST['address'], 
                      $_POST['phone'], 
                      $_POST['email'], 
                      $_POST['guardian_name'], 
                      $_POST['guardian_relationship'], 
                      $_POST['guardian_phone'], 
                      $_POST['guardian_email'], 
                      $_POST['course'], 
                      $_POST['previous_school'], 
                      $_POST['schedule'], 
                      $_POST['applicant_signature']);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to the students page
        header("Location: students.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Header, Sidebar, Main Layout</title>
  <link rel="stylesheet" href="css/enrollment.css">
</head>
<body>

<header>Welcome Admin</header>

<div class="container">
  <aside>
    <nav>
      <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="enrollment.php" class="active">Enroll Student</a></li>
        <li><a href="students.php">Student Records</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </nav>
  </aside>

  <main>
    <h1>Student Enrollment Form</h1>
    <form action="enroll.php" method="post" class="enroll-form">
      
      <h2>Student Information</h2>
      <label>First Name:</label>
      <input type="text" name="first_name" required>

      <label>Last Name:</label>
      <input type="text" name="last_name" required>

      <label>Birth Date:</label>
      <input type="date" name="birthdate" required>

      <label>Gender:</label>
      <div class="gender-options">
        <label><input type="radio" name="gender" value="Male" required> Male</label>
        <label><input type="radio" name="gender" value="Female" required> Female</label>
      </div>

      <label>Address:</label>
      <input type="text" name="address" required>

      <label>Contact Number:</label>
      <input type="tel" name="phone" required>

      <label>Email Address:</label>
      <input type="email" name="email" required>

      <h2>Parent/Guardian Information</h2>
      <label>Parent/Guardian Name:</label>
      <input type="text" name="guardian_name" required>

      <label>Relationship to Student:</label>
      <input type="text" name="guardian_relationship" required>

      <label>Guardian Contact Number:</label>
      <input type="tel" name="guardian_phone" required>

      <label>Guardian Email Address:</label>
      <input type="email" name="guardian_email" required>

      <h2>Academic Information</h2>
      <label>Grade/Program Applying For:</label>
      <input type="text" name="course" required>

      <label>Previous School (if applicable):</label>
      <input type="text" name="previous_school">

      <label>Schedule:</label>
      <input type="text" name="schedule" required>

      <h2>Consent and Signature</h2>
      <p>I confirm that all information provided above is true to the best of my knowledge.</p>

      <label>Applicant Signature (Type Full Name):</label>
      <input type="text" name="applicant_signature" required>

      <button type="submit">Enroll Student</button>

    </form>
  </main>
</div>

</body>
</html>
