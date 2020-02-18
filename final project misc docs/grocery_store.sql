USE palcic;

-- drop tables if already exist
DROP TABLE IF EXISTS orderItems;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  usertype varchar(255) DEFAULT 'customer',
  PRIMARY KEY (username)
);

CREATE TABLE items (
  itemid int(5) NOT NULL,
  name varchar(255) NOT NULL,
  category varchar(255) NOT NULL,
  price decimal(3,2) NOT NULL,
  PRIMARY KEY (itemid)
);

CREATE TABLE orders (
  orderid int(5) NOT NULL,
  total decimal(3,2) NOT NULL,
  username varchar(255) NOT NULL,
  PRIMARY KEY (orderid),
  CONSTRAINT FOREIGN KEY (username) references users (username)
);

CREATE TABLE orderItems (
  orderItemid int(5) NOT NULL,
  orderid int(5) NOT NULL,
  itemid int(5) NOT NULL,
  quantity int(3) NOT NULL,
  PRIMARY KEY (orderItemid),
  CONSTRAINT FOREIGN KEY (orderid) references orders (orderid),
  CONSTRAINT FOREIGN KEY (itemid) references items (itemid)
);

INSERT INTO users(username,password) VALUES
('firstlast@mail.com', 'password'),
('namename@gmail.com', 'thisismypassword');
INSERT INTO items VALUES
(1, 'bread', 'grain', 1.99),
(2, 'blueberries', 'fruit', 3.50),
(3, 'milk', 'dairy', 2.20),
(4, 'steak', 'meat', 5.00),
(5, 'asparagus', 'vegetable', 2.00),
(6, 'waffles', 'grain', 2.39),
(7, 'peach', 'fruit', 0.89),
(8, 'cheese', 'dairy', 3.10),
(9, 'chicken', 'meat', 4.40),
(10, 'spinach', 'vegetable', 1.30);m,mp[
p[l\INSERT INTO orders VALUES
(1, 10.45, 'firstlast@mail.com'),
(2, 22.50, 'namename@gmail.com');
INSERT INTO orderItems VALUES
(1, 1, 1, 2),
(2, 1, 3, 1),
(3, 1, 7, 3),
(4, 2, 1, 1),
(5, 2, 9, 2);

-- TEST QUERIES /////////////////////////////////////////////////////////

-- SELECT items.name FROM items INNER JOIN orderItems ON items.itemid = orderItems.itemid WHERE orderid = 2;
-- SELECT * FROM items  WHERE `itemid` = '1';
-- INSERT INTO items VALUES (11, 'yogurt', 'dairy', 2.79);
-- UPDATE items SET price = 6.23 WHERE itemid = 4;
-- DELETE FROM users WHERE username = 'namename@gmail.com';