<?php
$title = "Grocery Delivery";
$description = "Grocery Delivery";
include 'inc/header.php';
include 'inc/functions.php';
require_once 'inc/open_db.php';

date_default_timezone_set('America/New_York');
$delivery_time = $_POST['time'];
if(isset($_POST['place_order'])){
  unset($_POST['place_order']);
  storeAddress($db, $_POST['customer_name'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_SESSION['current_user']);
  $orderNumber = uniqid();
  storeOrder($db, $orderNumber, $_SESSION['total'], $_SESSION['current_user'], $delivery_time);
  $shopping_cart = getShoppingCart($db, $_SESSION['current_user']);
  foreach ($shopping_cart as $item) {
  	storeOrderItem($db, $item['itemid'], $orderNumber, $item['quantity']);
  }

  $msg = "Your order was successfully submitted.\nIt will be delivered to\n" . $_POST['customer_name'] . "\n".$_POST['address'] . "\n" . $_POST['city'] . ",\n" . $_POST['state'] . "\n" . $_POST['zip'] . "\nDelivery time:  " . $delivery_time . ".";

$sender = 'someone@somedomain.tld';
$recipient = 'tpal2010@gmail.com';

$subject = "php mail test";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $msg, $headers))
{
    echo "Email sent succesfully!";
}
else
{
    echo "Error: Email failed to send.";
}

  // mail($_SESSION['current_user'],"Order Confirmation",$msg);
  emptyShoppingCart($db, $_SESSION['current_user']);
}
?>
<h2>Order Confirmation</h2>

<form action="index.php" id="return_button">
    <p id="confirmation"> Your order was placed on <?php date_default_timezone_set('America/New_York');
echo date('F d, Y'); ?> at <?php echo date('g:i:s'); ?> 
<?php echo date('a'); ?><br> <br>
        Your order total is <?php echo '$' . money_format('%.2n', $_SESSION['total']) . '.'; ?><br><br>
        Your order will be shipped to the folowing address:<br><br>
        <?php echo $_POST['customer_name']; ?><br>
        <?php echo $_POST['address']; ?><br>
        <?php echo $_POST['city'] . ','; ?>
        <?php echo $_POST['state']; ?>
        <?php echo $_POST['zip']; ?><br><br>
        Expected delivery date and time is: <?php echo $delivery_time; ?><br>A confirmation email was sent to <?php echo $_SESSION['current_user'];?>
    </p><br>
    <input id="return_button" type="submit" value="Return to Home" />
</form>

<?php
include 'inc/footer.php';
?>