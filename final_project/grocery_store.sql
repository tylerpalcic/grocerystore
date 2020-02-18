USE palcic;

-- drop tables if already exist
DROP TABLE IF EXISTS addresses;
DROP TABLE IF EXISTS orderItems;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS shoppingCart;
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
  quantity int(5) NOT NULL,
  PRIMARY KEY (itemid)
);

CREATE TABLE shoppingCart (
  username varchar(255) NOT NULL,
  itemid int(5) NOT NULL,
  quantity int(5) NOT NULL,
  PRIMARY KEY (itemid, username),
  CONSTRAINT FOREIGN KEY (itemid) references items (itemid),
  CONSTRAINT FOREIGN KEY (username) references users (username)
);

CREATE TABLE orders (
  orderid varchar(255) NOT NULL,
  total decimal(3,2) NOT NULL,
  username varchar(255) NOT NULL,
  deliveryTime datetime NOT NULL,
  PRIMARY KEY (orderid),
  CONSTRAINT FOREIGN KEY (username) references users (username)
);

CREATE TABLE orderItems (
  itemid int(5) NOT NULL,
  orderid varchar(255) NOT NULL,
  quantity int(5) NOT NULL,
  PRIMARY KEY (itemid, orderid),
  CONSTRAINT FOREIGN KEY (orderid) references orders (orderid),
  CONSTRAINT FOREIGN KEY (itemid) references items (itemid)
);

CREATE TABLE addresses (
  name varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  city varchar(255) NOT NULL,
  state varchar(255) NOT NULL,
  zip varchar(255) NOT NULL,
  username varchar(255) NOT NULL,
  PRIMARY KEY (name, address, city),
  CONSTRAINT FOREIGN KEY (username) references users (username)
);

INSERT INTO items VALUES
(1, 'bread', 'grain', 1.99, 10),
(2, 'blueberries', 'fruit', 3.50, 10),
(3, 'milk', 'dairy', 2.20, 10),
(4, 'steak', 'meat', 5.00, 10),
(5, 'asparagus', 'vegetable', 2.00, 10),
(6, 'waffles', 'grain', 2.39, 10),
(7, 'peach', 'fruit', 0.89, 10),
(8, 'cheese', 'dairy', 3.10, 10),
(9, 'chicken', 'meat', 4.40, 10),
(10, 'spinach', 'vegetable', 1.30, 10);