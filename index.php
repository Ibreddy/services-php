<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Service Center</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://c8.alamy.com/comp/PXHXG6/auto-service-and-vehicle-maintenance-by-professional-technician-in-the-background-automotive-industry-PXHXG6.jpg'); 
      background-size: cover;
      background-position: center;
      color: #fff;
      margin: 0;
      padding: 0;
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
    label {
      display: block;
      margin-top: 10px;
    }
    input, select, button {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: none;
    }
    button {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    .links a {
      color: #fff;
      text-decoration: underline;
      margin: 0 10px;
    }
    .links a:hover {
      color: #00bfff;
    }
  </style>
  <script>
    function updateEstimation() {
      const serviceType = document.getElementById('serviceType').value;
      const estimationField = document.getElementById('estimationCost');
      
      let cost;
      switch (serviceType) {
        case 'Basic':
          cost = "$50";
          break;
        case 'Standard':
          cost = "$100";
          break;
        case 'Premium':
          cost = "$150";
          break;
        case 'Full':
          cost = "$200";
          break;
        default:
          cost = "";
      }
      estimationField.value = cost;
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Welcome to Our Vehicle Service Center</h1>
    <form action="book_service.php" method="POST">
      <h2>Book a Service</h2>

      <label for="customerName">Owner Name:</label>
      <input type="text" id="customerName" name="customerName" required>

      <label for="contactInfo">Contact Information:</label>
      <input type="text" id="contactInfo" name="contactInfo" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="vehicleType">Vehicle Type:</label>
      <select id="vehicleType" name="vehicleType" required>
        <option value="">Select Vehicle Type</option>
        <option value="Car">Car</option>
        <option value="Bike">Bike</option>
        <option value="Truck">Truck</option>
        <option value="SUV">SUV</option>
        <option value="Van">Van</option>
      </select>

      <label for="vehicleModel">Vehicle Model:</label>
      <input type="text" id="vehicleModel" name="vehicleModel" required>

      <label for="licensePlate">License Plate:</label>
      <input type="text" id="licensePlate" name="licensePlate" required>

      <label for="serviceParts">Service Parts Needed:</label>
      <input type="text" id="serviceParts" name="serviceParts" placeholder="e.g., oil filter, brake pads" required>

      <label for="serviceType">Service Type:</label>
      <select id="serviceType" name="serviceType" onchange="updateEstimation()" required>
        <option value="">Select Service Type</option>
        <option value="Basic">Basic</option>
        <option value="Standard">Standard</option>
        <option value="Premium">Premium</option>
        <option value="Full">Full</option>
      </select>

      <label for="estimationCost">Estimated Cost:</label>
      <input type="text" id="estimationCost" name="estimationCost" readonly>

      <button type="submit">Book Service</button>
    </form>

    <div class="links">
      <a href="check_status.php" style="color: #fff; text-decoration: underline;">Check Service Status</a>
      <a href="update_status.php" style="color: #fff; text-decoration: underline;">Update the Status</a>
    </div>
  </div>
</body>
</html>
