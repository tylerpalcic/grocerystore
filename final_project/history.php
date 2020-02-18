<?php
$title = "Order History";
$description = "Grocery Delivery";
include 'inc/header.php';
include 'inc/functions.php';
require_once 'inc/open_db.php';

$orderHistroy = getOrderHistory($db, $_SESSION['current_user']);
$items = getGroceries($db);

if(count($orderHistroy) > 0){
?>

<table>
    <thead>
        <tr>
            <th colspan="3" id="table_title">My Order History</th>
        </tr>
        <?php foreach ($orderHistroy as $order) { 
        		$orderItems = getOrderItems($db, $order['orderid']);?>
        <tr>
        	<td>Order Number:</td>
        	<td colspan="2"><?php echo $order['orderid'];?> </td>
        </tr>
        <tr>
            <td>Delivery Time:</td>
            <td colspan="2"><?php echo $order['deliveryTime'];?> </td>
        </tr>
        <?php 		foreach ($orderItems as $orderItem) { ?>
        				<tr>
        					<td> <?php echo $orderItem['quantity'];?> </td>
        					<td> <?php echo $items[$orderItem['itemid']-1]['name'];?> </td>
        					<td> <?php echo money_format('%.2n', (int)($items[$orderItem['itemid']-1]['price']) * (int)$orderItem['quantity']);?> </td>	
        				</tr>

        		<?php	} ?>
                <tr>
                            <td>Total: </td>
                            <td><?php echo money_format('%.2n', $order['total']);?> </td>
                        </tr>
    		<?php	} ?>
    </thead>
</table>
<?php 
}else{
	echo "You haven't placed an order yet!";
}
?>
<form action="index.php" id="history_return_button">
    <input type="submit" value="Return to Home" />
</form>

<?php
include 'inc/footer.php';
?>