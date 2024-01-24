<?php
include 'koneksi.php';

// Assuming you have a database connection established

// Use mysqli_real_escape_string to prevent SQL injection
$id_master_invoice = mysqli_real_escape_string($koneksi, $_GET['cus_name']);
$ins_date = mysqli_real_escape_string($koneksi, $_GET['ins_date']);
$cus_name = mysqli_real_escape_string($koneksi, $_GET['cus_name']);
$cus_add = mysqli_real_escape_string($koneksi, $_GET['cus_add']);
$sales_invoice = mysqli_real_escape_string($koneksi, $_GET['sales_invoice']);
$car_chas = mysqli_real_escape_string($koneksi, $_GET['car_chas']);
$car_police = mysqli_real_escape_string($koneksi, $_GET['car_police']);
$car_brand = mysqli_real_escape_string($koneksi, $_GET['car_brand']);
$car_model = mysqli_real_escape_string($koneksi, $_GET['car_model']);
$inv_desc = mysqli_real_escape_string($koneksi, $_GET['inv_desc']);
$win_pos = mysqli_real_escape_string($koneksi, $_GET['win_pos']);
$pos_dtl = mysqli_real_escape_string($koneksi, $_GET['pos_dtl']);
$qty = mysqli_real_escape_string($koneksi, $_GET['qty']);
$price = mysqli_real_escape_string($koneksi, $_GET['price']);

$inv_desc1 = isset($_GET['inv_desc1']) ? mysqli_real_escape_string($koneksi, $_GET['inv_desc1']) : '';
$win_pos1 = isset($_GET['win_pos1']) ? mysqli_real_escape_string($koneksi, $_GET['win_pos1']) : '';
$pos_dtl1 = isset($_GET['pos_dtl1']) ? mysqli_real_escape_string($koneksi, $_GET['pos_dtl1']) : '';
$qty1 = isset($_GET['qty1']) ? mysqli_real_escape_string($koneksi, $_GET['qty1']) : '';
$price1 = isset($_GET['price1']) ? mysqli_real_escape_string($koneksi, $_GET['price1']) : '';

$inv_desc2 = isset($_GET['inv_desc2']) ? mysqli_real_escape_string($koneksi, $_GET['inv_desc2']) : '';
$win_pos2 = isset($_GET['win_pos2']) ? mysqli_real_escape_string($koneksi, $_GET['win_pos2']) : '';
$pos_dtl2 = isset($_GET['pos_dtl2']) ? mysqli_real_escape_string($koneksi, $_GET['pos_dtl2']) : '';
$qty2 = isset($_GET['qty2']) ? mysqli_real_escape_string($koneksi, $_GET['qty2']) : '';
$price2 = isset($_GET['price2']) ? mysqli_real_escape_string($koneksi, $_GET['price2']) : '';

$inv_desc3 = isset($_GET['inv_desc3']) ? mysqli_real_escape_string($koneksi, $_GET['inv_desc3']) : '';
$win_pos3 = isset($_GET['win_pos3']) ? mysqli_real_escape_string($koneksi, $_GET['win_pos3']) : '';
$pos_dtl3 = isset($_GET['pos_dtl3']) ? mysqli_real_escape_string($koneksi, $_GET['pos_dtl3']) : '';
$qty3 = isset($_GET['qty3']) ? mysqli_real_escape_string($koneksi, $_GET['qty3']) : '';
$price3 = isset($_GET['price3']) ? mysqli_real_escape_string($koneksi, $_GET['price3']) : '';

$inv_desc4 = isset($_GET['inv_desc4']) ? mysqli_real_escape_string($koneksi, $_GET['inv_desc4']) : '';
$win_pos4 = isset($_GET['win_pos4']) ? mysqli_real_escape_string($koneksi, $_GET['win_pos4']) : '';
$pos_dtl4 = isset($_GET['pos_dtl4']) ? mysqli_real_escape_string($koneksi, $_GET['pos_dtl4']) : '';
$qty4 = isset($_GET['qty4']) ? mysqli_real_escape_string($koneksi, $_GET['qty4']) : '';
$price4 = isset($_GET['price4']) ? mysqli_real_escape_string($koneksi, $_GET['price4']) : '';

