
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 100%;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
	.hide {
      display: none;
    }
	.container {
    display: flex;
    justify-content: space-around; /* Align items with equal space between them */
    background-color: #eee; /* Add a light background color */
    padding: 10px; /* Add padding for better spacing */
}

.container a {
    text-decoration: none;
    padding: 10px 20px; /* Adjust padding for better spacing */
    border-radius: 5px;
    color: #333; /* Set text color */
    background-color: #fff; /* Set background color */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition effect */
}

.container a:hover {
    background-color: #555; /* Darker background color on hover */
    color: #fff; /* Light text color on hover */
}
    </style>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
<div class="header">
    <h1>Web Invoice</h1>
</div>
<div class="container">

    
    <a href="">Create Invoice</a>
	<a href="">Master Data Invoice</a>
    <a href="list_customer.php">Master Data Customer</a>
    <a href="">Master Data Car Brand</a>
    <a href="">Master Data Car Type</a>
    <a href="list_report.php">Report Invoice</a>
	
</div>
           
            
        
<div class="content">


 

    <form action="" method="post" >
	
	<?php
	
	include 'koneksi.php';
            // Initialize variables to avoid undefined variable errors
            $sales_invoice = $order_date =  $note1 = $note2 = $bong_pas = "";
            $ins_type = $status = $win_film_des = $sales_of_dealer = $amount = "";
            $cus_name = $cus_city = $cus_hp = $cus_add =  $cus_cp = $cus_email = $cus_nik = "";
            $car_brand = $car_mac = $car_model = $car_police = $car_year = $car_chas = "";
            $inv_cat =	 $inv_date  = $inv_desc = $win_pos = $pos_dtl = $qty = $price =  "";
            $inv_cat1=   $inv_desc1 = $win_pos1 = $pos_dtl1 = $qty1 = $price1 =  "";
            $inv_cat2=   $inv_desc2 = $win_pos2 = $pos_dtl2 = $qty2 = $price2 =  "";
            $inv_cat3=   $inv_desc3 = $win_pos3 = $pos_dtl3 = $qty3 = $price3 =  "";
            $inv_cat4=   $inv_desc4 = $win_pos4 = $pos_dtl4 = $qty4 = $price4 =  "";
            $inv_cat5=   $inv_desc5 = $win_pos5 = $pos_dtl5 = $qty5 = $price5 =  "";
            $payment =   $total = "";

$car_brand_options = ''; // Variable to store technician options

// Fetch technician names from the database
$sql_car_brand = "SELECT car_brand FROM car_brand";
$result_car_brand = $koneksi->query($sql_car_brand);

if ($result_car_brand->num_rows > 0) {
    while ($row_car_brand = $result_car_brand->fetch_assoc()) {
        $car_brand_name = $row_car_brand['car_brand'];
        $car_brand_options .= "<option value='$car_brand_name'>$car_brand_name</option>";
    }
}

$car_model_options = ''; // Variable to store technician options

// Fetch technician names from the database
$sql_car_model = "SELECT car_model FROM car_type";
$result_car_model = $koneksi->query($sql_car_model);

