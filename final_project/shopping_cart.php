<?php
$title = "Grocery Cart";
$description = "Grocery Cart";
include ('inc/header.php');
include('inc/functions.php');
require_once 'inc/open_db.php';
$_SESSION['total'] = 0;

if (isset($_POST['cancel'])) {
    emptyShoppingCart($db, $_SESSION['current_user']);
    unset($_POST['cancel']);
}
$shopping_cart = getShoppingCart($db, $_SESSION['current_user']);
if(count($shopping_cart) > 0){
?>
<table>
    <thead>
        <tr>
            <th colspan="3" id="table_title">Order Summary for <?php echo $_SESSION['current_user'];?></th>
        </tr>
        <tr>
            <th>Quantity</th>
            <th>Item</th>
            <th>Price</th>
        </tr>
    </thead>
<?php 

$inventory = getGroceries($db);
 foreach ($shopping_cart as $key2 =>$cart_item) {
        foreach ($inventory as $key => $item){
    ?>       
        <?php  
            if ($cart_item['itemid'] == $inventory[$key]['itemid']) { ?>
                <tr><td><?php echo $cart_item['quantity']; 
                    ?> </td> <?php } ?>
        <?php
            if ($cart_item['itemid'] == $inventory[$key]['itemid']) { ?>
                <td>
             <?php   echo $inventory[$key]['name'];
                ?></td> <?php } ?> 
        <?php
            if ($cart_item['itemid'] == $inventory[$key]['itemid']) { ?>
                <td>
                <?php   echo '$' . money_format('%.2n', $inventory[$key2]['price'] * $cart_item['quantity']);
                    $_SESSION['total'] = (float) $_SESSION['total'] + ((float)$inventory[$key2]['price'] * $cart_item['quantity']);
                ?></td> <?php } ?>
            </tr>
        <?php
    }
}
    ?>
    <tr>
        <td id="total">Order Total</td><td></td>
        <td><?php echo '$' . money_format('%.2n', $_SESSION['total']); ?></td>
    </tr>
</table>
<form action="index.php">
    <input type="submit" value="Continue Shopping" class="cart_buttons" />
</form>
<form method="POST" action="shopping_cart.php">
    <input type="submit" value="Cancel Order" name="cancel" class="cart_buttons"/>
</form>
<form action="confirm.php" method="POST" >
    <input type="submit" value="Place Order" class="cart_buttons"/>
</form>
<?php
}
   else{
       echo 'Your cart is empty. <br><br>
             <a href="index.php">Click here to return to the order page.</a><br><br> ';
   }
include ('inc/footer.php');
?>