$inv_desc5 = isset($_GET['inv_desc5']) ? mysqli_real_escape_string($koneksi, $_GET['inv_desc5']) : '';
$win_pos5 = isset($_GET['win_pos5']) ? mysqli_real_escape_string($koneksi, $_GET['win_pos5']) : '';
$pos_dtl5 = isset($_GET['pos_dtl5']) ? mysqli_real_escape_string($koneksi, $_GET['pos_dtl5']) : '';
$qty5 = isset($_GET['qty5']) ? mysqli_real_escape_string($koneksi, $_GET['qty5']) : '';
$price5 = isset($_GET['price5']) ? mysqli_real_escape_string($koneksi, $_GET['price5']) : '';


$note1 = isset($_GET['note1']) ? mysqli_real_escape_string($koneksi, $_GET['note1']) : '';

if (is_numeric($qty) && is_numeric($price)) {
    $total = $qty * $price;
} else {
    // Handle the error, e.g., set $total to a default value or show an error message
    $total = 0;
}

if (is_numeric($qty1) && is_numeric($price1)) {
    $total1 = $qty1 * $price1;
} else {
    $total1 = 0;
}
if (is_numeric($qty2) && is_numeric($price2)) {
    $total2 = $qty2 * $price2;
} else {
    $total2 = 0;
}

if (is_numeric($qty3) && is_numeric($price3)) {
    $total3 = $qty3 * $price3;
} else {
    $total3 = 0;
}
if (is_numeric($qty4) && is_numeric($price4)) {
    $total4 = $qty4 * $price4;
} else {
    $total4 = 0;
}

if (is_numeric($qty5) && is_numeric($price5)) {
    $total5 = $qty5 * $price5;
} else {
    $total5 = 0;
}

// Perform the SELECT query
$query = "SELECT * FROM master_invoice WHERE id_master_invoice = '$id_master_invoice'";
$result = mysqli_query($koneksi, $query);

// Check if the query was successful
if ($result) {
    // Fetch the data
    $row = mysqli_fetch_assoc($result);

    // Now $row contains the data from id_master_invoice for the specified sales_invoice
    // You can access the values using $row['column_name']
} else {
    // Handle the query error
    echo "Error: " . mysqli_error($koneksi);
}

// Close the database connection
mysqli_close($koneksi);

// Rest of your code
// ...


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Invoice</title>
    <style>
	.body{
		
	
	}
	
	.container {
            display: flex;
            align-items: left;
			padding: 10px;
			margin-top: 0;
			margin-bottom: 0;
			
        }
.table_component {
    overflow: auto;
	align:left;
	
}


.table_component table {
    border: 1px solid #dededf;
    height: 100%;
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
    border-spacing: 1px;
    text-align: left;
	font-size:10pt;
}

.table_component caption {
    caption-side: top;
    text-align: left;
}

.table_component th {
    border: 2px solid #000000;
    background-color: #ffffff;
    color: #000000;
    padding: 1px;
	
}

.table_component td {
    border: 2px solid #000000;
    background-color: #ffffff;
    color: #000000;
    padding: 1px;
}
@media print {
        body {
            size: A5 landscape;
        }
 
    }
</style>
</head>
<body>

     <div class="container" style="padding-bottom:0;">
        <div class="table_component" style="width: 61%;height: 20%;padding-bottom:0;" role="region" tabindex="0">
            <table>
                <thead>
                    <tr>
                        <th>LADANG MAS LESTARI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jl. Sukarjo Wiryopranoto No. 4 GB Kebon Kelapa</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width:38%;text-align:center;">
    <h2 style="margin-top:0; margin-bottom:0;">SALES INVOICE</h2>
    <p style="margin-top:0; margin-bottom:0; font-size:10pt;"><?php echo $sales_invoice; ?></p>	