if ($result_car_model->num_rows > 0) {
    while ($row_car_model = $result_car_model->fetch_assoc()) {
        $car_model_name = $row_car_model['car_model'];
        $car_model_options .= "<option value='$car_model_name'>$car_model_name</option>";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
	
	
	
    $sales_invoice = mysqli_real_escape_string($koneksi, $_POST['sales_invoice']);
    $order_date = mysqli_real_escape_string($koneksi, $_POST['order_date']);
   
    $note1 = mysqli_real_escape_string($koneksi, $_POST['note1']);
    $note2 = mysqli_real_escape_string($koneksi, $_POST['note2']);
    $bong_pas = mysqli_real_escape_string($koneksi, $_POST['bong_pas']);
    $ins_date = mysqli_real_escape_string($koneksi, $_POST['ins_date']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    
    
    // Add other form fields similarly...
    $sales_of_dealer = mysqli_real_escape_string($koneksi, $_POST['sales_of_dealer']);
   
    $cus_name = mysqli_real_escape_string($koneksi, $_POST['cus_name']);
    $cus_city = mysqli_real_escape_string($koneksi, $_POST['cus_city']);
    $cus_hp = mysqli_real_escape_string($koneksi, $_POST['cus_hp']);
    $cus_add = mysqli_real_escape_string($koneksi, $_POST['cus_add']);
    $cus_nik = mysqli_real_escape_string($koneksi, $_POST['cus_nik']);
   
    $cus_cp = mysqli_real_escape_string($koneksi, $_POST['cus_cp']);
    $cus_email = mysqli_real_escape_string($koneksi, $_POST['cus_email']);
    $car_brand = mysqli_real_escape_string($koneksi, $_POST['car_brand']);
    $car_mac = mysqli_real_escape_string($koneksi, $_POST['car_mac']);
    $car_model = mysqli_real_escape_string($koneksi, $_POST['car_model']);
    $car_police = mysqli_real_escape_string($koneksi, $_POST['car_police']);
    $car_year = mysqli_real_escape_string($koneksi, $_POST['car_year']);
    $car_chas = mysqli_real_escape_string($koneksi, $_POST['car_chas']);
	
    $inv_cat = mysqli_real_escape_string($koneksi, $_POST['inv_cat']);
    $inv_desc = mysqli_real_escape_string($koneksi, $_POST['inv_desc']);
    $win_pos = mysqli_real_escape_string($koneksi, $_POST['win_pos']);
    $pos_dtl = mysqli_real_escape_string($koneksi, $_POST['pos_dtl']);
    $qty = mysqli_real_escape_string($koneksi, $_POST['qty']);
    $price = mysqli_real_escape_string($koneksi, $_POST['price']);
	
    $inv_cat2 = mysqli_real_escape_string($koneksi, $_POST['inv_cat2']);
    $inv_desc2 = mysqli_real_escape_string($koneksi, $_POST['inv_desc2']);
    $win_pos2 = mysqli_real_escape_string($koneksi, $_POST['win_pos2']);
    $pos_dtl2 = mysqli_real_escape_string($koneksi, $_POST['pos_dtl2']);
    $qty2 = mysqli_real_escape_string($koneksi, $_POST['qty2']);
    $price2 = mysqli_real_escape_string($koneksi, $_POST['price2']);
	
    $inv_cat1 = mysqli_real_escape_string($koneksi, $_POST['inv_cat1']);
    $inv_desc1 = mysqli_real_escape_string($koneksi, $_POST['inv_desc1']);
    $win_pos1 = mysqli_real_escape_string($koneksi, $_POST['win_pos1']);
    $pos_dtl1 = mysqli_real_escape_string($koneksi, $_POST['pos_dtl1']);
    $qty1 = mysqli_real_escape_string($koneksi, $_POST['qty1']);
    $price1 = mysqli_real_escape_string($koneksi, $_POST['price1']);
	
    $inv_cat3 = mysqli_real_escape_string($koneksi, $_POST['inv_cat3']);
    $inv_desc3 = mysqli_real_escape_string($koneksi, $_POST['inv_desc3']);
    $win_pos3 = mysqli_real_escape_string($koneksi, $_POST['win_pos3']);
    $pos_dtl3 = mysqli_real_escape_string($koneksi, $_POST['pos_dtl3']);
    $qty3 = mysqli_real_escape_string($koneksi, $_POST['qty3']);
    $price3 = mysqli_real_escape_string($koneksi, $_POST['price3']);
	
    $inv_cat4 = mysqli_real_escape_string($koneksi, $_POST['inv_cat4']);
    $inv_desc4 = mysqli_real_escape_string($koneksi, $_POST['inv_desc4']);
    $win_pos4 = mysqli_real_escape_string($koneksi, $_POST['win_pos4']);
    $pos_dtl4 = mysqli_real_escape_string($koneksi, $_POST['pos_dtl4']);
    $qty4 = mysqli_real_escape_string($koneksi, $_POST['qty4']);
    $price4 = mysqli_real_escape_string($koneksi, $_POST['price4']);
	
    $inv_cat5 = mysqli_real_escape_string($koneksi, $_POST['inv_cat5']);
    $inv_desc5 = mysqli_real_escape_string($koneksi, $_POST['inv_desc5']);
    $win_pos5 = mysqli_real_escape_string($koneksi, $_POST['win_pos5']);
    $pos_dtl5 = mysqli_real_escape_string($koneksi, $_POST['pos_dtl5']);
    $qty5 = mysqli_real_escape_string($koneksi, $_POST['qty5']);
    $price5 = mysqli_real_escape_string($koneksi, $_POST['price5']);
	
   
    $payment = mysqli_real_escape_string($koneksi, $_POST['payment']);
    


    // Insert data into the master_invoice table
   $query_master_invoice = "INSERT INTO master_invoice (sales_invoice, order_date,  note1, note2, bong_pas, status,  ins_date,
                sales_of_dealer,  cus_name, cus_city, cus_hp, cus_add, cus_nik,  cus_cp, cus_email, car_brand, car_mac, car_model,
                car_police, car_year, car_chas, inv_cat,  inv_desc, win_pos, pos_dtl, qty, price,
				inv_cat1,  inv_desc1, win_pos1, pos_dtl1, qty1, price1,
				inv_cat2,  inv_desc2, win_pos2, pos_dtl2, qty2, price2,
				inv_cat3,  inv_desc3, win_pos3, pos_dtl3, qty3, price3, 
				inv_cat4,  inv_desc4, win_pos4, pos_dtl4, qty4, price4,  
				inv_cat5,  inv_desc5, win_pos5, pos_dtl5, qty5, price5,  
				payment) 
              VALUES ('$sales_invoice', '$order_date',  '$note1', '$note2', '$bong_pas',  '$status',  '$ins_date',
                '$sales_of_dealer',  '$cus_name', '$cus_city', '$cus_hp', '$cus_add', '$cus_nik',  '$cus_cp', '$cus_email',
                '$car_brand', '$car_mac', '$car_model', '$car_police', '$car_year', '$car_chas', '$inv_cat',  '$inv_desc', '$win_pos', '$pos_dtl', '$qty', '$price',
				'$inv_cat1',  '$inv_desc1', '$win_pos1', '$pos_dtl1', '$qty1', '$price1', 
				'$inv_cat2',  '$inv_desc2', '$win_pos2', '$pos_dtl2', '$qty2', '$price2', 
				'$inv_cat3',  '$inv_desc3', '$win_pos3', '$pos_dtl3', '$qty3', '$price3', 
				'$inv_cat4',  '$inv_desc4', '$win_pos4', '$pos_dtl4', '$qty4', '$price4',  
				'$inv_cat5',  '$inv_desc5', '$win_pos5', '$pos_dtl5', '$qty5', '$price5',  
				'$payment')";

$result_master_invoice = mysqli_query($koneksi, $query_master_invoice);

if ($result_master_invoice) {
    // Data has been successfully inserted into master_invoice table

    // Now, insert customer data into the customer table
    $query_customer = "INSERT INTO customer (cus_name, cus_city, cus_hp, cus_add, cus_nik,  cus_cp, cus_email) 
                       VALUES ('$cus_name', '$cus_city', '$cus_hp', '$cus_add', '$cus_nik',  '$cus_cp', '$cus_email')";
    
    $result_customer = mysqli_query($koneksi, $query_customer);

    if ($result_customer) {
        echo "Data has been successfully inserted into both master_invoice and customer tables.";
    } else {
        echo "Error inserting data into customer table: " . mysqli_error($koneksi);
    }
} else {
    echo "Error inserting data into master_invoice table: " . mysqli_error($koneksi);
}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ins_date = mysqli_real_escape_string($koneksi, $_POST['ins_date']);

   
    $query_check_date = "SELECT COUNT(*) as count FROM master_invoice WHERE ins_date = '$ins_date'";
    $result_check_date = mysqli_query($koneksi, $query_check_date);
    $row_check_date = mysqli_fetch_assoc($result_check_date);

    if ($row_check_date['count'] >= 10) {
        $error_message = "Error: Installation date has already been used 10 times. Please choose a different date.";
    } else {
       
    }
}

$query_last_id = "SELECT MAX(id_master_invoice) as last_id FROM master_invoice";
$result_last_id = mysqli_query($koneksi, $query_last_id);
$row_last_id = mysqli_fetch_assoc($result_last_id);
$last_id = $row_last_id['last_id'];

$id_master_invoice = $last_id + 1;


$formatted_id = sprintf('SI/LML/IIMS/' ."%05d", $id_master_invoice);
            // Your other PHP code here
			
			

            ?>
			<div style="text-align: right;">
    <b>
        <label for="sales_invoice">Sales Invoice:</label>
        <span><?php echo $formatted_id; ?></span>
    </b>
</div>
	<div style="display: flex; flex-wrap: wrap;">
 
		<div style="flex: 0 0 49%; margin-right: 2%;">
		<label for="sales_of_dealer">Sales Of Dealer:</label>
			<select id="sales_of_dealer" name="sales_of_dealer" required>
				  <option value="Martin" <?php echo ($bong_pas == 'Martin') ? 'selected' : ''; ?>>Martin</option>
				  <option value="Yolanda" <?php echo ($bong_pas == 'Yolanda') ? 'selected' : ''; ?>>Yolanda</option>
			</select>
			
<input type="hidden" id="sales_invoice" name="sales_invoice" value="<?php echo $formatted_id; ?>" required>	

			

			<!--<label for="order_date">Order Date:</label>-->
			<input type="hidden" id="order_date" name="order_date" value="<?php echo $order_date; ?>" required>
			<div>
			<label for="bong_pas">Bongkar Pasang:</label>

       <select id="bong_pas" name="bong_pas" required>
            <option value="YES" <?php echo ($bong_pas == 'YES') ? 'selected' : ''; ?>>YES</option>
            <option value="NO" <?php echo ($bong_pas == 'NO') ? 'selected' : ''; ?>>NO</option>
            
            
		</select>

			
			
		</div></div>
	
		<div style="flex: 0 0 49%;">
		
			<label for="ins_date">Instalation Date:</label>
			<input type="date" id="ins_date" name="ins_date" value="<?php echo $ins_date; ?>" required>
			<button type="button" onclick="checkInstallationDate()">Check</button>
		
			<label for="status">Status:</label>
			<select id="status" name="status" required>
				   <option value="Active and show" <?php echo ($status == 'Active and show') ? 'selected' : ''; ?>>Active and show</option>
          
			</select>
			
		</div>
		
	</div>


   
	<div style="display: flex; flex-wrap: wrap;">
 
		<div style="flex: 0 0 49%; margin-right: 2%;">
				
			
			
		</div>
		<div style="flex: 0 0 49%;">
		
			
		</div>
		
	</div>

	<br>
	
	
   
	<div style="display: flex; flex-wrap: wrap;">
 
		<div style="flex: 0 0 49%; margin-right: 2%;">
		   
			<label for="cus_name">Customer Name:</label>
			<input type="text" id="cus_name" name="cus_name" value="<?php echo $cus_name; ?>" required>
			
			<label for="cus_nik">NIK :</label>
			<input type="text" id="cus_nik" name="cus_nik" value="<?php echo $cus_nik; ?>" required>
			
			<label for="cus_cp">Cell Phone 1:</label>
			<input type="number" id="cus_cp" name="cus_cp" value="<?php echo $cus_cp; ?>" required>
			<label for="cus_hp">Home Phone 1:</label>
			<input type="number" id="cus_hp" name="cus_hp" value="<?php echo $cus_hp; ?>" >
			
			
			
		</div>
	
		<div style="flex: 0 0 49%;">
			
			
			<label for="cus_add">Customer Address:</label>
			<input style="height:105px;" type="text" id="cus_add" name="cus_add" value="<?php echo $cus_add; ?>" required>
			
			<label for="cus_city" >City:</label>
			<input type="text" id="cus_city" name="cus_city" value="<?php echo $cus_city; ?>" required>
			
			
			
			<label for="cus_email">Email:</label>
			<input type="text" id="cus_email" name="cus_email" value="<?php echo $cus_email; ?>" required>
		</div>
		
	</div>
	
	<br>
	
   
	<div style="display: flex; flex-wrap: wrap;">
 
		<div style="flex: 0 0 49%; margin-right: 2%;">
		   
			<label for="car_brand">Car Brand:</label>
			<select id="car_brand" name="car_brand" onchange="updateCarModels()" required>
				<?php echo $car_brand_options; ?>
			</select>
			 <div id="carModelWrapper" style="flex: 0 0 49%;">
			<label for="car_model">Car Model:</label>
			<select id="car_model" name="car_model" required>
				<?php echo $car_model_options; ?>
			</select>
			</div>
			<label for="car_mac">Machine:</label>
			<input type="text" id="car_mac" name="car_mac" value="<?php echo $car_mac; ?>" >
			
			<script>
    function updateCarModels() {
        var selectedBrand = document.getElementById("car_brand").value;
        var carModelWrapper = document.getElementById("carModelWrapper");

        // Make an AJAX request to fetch car models based on the selected brand
        $.ajax({
            type: 'POST',
            url: 'get_car_models.php', // Replace with the actual URL to fetch car models
            data: { brand: selectedBrand },
            success: function(response) {
                // Update the car model dropdown options
                carModelWrapper.innerHTML = response;
            },
            error: function() {
                console.error('Error fetching car models');
            }
        });
    }

    // Initial call to populate car models based on the default selected brand
    updateCarModels();
</script>
			
		</div>
		
		<div style="flex: 0 0 49%;">
        
			<label for="car_police">Police:</label>
			<input type="text" id="car_police" name="car_police" value="<?php echo $car_police; ?>" >
		   
			<label for="car_year">Car Year:</label>
			<input type="number" id="car_year" name="car_year" value="<?php echo $car_year; ?>" required>
			
			<label for="car_chas">Chasis:</label>
			<input type="text" id="car_chas" name="car_chas" value="<?php echo $car_chas; ?>" >
		 </div>
		
	</div>
	
	<br>
	
	
   
	<div  style="display: flex; flex-wrap: wrap;">
 
		<div  style="flex: 0 0 14%; margin-right: 1%;">
		   
			<label for="inv_cat">Inventory Category:</label>
			<select id="inv_cat" name="inv_cat" required>
				<option value="Automotive" <?php echo ($inv_cat == 'Automotive') ? 'selected' : ''; ?>>Automotive</option>
				<option value="Flatglass" <?php echo ($inv_cat == 'Flatglass') ? 'selected' : ''; ?>>Flatglass</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="inv_desc">Inventory Desc:</label>
			<select id="inv_desc" name="inv_desc" required>
				<option value="BP50" <?php echo ($inv_desc == 'BP50') ? 'selected' : ''; ?>>BP50</option>
				<option value="BP15" <?php echo ($inv_desc == 'BP15') ? 'selected' : ''; ?>>BP15</option>
				<option value="BB35" <?php echo ($inv_desc == 'BB35') ? 'selected' : ''; ?>>BB35</option>
				<option value="BB15" <?php echo ($inv_desc == 'BB15') ? 'selected' : ''; ?>>BB15</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="win_pos">Window Position:</label>
			<select id="win_pos" name="win_pos" required>
				<option value="Front" <?php echo ($win_pos == 'Front') ? 'selected' : ''; ?>>Front</option>
				<option value="Side" <?php echo ($win_pos == 'Side') ? 'selected' : ''; ?>>Side</option>
				<option value="Rear" <?php echo ($win_pos == 'Rear') ? 'selected' : ''; ?>>Rear</option>
				<option value="Sun Roof" <?php echo ($win_pos == 'Sun Roof') ? 'selected' : ''; ?>>Sun Roof</option>
				<option value="Side + Rear" <?php echo ($win_pos == 'Side + Rear') ? 'selected' : ''; ?>>Side + Rear</option>
				<option value="Front + Rear" <?php echo ($win_pos == 'Front + Rear') ? 'selected' : ''; ?>>Front + Rear</option>
				<option value="Side [FULL" <?php echo ($win_pos == 'Side [FULL') ? 'selected' : ''; ?>>Side [FULL</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="pos_dtl">Position Detail:</label>
			<select id="pos_dtl" name="pos_dtl" required>
				<option value="A" <?php echo ($pos_dtl == 'A') ? 'selected' : ''; ?>>A</option>
				<option value="B" <?php echo ($pos_dtl == 'B') ? 'selected' : ''; ?>>B</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="qty">Qty:</label>
			<input type="number" id="qty" name="qty" value="<?php echo $qty; ?>" required>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%">
			<label for="price">Price:</label>
			<input type="number" id="price" name="price" value="<?php echo $price; ?>" required>
			</div>
			
	<button class="btn custom-green-button add-more" type="button">
  <i class="my-icon">+</i> Add
</button>

		
	</div>
	<div  style="display: flex; flex-wrap: wrap;">
 
		<div  style="flex: 0 0 14%; margin-right: 1%;">
		   
			<label for="inv_cat1">Inventory Category:</label>
			<select id="inv_cat1" name="inv_cat1" required>
				<option value="Automotive" <?php echo ($inv_cat1 == 'Automotive') ? 'selected' : ''; ?>>Automotive</option>
				<option value="Flatglass" <?php echo ($inv_cat1 == 'Flatglass') ? 'selected' : ''; ?>>Flatglass</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="inv_desc1">Inventory Desc:</label>
			<select id="inv_desc1" name="inv_desc1" required>
				<option value="BP50" <?php echo ($inv_desc1 == 'BP50') ? 'selected' : ''; ?>>BP50</option>
				<option value="BP15" <?php echo ($inv_desc1 == 'BP15') ? 'selected' : ''; ?>>BP15</option>
				<option value="BB35" <?php echo ($inv_desc1 == 'BB35') ? 'selected' : ''; ?>>BB35</option>
				<option value="BB15" <?php echo ($inv_desc1 == 'BB15') ? 'selected' : ''; ?>>BB15</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="win_pos1">Window Position:</label>
			<select id="win_pos1" name="win_pos1" required>
				<option value="Front" <?php echo ($win_pos1 == 'Front') ? 'selected' : ''; ?>>Front</option>
				<option value="Side" <?php echo ($win_pos1 == 'Side') ? 'selected' : ''; ?>>Side</option>
				<option value="Rear" <?php echo ($win_pos1 == 'Rear') ? 'selected' : ''; ?>>Rear</option>
				<option value="Sun Roof" <?php echo ($win_pos1 == 'Sun Roof') ? 'selected' : ''; ?>>Sun Roof</option>
				<option value="Side + Rear" <?php echo ($win_pos1 == 'Side + Rear') ? 'selected' : ''; ?>>Side + Rear</option>
				<option value="Front + Rear" <?php echo ($win_pos1 == 'Front + Rear') ? 'selected' : ''; ?>>Front + Rear</option>
				<option value="Side [FULL" <?php echo ($win_pos1 == 'Side [FULL') ? 'selected' : ''; ?>>Side [FULL</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="pos_dtl1">Position Detail:</label>
			<select id="pos_dtl1" name="pos_dtl1" required>
				<option value="A" <?php echo ($pos_dtl1 == 'A') ? 'selected' : ''; ?>>A</option>
				<option value="B" <?php echo ($pos_dtl1 == 'B') ? 'selected' : ''; ?>>B</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="qty1">Qty:</label>
			<input type="number" id="qty1" name="qty1" value="<?php echo $qty1; ?>" required>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%">
			<label for="price1">Price:</label>
			<input type="number" id="price1" name="price1" value="<?php echo $price1; ?>" required>
			</div>
			
	<button class="btn custom-green-button add-more" type="button">
  <i class="my-icon">+</i> Add
</button>

		
	</div>
	<div  style="display: flex; flex-wrap: wrap;">
 
		<div  style="flex: 0 0 14%; margin-right: 1%;">
		   
			<label for="inv_cat2">Inventory Category:</label>
			<select id="inv_cat2" name="inv_cat2" required>
				<option value="Automotive" <?php echo ($inv_cat2 == 'Automotive') ? 'selected' : ''; ?>>Automotive</option>
				<option value="Flatglass" <?php echo ($inv_cat2 == 'Flatglass') ? 'selected' : ''; ?>>Flatglass</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="inv_desc2">Inventory Desc:</label>
			<select id="inv_desc2" name="inv_desc2" required>
				<option value="BP50" <?php echo ($inv_desc2 == 'BP50') ? 'selected' : ''; ?>>BP50</option>
				<option value="BP15" <?php echo ($inv_desc2 == 'BP15') ? 'selected' : ''; ?>>BP15</option>
				<option value="BB35" <?php echo ($inv_desc2 == 'BB35') ? 'selected' : ''; ?>>BB35</option>
				<option value="BB15" <?php echo ($inv_desc2 == 'BB15') ? 'selected' : ''; ?>>BB15</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="win_pos2">Window Position:</label>
			<select id="win_pos2" name="win_pos2" required>
				<option value="Front" <?php echo ($win_pos2 == 'Front') ? 'selected' : ''; ?>>Front</option>
				<option value="Side" <?php echo ($win_pos2 == 'Side') ? 'selected' : ''; ?>>Side</option>
				<option value="Rear" <?php echo ($win_pos2 == 'Rear') ? 'selected' : ''; ?>>Rear</option>
				<option value="Sun Roof" <?php echo ($win_pos2 == 'Sun Roof') ? 'selected' : ''; ?>>Sun Roof</option>
				<option value="Side + Rear" <?php echo ($win_pos2 == 'Side + Rear') ? 'selected' : ''; ?>>Side + Rear</option>
				<option value="Front + Rear" <?php echo ($win_pos2 == 'Front + Rear') ? 'selected' : ''; ?>>Front + Rear</option>
				<option value="Side [FULL" <?php echo ($win_pos2 == 'Side [FULL') ? 'selected' : ''; ?>>Side [FULL</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="pos_dtl2">Position Detail:</label>
			<select id="pos_dtl2" name="pos_dtl2" required>
				<option value="A" <?php echo ($pos_dtl2 == 'A') ? 'selected' : ''; ?>>A</option>
				<option value="B" <?php echo ($pos_dtl2 == 'B') ? 'selected' : ''; ?>>B</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="qty2">Qty:</label>
			<input type="number" id="qty2" name="qty2" value="<?php echo $qty2; ?>" required>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%">
			<label for="price2">Price:</label>
			<input type="number" id="price2" name="price2" value="<?php echo $price2; ?>" required>
			</div>
			
	<button class="btn custom-green-button add-more" type="button">
  <i class="my-icon">+</i> Add
</button>

		
	</div>
	
	
	<div  style="display: flex; flex-wrap: wrap;">
 
		<div  style="flex: 0 0 14%; margin-right: 1%;">
		   
			<label for="inv_cat3">Inventory Category:</label>
			<select id="inv_cat3" name="inv_cat3" required>
				<option value="Automotive" <?php echo ($inv_cat3 == 'Automotive') ? 'selected' : ''; ?>>Automotive</option>
				<option value="Flatglass" <?php echo ($inv_cat3 == 'Flatglass') ? 'selected' : ''; ?>>Flatglass</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="inv_desc3">Inventory Desc:</label>
			<select id="inv_desc3" name="inv_desc3" required>
				<option value="BP50" <?php echo ($inv_desc3 == 'BP50') ? 'selected' : ''; ?>>BP50</option>
				<option value="BP15" <?php echo ($inv_desc3 == 'BP15') ? 'selected' : ''; ?>>BP15</option>
				<option value="BB35" <?php echo ($inv_desc3 == 'BB35') ? 'selected' : ''; ?>>BB35</option>
				<option value="BB15" <?php echo ($inv_desc3 == 'BB15') ? 'selected' : ''; ?>>BB15</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="win_pos3">Window Position:</label>
			<select id="win_pos3" name="win_pos3" required>
				<option value="Front" <?php echo ($win_pos3 == 'Front') ? 'selected' : ''; ?>>Front</option>
				<option value="Side" <?php echo ($win_pos3 == 'Side') ? 'selected' : ''; ?>>Side</option>
				<option value="Rear" <?php echo ($win_pos3 == 'Rear') ? 'selected' : ''; ?>>Rear</option>
				<option value="Sun Roof" <?php echo ($win_pos3 == 'Sun Roof') ? 'selected' : ''; ?>>Sun Roof</option>
				<option value="Side + Rear" <?php echo ($win_pos3 == 'Side + Rear') ? 'selected' : ''; ?>>Side + Rear</option>
				<option value="Front + Rear" <?php echo ($win_pos3 == 'Front + Rear') ? 'selected' : ''; ?>>Front + Rear</option>
				<option value="Side [FULL" <?php echo ($win_pos3 == 'Side [FULL') ? 'selected' : ''; ?>>Side [FULL</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="pos_dtl3">Position Detail:</label>
			<select id="pos_dtl3" name="pos_dtl3" required>
				<option value="A" <?php echo ($pos_dtl3 == 'A') ? 'selected' : ''; ?>>A</option>
				<option value="B" <?php echo ($pos_dtl3 == 'B') ? 'selected' : ''; ?>>B</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="qty3">Qty:</label>
			<input type="number" id="qty3" name="qty3" value="<?php echo $qty3; ?>" required>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%">
			<label for="price3">Price:</label>
			<input type="number" id="price3" name="price3" value="<?php echo $price3; ?>" required>
			</div>
			
	<button class="btn custom-green-button add-more" type="button">
  <i class="my-icon">+</i> Add
</button>

		
	</div>
	
	<div  style="display: flex; flex-wrap: wrap;">
 
		<div  style="flex: 0 0 14%; margin-right: 1%;">
		   
			<label for="inv_cat4">Inventory Category:</label>
			<select id="inv_cat4" name="inv_cat4" required>
				<option value="Automotive" <?php echo ($inv_cat4 == 'Automotive') ? 'selected' : ''; ?>>Automotive</option>
				<option value="Flatglass" <?php echo ($inv_cat4 == 'Flatglass') ? 'selected' : ''; ?>>Flatglass</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="inv_desc4">Inventory Desc:</label>
			<select id="inv_desc4" name="inv_desc4" required>
				<option value="BP50" <?php echo ($inv_desc4 == 'BP50') ? 'selected' : ''; ?>>BP50</option>
				<option value="BP15" <?php echo ($inv_desc4 == 'BP15') ? 'selected' : ''; ?>>BP15</option>
				<option value="BB35" <?php echo ($inv_desc4 == 'BB35') ? 'selected' : ''; ?>>BB35</option>
				<option value="BB15" <?php echo ($inv_desc4 == 'BB15') ? 'selected' : ''; ?>>BB15</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="win_pos4">Window Position:</label>
			<select id="win_pos4" name="win_pos4" required>
				<option value="Front" <?php echo ($win_pos4 == 'Front') ? 'selected' : ''; ?>>Front</option>
				<option value="Side" <?php echo ($win_pos4 == 'Side') ? 'selected' : ''; ?>>Side</option>
				<option value="Rear" <?php echo ($win_pos4 == 'Rear') ? 'selected' : ''; ?>>Rear</option>
				<option value="Sun Roof" <?php echo ($win_pos4 == 'Sun Roof') ? 'selected' : ''; ?>>Sun Roof</option>
				<option value="Side + Rear" <?php echo ($win_pos4 == 'Side + Rear') ? 'selected' : ''; ?>>Side + Rear</option>
				<option value="Front + Rear" <?php echo ($win_pos4 == 'Front + Rear') ? 'selected' : ''; ?>>Front + Rear</option>
				<option value="Side [FULL" <?php echo ($win_pos4 == 'Side [FULL') ? 'selected' : ''; ?>>Side [FULL</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="pos_dtl4">Position Detail:</label>
			<select id="pos_dtl4" name="pos_dtl4" required>
				<option value="A" <?php echo ($pos_dtl4 == 'A') ? 'selected' : ''; ?>>A</option>
				<option value="B" <?php echo ($pos_dtl4 == 'B') ? 'selected' : ''; ?>>B</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="qty4">Qty:</label>
			<input type="number" id="qty4" name="qty4" value="<?php echo $qty4; ?>" required>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%">
			<label for="price4">Price:</label>
			<input type="number" id="price4" name="price4" value="<?php echo $price4; ?>" required>
			</div>
			
	<button class="btn custom-green-button add-more" type="button">
  <i class="my-icon">+</i> Add
</button>

		
	</div>
	
	<div  style="display: flex; flex-wrap: wrap;">
 
		<div  style="flex: 0 0 14%; margin-right: 1%;">
		   
			<label for="inv_cat5">Inventory Category:</label>
			<select id="inv_cat5" name="inv_cat5" required>
				<option value="Automotive" <?php echo ($inv_cat5 == 'Automotive') ? 'selected' : ''; ?>>Automotive</option>
				<option value="Flatglass" <?php echo ($inv_cat5 == 'Flatglass') ? 'selected' : ''; ?>>Flatglass</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="inv_desc5">Inventory Desc:</label>
			<select id="inv_desc5" name="inv_desc5" required>
				<option value="BP50" <?php echo ($inv_desc5 == 'BP50') ? 'selected' : ''; ?>>BP50</option>
				<option value="BP15" <?php echo ($inv_desc5 == 'BP15') ? 'selected' : ''; ?>>BP15</option>
				<option value="BB35" <?php echo ($inv_desc5 == 'BB35') ? 'selected' : ''; ?>>BB35</option>
				<option value="BB15" <?php echo ($inv_desc5 == 'BB15') ? 'selected' : ''; ?>>BB15</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="win_pos5">Window Position:</label>
			<select id="win_pos5" name="win_pos5" required>
				<option value="Front" <?php echo ($win_pos5 == 'Front') ? 'selected' : ''; ?>>Front</option>
				<option value="Side" <?php echo ($win_pos5 == 'Side') ? 'selected' : ''; ?>>Side</option>
				<option value="Rear" <?php echo ($win_pos5 == 'Rear') ? 'selected' : ''; ?>>Rear</option>
				<option value="Sun Roof" <?php echo ($win_pos5 == 'Sun Roof') ? 'selected' : ''; ?>>Sun Roof</option>
				<option value="Side + Rear" <?php echo ($win_pos5 == 'Side + Rear') ? 'selected' : ''; ?>>Side + Rear</option>
				<option value="Front + Rear" <?php echo ($win_pos5 == 'Front + Rear') ? 'selected' : ''; ?>>Front + Rear</option>
				<option value="Side [FULL" <?php echo ($win_pos5 == 'Side [FULL') ? 'selected' : ''; ?>>Side [FULL</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="pos_dtl5">Position Detail:</label>
			<select id="pos_dtl5" name="pos_dtl5" required>
				<option value="A" <?php echo ($pos_dtl5 == 'A') ? 'selected' : ''; ?>>A</option>
				<option value="B" <?php echo ($pos_dtl5 == 'B') ? 'selected' : ''; ?>>B</option>
			</select>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%;">
			<label for="qty5">Qty:</label>
			<input type="number" id="qty5" name="qty5" value="<?php echo $qty5; ?>" required>
			</div>
			<div  style="flex: 0 0 14%;margin-right: 1%">
			<label for="price5">Price:</label>
			<input type="number" id="price5" name="price5" value="<?php echo $price5; ?>" required>
			</div>
			
	<button class="btn custom-green-button add-more" type="button">
  <i class="my-icon">+</i> Add
</button>

		
	</div>
	


	

	
	
	
	
	<div style="display: flex; flex-wrap: wrap;">
		<div style="flex: 0 0 49%;">
        
			
			<label for="price">Total Price:</label>
			<input type="number" id="price" name="price" value="<?php echo $price; ?>" required readonly> 
			
			 <!--<label for="disc">Disc:</label>
			<div style="display: flex; flex-wrap: wrap;">
			<div style="flex: 0 0 49%;margin-right: 2%;">
		   
			<input type="number" id="disc" name="disc" value="<?php echo $disc; ?>" >
			</div></div>-->
			<div style="flex: 0 0 49%;">
			<select id="payment" name="payment" required>
				<option value="payment" >Cash</option>
			</select>
			</div><br>
			
			
			
		</div></div>
	<br>
	
			
   
	<div style="display: flex; flex-wrap: wrap;">
 
		<!--<div style="flex: 0 0 32%; margin-right: 2%;">
		   
			<label for="disc_price">Discount:</label>
			<input type="number" id="disc_price" name="disc_price" value="<?php echo $qty; ?>" readonly>
			
		</div>-->
		
		<!--<div style="flex: 0 0 32%; margin-right: 2%;">
		
			<label for="ppn">PPN:</label>
			<input type="number" id="ppn" name="ppn" value="11" readonly>
		
		</div>-->
		 
		
		
		</div>
			<div style="display: flex; flex-wrap: wrap;">
			<label for="note1">Note 1:</label>
			<input type="text" id="note1" name="note1" value="<?php echo $note1; ?>" required>
			
			<label for="note2">Note 2:</label>
			<input type="text" id="note2" name="note2" value="<?php echo $note2; ?>" required>
			</div>

        <input type="submit" name="save" value="Simpan" >
		<button type="button" onclick="printInvoice()">Cetak</button>
<script>
function printInvoice() {
    // Extract the necessary data
    var ins_date = document.getElementById('ins_date').value;
    var cus_name = document.getElementById('cus_name').value;
    var cus_add = document.getElementById('cus_add').value;
    var sales_invoice = document.getElementById('sales_invoice').value;
    var car_chas = document.getElementById('car_chas').value;
    var car_police = document.getElementById('car_police').value;
    var inv_desc = document.getElementById('inv_desc').value;
    var win_pos = document.getElementById('win_pos').value;
    var pos_dtl = document.getElementById('pos_dtl').value;
    var qty = document.getElementById('qty').value;
    var price = document.getElementById('price').value;
	
    var inv_desc1 = document.getElementById('inv_desc1').value;
    var win_pos1 = document.getElementById('win_pos1').value;
    var pos_dtl1 = document.getElementById('pos_dtl1').value;
    var qty1 = document.getElementById('qty1').value;
    var price1 = document.getElementById('price1').value;
	
    var inv_desc2 = document.getElementById('inv_desc2').value;
    var win_pos2 = document.getElementById('win_pos2').value;
    var pos_dtl2 = document.getElementById('pos_dtl2').value;
    var qty2 = document.getElementById('qty2').value;
    var price2 = document.getElementById('price2').value;
	
    var inv_desc3 = document.getElementById('inv_desc3').value;
    var win_pos3 = document.getElementById('win_pos3').value;
    var pos_dtl3 = document.getElementById('pos_dtl3').value;
    var qty3 = document.getElementById('qty3').value;
    var price3 = document.getElementById('price3').value;
	
    var inv_desc4 = document.getElementById('inv_desc4').value;
    var win_pos4 = document.getElementById('win_pos4').value;
    var pos_dtl4 = document.getElementById('pos_dtl4').value;
    var qty4 = document.getElementById('qty4').value;
    var price4 = document.getElementById('price4').value;
	
    var inv_desc5 = document.getElementById('inv_desc5').value;
    var win_pos5 = document.getElementById('win_pos5').value;
    var pos_dtl5 = document.getElementById('pos_dtl5').value;
    var qty5 = document.getElementById('qty5').value;
    var price5 = document.getElementById('price5').value;
	
    var note1 = document.getElementById('note1').value;

    // Redirect to print.php with the necessary data as query parameters
    window.location.href = 'print.php?cus_name=' + encodeURIComponent(cus_name) +
        '&ins_date=' + encodeURIComponent(ins_date) +
        '&cus_add=' + encodeURIComponent(cus_add) +
        '&sales_invoice=' + encodeURIComponent(sales_invoice) +
        '&car_chas=' + encodeURIComponent(car_chas) +
        '&car_police=' + encodeURIComponent(car_police) +
        '&inv_desc=' + encodeURIComponent(inv_desc) +
        '&win_pos=' + encodeURIComponent(win_pos) +
        '&pos_dtl=' + encodeURIComponent(pos_dtl) +
        '&qty=' + encodeURIComponent(qty) +
        '&price=' + encodeURIComponent(price)+
		'&note1=' + encodeURIComponent(note1) +
		
        '&inv_desc1=' + encodeURIComponent(inv_desc1) +
        '&win_pos1=' + encodeURIComponent(win_pos1) +
        '&pos_dtl1=' + encodeURIComponent(pos_dtl1) +
        '&qty1=' + encodeURIComponent(qty1) +
        '&price1=' + encodeURIComponent(price1)+
		
        '&inv_desc2=' + encodeURIComponent(inv_desc2) +
        '&win_pos2=' + encodeURIComponent(win_pos2) +
        '&pos_dtl2=' + encodeURIComponent(pos_dtl2) +
        '&qty2=' + encodeURIComponent(qty2) +
        '&price2=' + encodeURIComponent(price2)+
		
        '&inv_desc3=' + encodeURIComponent(inv_desc3) +
        '&win_pos3=' + encodeURIComponent(win_pos3) +
        '&pos_dtl3=' + encodeURIComponent(pos_dtl3) +
        '&qty3=' + encodeURIComponent(qty3) +
        '&price3=' + encodeURIComponent(price3)+
		
        '&inv_desc4=' + encodeURIComponent(inv_desc4) +
        '&win_pos4=' + encodeURIComponent(win_pos4) +
        '&pos_dtl4=' + encodeURIComponent(pos_dtl4) +
        '&qty4=' + encodeURIComponent(qty4) +
        '&price4=' + encodeURIComponent(price4)+
		
        '&inv_desc5=' + encodeURIComponent(inv_desc5) +
        '&win_pos5=' + encodeURIComponent(win_pos5) +
        '&pos_dtl5=' + encodeURIComponent(pos_dtl5) +
        '&qty5=' + encodeURIComponent(qty5) +
        '&price5=' + encodeURIComponent(price5);
}
</script>
<button type="button" onclick="saveAndPrint()">Save and Print</button>

<script>

function saveAndPrint() {

    saveData();
    printInvoice();
}

function saveData() {

    // Extract the necessary data
    var ins_date = document.getElementById('ins_date').value;
    var sales_invoice = document.getElementById('sales_invoice').value;
    var order_date = document.getElementById('order_date').value;
    var note1 = document.getElementById('note1').value;
    var note2 = document.getElementById('note2').value;
    var bong_pas = document.getElementById('bong_pas').value;
    var status = document.getElementById('status').value;
    var sales_of_dealer = document.getElementById('sales_of_dealer').value;
    var cus_name = document.getElementById('cus_name').value;
    var cus_city = document.getElementById('cus_city').value;
    var cus_hp = document.getElementById('cus_hp').value;
    var cus_add = document.getElementById('cus_add').value;
    var cus_nik = document.getElementById('cus_nik').value;
    var cus_cp = document.getElementById('cus_cp').value;
    var cus_email = document.getElementById('cus_email').value;
    var car_brand = document.getElementById('car_brand').value;
    var car_mac = document.getElementById('car_mac').value;
    var car_model = document.getElementById('car_model').value;
    var car_police = document.getElementById('car_police').value;
    var car_year = document.getElementById('car_year').value;
    var car_chas = document.getElementById('car_chas').value;
    
    var inv_cat = document.getElementById('inv_cat').value;
    var inv_desc = document.getElementById('inv_desc').value;
    var win_pos = document.getElementById('win_pos').value;
    var pos_dtl = document.getElementById('pos_dtl').value;
    var qty = document.getElementById('qty').value;
    var price = document.getElementById('price').value;

    var inv_cat1 = document.getElementById('inv_cat1').value;
    var inv_desc1 = document.getElementById('inv_desc1').value;
    var win_pos1 = document.getElementById('win_pos1').value;
    var pos_dtl1 = document.getElementById('pos_dtl1').value;
    var qty1 = document.getElementById('qty1').value;
    var price1 = document.getElementById('price1').value;

    var inv_cat2 = document.getElementById('inv_cat2').value;
    var inv_desc2 = document.getElementById('inv_desc2').value;
    var win_pos2 = document.getElementById('win_pos2').value;
    var pos_dtl2 = document.getElementById('pos_dtl2').value;
    var qty2 = document.getElementById('qty2').value;
    var price2 = document.getElementById('price2').value;

    var inv_cat3 = document.getElementById('inv_cat3').value;
    var inv_desc3 = document.getElementById('inv_desc3').value;
    var win_pos3 = document.getElementById('win_pos3').value;
    var pos_dtl3 = document.getElementById('pos_dtl3').value;
    var qty3 = document.getElementById('qty3').value;
    var price3 = document.getElementById('price3').value;

    var inv_cat4 = document.getElementById('inv_cat4').value;
    var inv_desc4 = document.getElementById('inv_desc4').value;
    var win_pos4 = document.getElementById('win_pos4').value;
    var pos_dtl4 = document.getElementById('pos_dtl4').value;
    var qty4 = document.getElementById('qty4').value;
    var price4 = document.getElementById('price4').value;

    var inv_cat5 = document.getElementById('inv_cat5').value;
    var inv_desc5 = document.getElementById('inv_desc5').value;
    var win_pos5 = document.getElementById('win_pos5').value;
    var pos_dtl5 = document.getElementById('pos_dtl5').value;
    var qty5 = document.getElementById('qty5').value;
    var price5 = document.getElementById('price5').value;

    var payment = document.getElementById('payment').value;

    // Prepare data to be sent to the server
    var formData = new FormData();
    formData.append('ins_date', ins_date);
    formData.append('sales_invoice', sales_invoice);
    formData.append('order_date', order_date);
    formData.append('note1', note1);
    formData.append('note2', note2);
    formData.append('bong_pas', bong_pas);
    formData.append('status', status);
    formData.append('sales_of_dealer', sales_of_dealer);
    formData.append('cus_name', cus_name);
    formData.append('cus_city', cus_city);
    formData.append('cus_hp', cus_hp);
    formData.append('cus_add', cus_add);
    formData.append('cus_nik', cus_nik);
    formData.append('cus_cp', cus_cp);
    formData.append('cus_email', cus_email);
    formData.append('car_brand', car_brand);
    formData.append('car_mac', car_mac);
    formData.append('car_model', car_model);
    formData.append('car_police', car_police);
    formData.append('car_year', car_year);
    formData.append('car_chas', car_chas);
    formData.append('inv_cat', inv_cat);
    formData.append('inv_desc', inv_desc);
    formData.append('win_pos', win_pos);
    formData.append('pos_dtl', pos_dtl);
    formData.append('qty', qty);
    formData.append('price', price);
    formData.append('inv_cat1', inv_cat1);
    formData.append('inv_desc1', inv_desc1);
    formData.append('win_pos1', win_pos1);
    formData.append('pos_dtl1', pos_dtl1);
    formData.append('qty1', qty1);
    formData.append('price1', price1);
    formData.append('inv_cat2', inv_cat2);
    formData.append('inv_desc2', inv_desc2);
    formData.append('win_pos2', win_pos2);
    formData.append('pos_dtl2', pos_dtl2);
    formData.append('qty2', qty2);
    formData.append('price2', price2);
    formData.append('inv_cat3', inv_cat3);
    formData.append('inv_desc3', inv_desc3);
    formData.append('win_pos3', win_pos3);
    formData.append('pos_dtl3', pos_dtl3);
    formData.append('qty3', qty3);
    formData.append('price3', price3);
    formData.append('inv_cat4', inv_cat4);
    formData.append('inv_desc4', inv_desc4);
    formData.append('win_pos4', win_pos4);
    formData.append('pos_dtl4', pos_dtl4);
    formData.append('qty4', qty4);
    formData.append('price4', price4);
    formData.append('inv_cat5', inv_cat5);
    formData.append('inv_desc5', inv_desc5);
    formData.append('win_pos5', win_pos5);
    formData.append('pos_dtl5', pos_dtl5);
    formData.append('qty5', qty5);
    formData.append('price5', price5);
    formData.append('payment', payment);

    // Send an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_and_print.php', true);

    // Set up a callback function to handle the server's response
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Optionally, handle a successful response
            console.log(xhr.responseText);
        } else {
            // Handle errors
            console.error('Error saving data to the server. Status: ' + xhr.status);
        }
    };

    // Send the data to the server
    xhr.send(formData);
}

function printInvoice() {
    // Extract the necessary data
     var ins_date = document.getElementById('ins_date').value;
    var cus_name = document.getElementById('cus_name').value;
    var cus_add = document.getElementById('cus_add').value;
    var sales_invoice = document.getElementById('sales_invoice').value;
    var car_chas = document.getElementById('car_chas').value;
    var car_police = document.getElementById('car_police').value;
    var car_brand = document.getElementById('car_brand').value;
    var car_model = document.getElementById('car_model').value;
    var inv_desc = document.getElementById('inv_desc').value;
    var win_pos = document.getElementById('win_pos').value;
    var pos_dtl = document.getElementById('pos_dtl').value;
    var qty = document.getElementById('qty').value;
    var price = document.getElementById('price').value;
	
    var inv_desc1 = document.getElementById('inv_desc1').value;
    var win_pos1 = document.getElementById('win_pos1').value;
    var pos_dtl1 = document.getElementById('pos_dtl1').value;
    var qty1 = document.getElementById('qty1').value;
    var price1 = document.getElementById('price1').value;
	
    var inv_desc2 = document.getElementById('inv_desc2').value;
    var win_pos2 = document.getElementById('win_pos2').value;
    var pos_dtl2 = document.getElementById('pos_dtl2').value;
    var qty2 = document.getElementById('qty2').value;
    var price2 = document.getElementById('price2').value;
	
    var inv_desc3 = document.getElementById('inv_desc3').value;
    var win_pos3 = document.getElementById('win_pos3').value;
    var pos_dtl3 = document.getElementById('pos_dtl3').value;
    var qty3 = document.getElementById('qty3').value;
    var price3 = document.getElementById('price3').value;
	
    var inv_desc4 = document.getElementById('inv_desc4').value;
    var win_pos4 = document.getElementById('win_pos4').value;
    var pos_dtl4 = document.getElementById('pos_dtl4').value;
    var qty4 = document.getElementById('qty4').value;
    var price4 = document.getElementById('price4').value;
	
    var inv_desc5 = document.getElementById('inv_desc5').value;
    var win_pos5 = document.getElementById('win_pos5').value;
    var pos_dtl5 = document.getElementById('pos_dtl5').value;
    var qty5 = document.getElementById('qty5').value;
    var price5 = document.getElementById('price5').value;
	
    var note1 = document.getElementById('note1').value;

    // Redirect to print.php with the necessary data as query parameters
    window.location.href = 'print.php?cus_name=' + encodeURIComponent(cus_name) +
        '&ins_date=' + encodeURIComponent(ins_date) +
        '&cus_add=' + encodeURIComponent(cus_add) +
        '&sales_invoice=' + encodeURIComponent(sales_invoice) +
        '&car_chas=' + encodeURIComponent(car_chas) +
        '&car_police=' + encodeURIComponent(car_police) +
        '&car_brand=' + encodeURIComponent(car_brand) +
        '&car_model=' + encodeURIComponent(car_model) +
        '&inv_desc=' + encodeURIComponent(inv_desc) +
        '&win_pos=' + encodeURIComponent(win_pos) +
        '&pos_dtl=' + encodeURIComponent(pos_dtl) +
        '&qty=' + encodeURIComponent(qty) +
        '&price=' + encodeURIComponent(price)+
		'&note1=' + encodeURIComponent(note1) +
		
        '&inv_desc1=' + encodeURIComponent(inv_desc1) +
        '&win_pos1=' + encodeURIComponent(win_pos1) +
        '&pos_dtl1=' + encodeURIComponent(pos_dtl1) +
        '&qty1=' + encodeURIComponent(qty1) +
        '&price1=' + encodeURIComponent(price1)+
		
        '&inv_desc2=' + encodeURIComponent(inv_desc2) +
        '&win_pos2=' + encodeURIComponent(win_pos2) +
        '&pos_dtl2=' + encodeURIComponent(pos_dtl2) +
        '&qty2=' + encodeURIComponent(qty2) +
        '&price2=' + encodeURIComponent(price2)+
		
        '&inv_desc3=' + encodeURIComponent(inv_desc3) +
        '&win_pos3=' + encodeURIComponent(win_pos3) +
        '&pos_dtl3=' + encodeURIComponent(pos_dtl3) +
        '&qty3=' + encodeURIComponent(qty3) +
        '&price3=' + encodeURIComponent(price3)+
		
        '&inv_desc4=' + encodeURIComponent(inv_desc4) +
        '&win_pos4=' + encodeURIComponent(win_pos4) +
        '&pos_dtl4=' + encodeURIComponent(pos_dtl4) +
        '&qty4=' + encodeURIComponent(qty4) +
        '&price4=' + encodeURIComponent(price4)+
		
        '&inv_desc5=' + encodeURIComponent(inv_desc5) +
        '&win_pos5=' + encodeURIComponent(win_pos5) +
        '&pos_dtl5=' + encodeURIComponent(pos_dtl5) +
        '&qty5=' + encodeURIComponent(qty5) +
        '&price5=' + encodeURIComponent(price5);
}
</script>
    </form>
	<script>
    function checkInstallationDate() {
        var insDate = document.getElementById('ins_date').value;

        // Kirim data ke server untuk dicek
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Tanggapan dari server
                var response = this.responseText;
                alert(response); // Tampilkan pesan dari server (boleh diubah sesuai kebutuhan)
            }
        };
        xhr.open("GET", "check_installation.php?ins_date=" + insDate, true);
        xhr.send();
    }
</script>	
	</div>
	
  <script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
        var html = $(".copy").html();
        $(".after-add-more").after(html);
      });

      $("body").on("click", ".remove", function(){ 
        $(this).parents(".control-group").remove();
      });
    });
  </script>
 

</body>
</html>