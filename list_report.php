<?php
// Sisipkan koneksi.php
include 'koneksi.php';

// Query untuk mendapatkan data dari tabel master_invoice
$query = "SELECT * FROM master_invoice";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            font-size: 14px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f4f4; /* Light gray background color */
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            background-color: #344; /* Dark background color */
            padding: 20px;
            min-width: 200px;
            box-sizing: border-box;
            color: white;
        }

        .header {
            background-color: #333; /* Dark background color */
            padding: 10px;
            min-width: 200px;
            box-sizing: border-box;
            color: white;
        }

        .menu a {
            text-decoration: none;
            padding: 10px;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
            display: block;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #555; /* Slightly darker color on hover */
        }

        .logout {
            text-align: center;
            margin-top: auto;
        }

        .logout a {
            text-decoration: none;
            padding: 10px;
            background-color: #d32f2f; /* Red color for logout button */
            color: white;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s;
        }

        .logout a:hover {
            background-color: #b71c1c; /* Slightly darker red on hover */
        }

        .content {
            padding: 20px;
            flex: 1;
            background-color: white; /* White background color for content */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container a, .button-container button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container a:hover, .button-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Dashboard Invoice</h1>
    </div>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Menu Links (Add or modify links as needed) -->
           <div class="menu">
                <a href="input-invoice.php">Create Invoice</a>
				<a href="">Master Data Invoice</a>
                <a href="">Master Data Customer</a>
                <a href="">Master Data Car Brand</a>
                <a href="">Master Data Car Type</a>
                <a href="list_report.php">Report Invoice</a>
            </div>
            <!-- Logout Link -->
            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="content">
            <!-- Inner Header -->
            <div class="inner-header">
                <div>
                    <h2>Invoice Data List</h2>
                </div>
                <div class="button-container">
                    <button onclick="exportToExcel()">Export to Excel</button>
                </div>
            </div>

            <?php
            // Check if there is data in master_invoice table
            if (mysqli_num_rows($result) > 0) {
                // Display data in a table
                echo "<table>";
                echo "<tr>
                        <th>No.invc</th>
                        <th>Nama cust</th>
                        <th>Type mobil</th>
                        <th>Item description</th>
                        <th>Window Position</th>
                        <th>Nominal invc</th>
                    </tr>";

                $no = 1; // Initialize serial number

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['sales_invoice'] . "</td>";
                    echo "<td>" . $row['cus_name'] . "</td>";
                    echo "<td>" . $row['car_model'] . "</td>";
                    echo "<td>" . $row['inv_desc'].'+'.$row['inv_desc2'] . "</td>";
                    echo "<td>" . $row['win_pos'] . "</td>"; 	
                    echo "<td>" . $row['total'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No invoice data available.</p>";
            }

            // Close the connection
            mysqli_close($koneksi);
            ?>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

    <script>
        function exportToExcel() {
            var table = document.querySelector('table');
            var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet JS" });
            XLSX.writeFile(wb, 'invoice_report.xlsx');
        }
    </script>
</html>
