<?php
$title = "Tyler's Grocery Delivery";
$description = "Tyler's Grocery Delivery";
include 'inc/header.php';
include 'inc/functions.php';
require_once 'inc/open_db.php';

$groceries_array = getGroceries($db);
if (isset($_POST['id'])) { 
	if(isset($_SESSION['current_user'])) {
		addToShoppingCart($db, $_POST['id'], $_POST['quantity'], $_SESSION['current_user']);
		unset($_POST['id']);
	}else{
		echo 'A user must be logged-in to add an item to the shopping cart.';
	}
}
 
if (isset($_SESSION['current_user'])){ 
	echo "<form action='login_files/logout.php' method='post'>";
	echo "<input type='submit' name='logout' value='Logout'>";
	echo "</form>";
	echo '<label class="login_labels">Current user: ' . $_SESSION['current_user'] . '</label>';
	echo '<form action="history.php">';
	echo '<input type="submit" value="'. $_SESSION['current_user'] . ' Order History"/>';
	echo '</form>';
		if(adminCheck($db, $_SESSION['current_user'])){
			echo '<br><label class="login_labels"> ' . $_SESSION['current_user'] . ' is an admin</label>';
			echo '<form action="admin_page.php" class="shipping_info_buttons">';
		echo '<input type="submit" value="Go To Admin Page" />';
		echo '</form>';
		}else{
			echo '<br><label> ' . $_SESSION['current_user'] . ' is not an admin</label>';
		}
	echo '<a href="shopping_cart.php"><img src="images/shopping-cart.jpg" id="cart_img" alt="shopping-cart-icon"/></a>';
}
else {
  echo "<form action='login_files/login_start.php' method='post'>";
  echo "<input type='submit' value='Login/create account'>";
  echo "</form>";
 }

if(isset($_POST['category'])){
  echo '<br><label class="login_labels">Currently sorting by: ' . $_POST['category'] .'</label>';
  $selectedCategory = $_POST['category'];
}
?>
<form  action="index.php" method="POST">
 <label class="login_labels">Sort By Category:</label><br>
  <input type="radio" name="category" value="all" <?php if(isset($_POST['category']) && $_POST['category'] == 'all') echo ' checked="checked"'?>> All
  <input type="radio" name="category" value="grain" <?php if(isset($_POST['category']) && $_POST['category'] == 'grain') echo ' checked="checked"'?>> Grain
  <input type="radio" name="category" value="fruit" <?php if(isset($_POST['category']) && $_POST['category'] == 'fruit') echo ' checked="checked"'?>> Fruit
  <input type="radio" name="category" value="dairy" <?php if(isset($_POST['category']) && $_POST['category'] == 'dairy') echo ' checked="checked"'?>> Dairy
  <input type="radio" name="category" value="meat" <?php if(isset($_POST['category']) && $_POST['category'] == 'meat') echo ' checked="checked"'?>> Meat
  <input type="radio" name="category" value="vegetable" <?php if(isset($_POST['category']) && $_POST['category'] == 'vegetable') echo ' checked="checked"'?>> Vegetable
  <input type="submit" value="Sort"><br>
</form>
<main>
<?php 
	if(!isset($selectedCategory)){
		$selectedCategory = 'all';
	}
	foreach ($groceries_array as $grocery) {
		// echo 'selectedCategory: ' . $selectedCategory;
		if($grocery['category'] == $selectedCategory || $selectedCategory == 'all'){?>
    <form  action="index.php" method="POST">
    	<figure>
        <img src="images/<?php echo $grocery['name'] ?>.jpg" />
        <figcaption>
    <label class="grocery_name"><?php echo $grocery['name'] ?></label><br>
            $<?php echo $grocery['price'] ?><br>
            <label>  Quantity:</label> 
            <select name="quantity">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>	
  			<br>
                <input type="hidden" name="id" value="<?php echo $grocery['itemid']; ?>">
                <input type="submit" value="Add to Cart">
            </form>
        </figcaption>
    </figure>

    <?php
		}
	}
?>
</main>

<?php
include 'inc/footer.php';
?>