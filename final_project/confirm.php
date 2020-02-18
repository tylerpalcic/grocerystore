<?php
$title = "Grocery Delivery";
$description = "Grocery Delivery";
include 'inc/header.php';
include 'inc/functions.php';
require_once 'inc/open_db.php';

$address = getAddress($db, $_SESSION['current_user']);
if($address == null){ 
?>

<main>
<h2>Shipping Information</h2>
<form class="shipping_form" action="complete.php" method="POST" id="shipping_info" >
    <label>Customer Name:</label> <input type="text" name="customer_name" autofocus class="shipping_info_textfields">
  <br>
   <label> Street Address:</label> <input type="text" name="address" class="shipping_info_textfields">
  <br>
  <label>  City:</label> <input type="text" name="city" class="shipping_info_textfields">
  <br>
  <label>  State:</label> <select name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>	
  <br>
  <label>Zip Code:</label> <input type="text" name="zip" class="shipping_info_textfields">
  <br>
  <label>Delivery Time (Selet one):</label><br>
  <input type="radio" name="time" value="2019-12-10 12:00:00"> 2019-12-10 12:00:00<br>
  <input type="radio" name="time" value="2019-12-12 1:00:00"> 2019-12-12 1:00:00<br>
  <input type="radio" name="time" value="2019-12-15 2:30:00"> 2019-12-15 2:30:00<br>
  <input type="submit" action="complete.php" value="Place Order" id="shipping_submit"  name="place_order">
</form>
<?php }else{ ?>
		<main>
<h2>Shipping Information</h2>
<form class="shipping_form" action="complete.php" method="POST" id="shipping_info" >
    <label>Customer Name:</label> <input type="text" name="customer_name" autofocus class="shipping_info_textfields" value="<?php echo $address[0]['name']?>">
  <br>
   <label> Street Address:</label> <input type="text" name="address" class="shipping_info_textfields" value="<?php echo $address[0]['address']?>">
  <br>
  <label>  City:</label> <input type="text" name="city" class="shipping_info_textfields" value="<?php echo $address[0]['city']?>">
  <br>
  <label>  State:</label> <select name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>	
  <br>
  <label>Zip Code:</label> <input type="text" name="zip" class="shipping_info_textfields" value="<?php echo $address[0]['zip']?>">
  <br>
  <label>Delivery Time (Selet one):</label><br>
  <input type="radio" name="time" checked="checked" value="2019-12-10 12:00:00"> 2019-12-10 12:00:00<br>
  <input type="radio" name="time" value="2019-12-12 1:00:00"> 2019-12-12 1:00:00<br>
  <input type="radio" name="time" value="2019-12-15 2:30:00"> 2019-12-15 2:30:00<br>
  <input type="submit" action="complete.php" value="Place Order" id="shipping_submit"  name="place_order">
</form>
<?php
	  }
?>
<form action="shopping_cart.php" id="return_to_cart_button">
    <input type="submit" value="Return to Cart" />
</form>
  </main>

<?php
include 'inc/footer.php';
?>