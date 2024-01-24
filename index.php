
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utama</title>
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
    </style>

</head>
<body>
<div class="header">
    <h1>Dashboard Utama</h1>
</div>
    <div class="container">
        <div class="sidebar">
            <div class="menu">
                <a href="input-invoice.php">Create Invoice</a>
				<a href="">Master Data Invoice</a>
                <a href="list_customer.php">Master Data Customer</a>
                <a href="">Master Data Car Brand</a>
                <a href="">Master Data Car Type</a>
				
                <a href="list_report.php">Report Invoice</a>
            </div>
            
        </div>
        <div class="content">
            <!-- Your main content goes here -->
        </div>
    </div>
</body>
</html>