</div></div>
	<div class="container" style="padding-bottom:0;">
        <div class="table_component" style="width: 30%;height: 100px; margin-right:1%;"role="region" tabindex="0">
            <table>
                <thead>
                    <tr>
                        <th>BILL TO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $cus_name; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
		<div class="table_component" style="width:30%;height:100px;margin-right:1%;"role="region" tabindex="0">
            <table>
                <thead>
                    <tr>
                        <th>SHIP TO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $cus_add; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
		<div class="table_component" style="width: 38%;height: 100px;"role="region" tabindex="0">
            <table style="text-align: center;">
                <thead>
                    <tr>
                        <th>Invoice Date</th>
                        <th>Instalation Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="invoiceDate"></td>
						<td><?php echo $ins_date; ?></td>
                    </tr>
					<tr>
                        <td colspan="2">Car Brand & Model : <?php echo $car_brand  . $car_model; ?></td>
                    </tr>
					<tr>
                        <td >Chassis : <?php echo $car_chas; ?> </td>
						<td>Police : <?php echo $car_police; ?></td>
                    </tr>
					
                </tbody>
            </table>
        </div>
        
    </div>
<div class="container" style="padding-bottom:0;">
        <div class="table_component" style="width: 100%;" role="region" tabindex="0">
            <table style="text-align: center;">
                <thead>
                    <tr>
                        <th>ITEM DESCRIPTION</th>
                        <th>WINDOW POSITION</th>
                        <th>POSITION DETAIL</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $inv_desc; ?></td>
                        <td><?php echo $win_pos; ?></td>
                        <td><?php echo $pos_dtl; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $total; ?></td>
                    </tr>
					<tr>
                        <td><?php echo $inv_desc1; ?></td>
                        <td><?php echo $win_pos1; ?></td>
                        <td><?php echo $pos_dtl1; ?></td>
                        <td><?php echo $qty1; ?></td>
                        <td><?php echo $price1; ?></td>
                       <td><?php echo $total1; ?></td>
                    </tr>
					<tr>
                        <td><?php echo $inv_desc2; ?></td>
                        <td><?php echo $win_pos2; ?></td>
                        <td><?php echo $pos_dtl2; ?></td>
                        <td><?php echo $qty2; ?></td>
                        <td><?php echo $price2; ?></td>
                       <td><?php echo $total2; ?></td>
                    </tr>
					<tr>
                        <td><?php echo $inv_desc3; ?></td>
                        <td><?php echo $win_pos3; ?></td>
                        <td><?php echo $pos_dtl3; ?></td>
                        <td><?php echo $qty3; ?></td>
                        <td><?php echo $price3; ?></td>
                       <td><?php echo $total3; ?></td>
                    </tr>
					<tr>
                        <td><?php echo $inv_desc4; ?></td>
                        <td><?php echo $win_pos4; ?></td>
                        <td><?php echo $pos_dtl4; ?></td>
                        <td><?php echo $qty4; ?></td>
                        <td><?php echo $price4; ?></td>
                       <td><?php echo $total4; ?></td>
                    </tr>
					<tr>
                        <td><?php echo $inv_desc5; ?></td>
                        <td><?php echo $win_pos5; ?></td>
                        <td><?php echo $pos_dtl5; ?></td>
                        <td><?php echo $qty5; ?></td>
                        <td><?php echo $price5; ?></td>
                       <td><?php echo $total5; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
	
	<div class="container" >
	<div style="width:65%; margin-right:5%;">
      <p>Say:</p>
      
      <p>NOTE: <?php echo $note1; ?></p>
	  <p></p>
     
    </div>
        <div class="table_component" style="width: 30%;" role="region" tabindex="0">
            <table>
                <thead>
                    <tr>
                        <th>Sub Total</th>
					
						<td>0</td>
                    </tr>
					
                    <tr>
                        
						<th>Disc. Inv %</th>
						
						<td>0</td>
                    </tr>
                    <tr>
                        
						<th>PPN</th>
						
						<td>0</td>
                    </tr>
                   
                    <tr>
                        
						<th>Total Invoice</th>
					
						<td>0</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
			
        </div>
       
	   
</body>
<script>
    // Get the current date
    var currentDate = new Date();

    // Format the date as needed (adjust the format accordingly)
    var formattedDate = currentDate.toLocaleDateString('en-US'); // Change the locale as needed

    // Update the content of the invoice date cell with the current date
    document.getElementById("invoiceDate").innerHTML = formattedDate;
</script>
<script>
    window.onload = function () {
        window.print({ copies: 2 });
    }
</script>

</html>
