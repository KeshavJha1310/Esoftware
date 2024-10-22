<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

// Establish a database connection
$conn = mysqli_connect('127.0.0.1:3306', 'root', '', 'e_software_new');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch water usage data for a specific user (replace 'username' with the actual username)
$username = $_SESSION['username'];
$sql_water = "SELECT * FROM water WHERE NAME='$username'";
$result_water = mysqli_query($conn, $sql_water);

// Fetch fuel usage data for a specific user (replace 'username' with the actual username)
$sql_fuel = "SELECT * FROM fuels WHERE Name='$username'";
$result_fuel = mysqli_query($conn, $sql_fuel);

// Fetch electricity usage data for a specific user (replace 'username' with the actual username)
$sql_electricity = "SELECT * FROM electricity WHERE Name='$username'";
$result_electricity = mysqli_query($conn, $sql_electricity);

// Close the database connection (optional)
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <!-- Add your CSS links and other head content here -->
    <!-- <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./history.css" /> -->
    <link rel="icon" type="image" href="images\favicon.ico.png"> 
<title>History</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Sans:wght@700&display=swap" />
    <style>
        /* Add your CSS styles here */

        /* Reset some default styles */
        body, h2, table {
            margin: 0;
            padding: 0;
        }

        /* Set a background color and font-family */
        body {
            background-color: #f4f4f4;
            font-family: 'Inter', sans-serif;
        }

        /* Style the page container */
        .history {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 1061px;
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Style table headers */
        th {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        /* Style table rows */
        tr {
            background-color: #fff;
        }

        /* Style alternating rows with a light background color */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Style table cells */
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        /* Center the h2 heading */
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        /* Add some spacing below the table */
        .water-data, .fuel-data, .electricity-data {
            margin-bottom: 20px;
        }

        /* Additional styling for the fuel and electricity data tables */
        .fuel-data table, .electricity-data table {
            margin-top: 0; /* Remove the top margin for the fuel and electricity tables */
        }
        .e-software {
            position: relative;
    margin-top: 100px;
    margin-bottom: 70px;
    top: 10px;
    top: 57%;
    left: 50%;
    transform: translate(-35%, 44%);
    font-size: 40px;
    color: rgba(0, 0, 0, 0.79);
    /* display: flex; */
    justify-content: center;
    align-items: center;
    width: 312px;
    height: 54px;
  }
  .e-software  img {
    position: absolute;
    top: 50%;
  left: 50%;
  transform: translate(-104%, -147%);
    width: 100px;
    height: 100px;
  }
    </style>
</head>

<body>
<div class="history">
<div class="e-software">E-Software
        <img src="./images/logo.jpg">
      </div>
    <div class="history-child">
        <div class="water-data">
            <h2>Water Usage Data</h2>
            <table>
                <!-- Water usage table content -->
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Drinking</th>
                    <th>Bathing</th>
                    <th>Cooking</th>
                    <th>Washing</th>
                    <th>Cleaning</th>
                    <!-- <th>Gardening</th> -->
                    <th>Other</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Display the water usage data in the table
                while ($row = mysqli_fetch_assoc($result_water)) {
                    echo "<tr>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['Drinking'] . " L</td>";
                    echo "<td>" . $row['Bathing'] . " L</td>";
                    echo "<td>" . $row['Cooking'] . " L</td>";
                    echo "<td>" . $row['Washing'] . " L</td>";
                    echo "<td>" . $row['Cleaning'] . " L</td>";
                    // echo "<td>" . $row['Gardening'] . "</td>";
                    echo "<td>" . $row['other'] . " L</td>";
                    echo "<td>" . $row['Total'] . " L</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="fuel-data">
            <h2>Fuel Usage Data</h2>
            <table>
                <!-- Fuel usage table content -->
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Distance</th>
                    <th>Mileage</th>
                    <th>LPG</th>
                    <th>Total Carbon</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Display the fuel usage data in the table
                while ($row = mysqli_fetch_assoc($result_fuel)) {
                    echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['distance'] . " km</td>";
                    echo "<td>" . $row['mileage'] . " KPL</td>";
                    echo "<td>" . $row['LPG'] . " L</td>";
                    echo "<td>" . $row['Total_C'] . " L</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="electricity-data">
            <h2>Electricity Usage Data</h2>
            <table>
                <!-- Electricity usage table content -->
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Months</th>
                    <th>No. of Units</th>
                    <th>Total Electricity</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Display the electricity usage data in the table
                while ($row = mysqli_fetch_assoc($result_electricity)) {
                    echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['months_name'] . "</td>";
                    echo "<td>" . $row['no_of_units'] . " kWh</td>";
                    echo "<td>" . $row['Total_E'] . " L</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ... Rest of your HTML content ... -->
</div>
</body>
</html>
