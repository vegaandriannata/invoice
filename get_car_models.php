
<?php
include 'koneksi.php';

$selectedBrand = $_POST['brand'];

$sql_car_model = "SELECT car_model FROM car_type WHERE car_brand = '$selectedBrand'";
$result_car_model = $koneksi->query($sql_car_model);

if ($result_car_model->num_rows > 0) {
    $car_model_options = '<label for="car_model">Car Model:</label>
                          <select id="car_model" name="car_model" required>';
    while ($row_car_model = $result_car_model->fetch_assoc()) {
        $car_model_name = $row_car_model['car_model'];
        $car_model_options .= "<option value='$car_model_name'>$car_model_name</option>";
    }
    $car_model_options .= '</select>';
    echo $car_model_options;
} else {
    echo '<p>No car models available for the selected brand.</p>';
}
?>
