<?php
if (isset($_GET['jobSheetNumber'])) {
    $jobSheetNumber = $_GET['jobSheetNumber'];
    $statusFile = "jobs/$jobSheetNumber.txt";

    if (file_exists($statusFile)) {
        $contents = file($statusFile, FILE_IGNORE_NEW_LINES);

        $customerName = $contents[1]; 
        $vehicleType = $contents[3]; 

        $cost = ($vehicleType === "Car") ? 200 : (($vehicleType === "Bike") ? 100 : 300);
    } else {
        echo "<p>Invalid job sheet number.</p>";
        exit;
    }
} else {
    echo "<p>No job sheet number provided.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://www.group1auto.com/images/upload/malone/service/auto-service-faq.jpg') no-repeat center center fixed;
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
            background: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #007bff;
        }

        p {
            font-size: 18px;
        }

        .cost {
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>

<div class="container">
    
    <h1>Receipt</h1>
    <p><strong>Job Sheet Number:</strong> <?php echo $jobSheetNumber; ?></p>
    <p><strong>Customer Name:</strong> <?php echo $customerName; ?></p>
    <p><strong>Vehicle Type:</strong> <?php echo $vehicleType; ?></p>
    <p><strong>Service Cost:</strong> <span class="cost">$<?php echo number_format($cost, 1); ?></span></p>
    <p><a href="index.php" style="color: #007bff;">Return to Home</a></p>
</div>

</body>
</html>
