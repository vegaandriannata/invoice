<?php
// Include your database connection file (e.g., 'koneksi.php')
include 'koneksi.php';
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
// Retrieve data from the POST request
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

// Perform data validation and sanitation if needed

// Insert data into the database
$query = "INSERT INTO master_invoice (sales_invoice, order_date,  note1, note2, bong_pas, status,  ins_date,
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
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Data has been successfully inserted into the database
    echo "Data has been successfully saved to the server.";
} else {
    // Handle errors
    echo "Error saving data to the server: " . mysqli_error($koneksi);
}

// Close the database connection
mysqli_close($koneksi);
?>
