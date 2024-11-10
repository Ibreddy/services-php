<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check Service Status</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://www.garage.movemycar.in/assets/images/content-image-2.png');
      background-size: cover;
      background-position: center;
      color: #fff;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background: rgba(0, 0, 0, 0.7);
      padding: 20px;
      border-radius: 10px;
      margin-top: 40px;
    }
    h1, h2 {
      text-align: center;
    }
    label, p {
      display: block;
      margin-top: 10px;
    }
    input, button {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: none;
    }
    .home-button {
      background-color: #007bff;
      color: white;
      text-align: center;
      padding: 10px;
      border-radius: 5px;
      text-decoration: none;
      display: inline-block;
      width: auto;
      cursor: pointer;
      margin-top: 20px;
    }
    .home-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Check Vehicle Service Status</h1>
    <form action="check_status.php" method="POST">
      <label for="jobSheetNumber">Enter Job Sheet Number:</label>
      <input type="text" id="jobSheetNumber" name="jobSheetNumber" required>
      <button type="submit">Check Status</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jobSheetNumber = $_POST['jobSheetNumber'];
        $statusFile = "jobs/$jobSheetNumber.txt";

        if (file_exists($statusFile)) {
            $contents = file($statusFile, FILE_IGNORE_NEW_LINES);
            $status = end($contents);
            echo "<p><strong>Service Status:</strong> $status</p>";
            if ($status === "Completed") {
                echo '<p><a href="download_receipt.php?jobSheetNumber=' . $jobSheetNumber . '">Download Receipt</a></p>';
            }
        } else {
            echo "<p>Invalid job sheet number. Please try again.</p>";
        }
    }
    ?>

    <!-- Return to Home Button -->
    <a href="index.php" class="home-button">Return to Home</a>
  </div>
</body>
</html>
