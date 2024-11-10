<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Service Status</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('https://acko-cms.ackoassets.com/Car_Maintenance_Tips_98aa72eb1f.png') no-repeat center center fixed; /* Background Image */
      background-size: cover;
      color: #333;
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      max-width: 600px;
      width: 100%;
      background: rgba(255, 255, 255, 0.9); 
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1, h2 {
      text-align: center;
    }

    label, p {
      display: block;
      margin-top: 10px;
    }

    input, select, button {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      background-color: #007bff;
      color: white;
      border: none;
    }

    button:hover {
      background-color: #0056b3;
    }

    .form-container {
      display: none;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    .form-container.show {
      display: block;
      opacity: 1;
    }

    .password-container {
      margin-bottom: 20px;
    }

    .return-btn {
      margin-top: 20px;
      background-color: #28a745;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      text-align: center;
      cursor: pointer;
      width: 100%;
    }

    .return-btn:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <div class="container">

    <div id="passwordContainer" class="password-container">
      <h1>Enter Password</h1>
      <input type="password" id="password" placeholder="Enter the password" required>
      <button type="button" onclick="checkPassword()">Submit</button>
      <p id="errorMessage" style="color: red; display: none;">Incorrect password, please try again.</p>
    </div>

    <div id="formContainer" class="form-container">
      <h1>Update Service Status</h1>
      <form action="update_status.php" method="POST">
        <label for="jobSheetNumber">Enter Job Sheet Number:</label>
        <input type="text" id="jobSheetNumber" name="jobSheetNumber" required>

        <label for="newStatus">Select New Status:</label>
        <select id="newStatus" name="newStatus" required>
          <option value="In Progress">In Progress</option>
          <option value="Completed">Completed</option>
          <option value="Awaiting Parts">Awaiting Parts</option>
          <option value="Ready for Pickup">Ready for Pickup</option>
        </select>

        <button type="submit">Update Status</button>
      </form>

      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $jobSheetNumber = $_POST['jobSheetNumber'];
          $newStatus = $_POST['newStatus'];
          $statusFile = "jobs/$jobSheetNumber.txt";

          if (file_exists($statusFile)) {
              $contents = file($statusFile, FILE_IGNORE_NEW_LINES);
              array_pop($contents);
              $contents[] = $newStatus; 
              file_put_contents($statusFile, implode("\n", $contents));
              echo "<p>Status updated to: <strong>$newStatus</strong></p>";
          } else {
              echo "<p>Invalid job sheet number. Please try again.</p>";
          }
      }
      ?>

      <a href="index.php" class="home-button">Return to Home</a>
    </div>
  </div>

  <script>
    const correctPassword = 'aiml';

    function checkPassword() {
      const enteredPassword = document.getElementById('password').value;
      const passwordContainer = document.getElementById('passwordContainer');
      const formContainer = document.getElementById('formContainer');
      const errorMessage = document.getElementById('errorMessage');

      if (enteredPassword === correctPassword) {
        passwordContainer.style.display = 'none';
        formContainer.classList.add('show');
      } else {
        errorMessage.style.display = 'block';
      }
    }
  </script>
</body>
</html>
