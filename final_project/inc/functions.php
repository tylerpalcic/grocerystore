<?php function getGroceries($db) {
$query = "SELECT * from items";
    $statement = $db->prepare($query);
    $statement->execute();
    $groceries = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $groceries;
}
function addToShoppingCart($db, $itemid, $quantity, $username) {
    $query = "INSERT into shoppingCart (`itemid`, `quantity`,`username`) VALUES (:itemid, :quantity, :username)";
    $statement = $db->prepare($query);
    $statement->bindValue(':itemid', $itemid);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();
}
function storeOrder($db, $orderid, $total, $username, $deliveryTime) {
    $query = "INSERT INTO orders VALUES (:orderid, :total, :username, :deliveryTime)";
    $statement = $db->prepare($query);
    $statement->bindValue(':orderid', $orderid);
    $statement->bindValue(':total', $total);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':deliveryTime', $deliveryTime);
    $statement->execute();
    $statement->closeCursor();
}

function storeAddress($db, $name, $address, $city, $state, $zip, $username) {
    $query = "INSERT INTO addresses (`name`, `address`,`city` ,`state`, `zip`, `username`)VALUES (:name, :address, :city, :state, :zip, :username)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();
}

function storeOrderItem($db, $itemid, $orderid, $quantity) {
    $query = "INSERT into orderItems (`itemid`, `orderid`, `quantity`) VALUES (:itemid, :orderid, :quantity)";
    $statement = $db->prepare($query);
    $statement->bindValue(':itemid', $itemid);
    $statement->bindValue(':orderid', $orderid);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

function emptyShoppingCart($db, $username){
$query = "DELETE from shoppingCart WHERE username = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getShoppingCart($db, $username){
    $query = "SELECT * from shoppingCart WHERE username = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function adminCheck($db, $username){
    $query = "SELECT usertype FROM users WHERE `username` = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $isAdmin = $statement->fetch();
    $statement->closeCursor();
    return $isAdmin['usertype'] == 'admin';
}

function getUsers($db){
    $query = "SELECT * from users";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getAddress($db, $username){
    $query = "SELECT * from addresses WHERE `username` = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getOrderHistory($db, $username){
    $query = "SELECT * from orders WHERE username = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getOrderItems($db, $orderid){
    $query = "SELECT * from orderItems WHERE orderid = '$orderid'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function deleteUser($db, $username){
    $query = "DELETE from users WHERE username = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function updateItemPrice($db, $price, $itemid){ 
    $query = "UPDATE `items` SET `price` = '$price' WHERE `items`.`itemid` = $itemid"; 
    $statement = $db->prepare($query);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':itemid', $itemid);
    $statement->execute();
    $statement->closeCursor();
}
?>