
<?php
$title = "Admin Page";
$description = "Admin Page";
include 'inc/header.php';
include 'inc/functions.php';
require_once 'inc/open_db.php';

if(isset($_POST['new_price'])){
	updateItemPrice($db, $_POST['new_price'], $_POST['itemid']);
	unset($_POST['new_price']);
}
?>

<table>
    <thead>
        <tr>
            <th colspan="3" id="table_title">Change Prices</th>
        </tr>
        <tr>
            <th>item</th>
            <th>price</th>
        </tr>
    </thead>
<?php
$items = getGroceries($db);
foreach ($items as $key =>$item) {?>
        <tr>
        	<td><?php echo $item['name'];?> </td> 
        	<td><?php echo $item['price'];?></td>
        	<td><?php echo '<form action="admin_page.php" method="POST">
        					<input type="hidden" name="price" value="' . $item['price'] .'">
        					<input type="hidden" name="itemid" value="' . $item['itemid'] .'">
        					New Price <input type="text" name="new_price">
    						<input type="submit" value="Change Price" name="change_price" />
							</form>';?></td>
        </tr>	
<?php } ?>
</table>
<form action="index.php" id="admin_return_button">
    <input type="submit" value="Return to Home" />
</form>

<?php
include 'inc/footer.php';
?>