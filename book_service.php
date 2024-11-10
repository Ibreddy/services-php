<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customerName'];
    $contactInfo = $_POST['contactInfo'];
    $vehicleType = $_POST['vehicleType'];

    $jobSheetNumber = 'JS' . rand(1000, 9999);

    if (!is_dir('jobs')) {
        mkdir('jobs', 0777, true);
    }

    $statusFile = "jobs/$jobSheetNumber.txt";

    $jobDetails = "Job Sheet Number: $jobSheetNumber\nCustomer Name: $customerName\nContact Information: $contactInfo\nVehicle Type: $vehicleType\nStatus: Pending";
    
    file_put_contents($statusFile, $jobDetails);

    echo "<html><head><style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://static.overfuel.com/dealers/auto-city/image/regular-maintenance-for-your-car-1024x576.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 0;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .job-details {
            margin: 20px 0;
            padding: 15px;
            background-color: #e9ecef;
            border-left: 5px solid #007bff;
        }
        .job-details p {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style></head><body>";

    echo "<div class='container'>";
    echo "<h2>Booking Confirmed</h2>";
    echo "<div class='job-details'>";
    echo "<p><strong>Job Sheet Number:</strong> $jobSheetNumber</p>";
    echo "<p><strong>Customer Name:</strong> $customerName</p>";
    echo "<p><strong>Contact Information:</strong> $contactInfo</p>";
    echo "<p><strong>Vehicle Type:</strong> $vehicleType</p>";
    echo "<p><strong>Status:</strong> Pending</p>";
    echo "</div>";
    echo "<p><a href='index.php'>Return to Home</a></p>";
    echo "</div>";
    echo "</body></html>";
}
?>
