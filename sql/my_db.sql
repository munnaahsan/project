use my_db;

drop table if exists users;
create table users(
    id int(255) primary key auto_increment,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    role_id int(255)
);

insert into users(name,email,password,role_id) values('Munna Ahsan','munna7e@gmail.com','1234',1);
insert into users(name,email,password,role_id) values('David Warner','cicole@gmail.com','12346',2);
insert into users(name,email,password,role_id) values('Adam Gilchrist','jhonse@gmail.com','12345',2);


drop table if exists role;
create table role(
    id int(255) primary key auto_increment,
    name varchar(255),
    role_id int(255)
);

insert into role(name,role_id) values('Admin',1);
insert into role(name,role_id) values('Manager',2);

drop table if exists suppliers;
create table suppliers(
    id int(255) primary key auto_increment,
    name varchar(255),
    contact_no varchar(255),
    email varchar(255) default 'N/A',
    address text,
    comments text
);

insert into suppliers (name,contact_no,email,address,comments) values
('Bricosta Limited','880175692','bricosta@gmail.com','USA','Cotton Supplier'),
('Xabed Febrics','01956568745','rohim@gmail.com','Dhaka','Febric Supplier'),
('Javed Group','01856235987','javed@gmail.com','Dhaka','T-Shirt Supplier'),
('Apex Limited','01859786954','apex@gmail.com','Dhaka','Jeans Suupplier'),
('Jahid','0145987612','jahid@gmail.com','Khulna','Coats Supplier'),
('Akash','0145987612','akash@gmail.com','Borisal','Jumper Supplier'),
('Shukhon','01859784596','shukhon@gmail.com','Shylet','Blazers Supplier'),
('Nithin','01945784595','nithin@gmail.com','Khulna','Febric Supplier'),
('Rahul','01856998415','rahul@gmail.com','Kushtia','Cotton Supplier'),
('Amit','01745987452','amit@gmail.com','Cox-s Bazar','Coats Supplier'),
('Sumit','01452965875','sumit@gmail.com','Rajshahi','Shari Supplier')
;

drop table if exists product;
create table product(
    id int(255) primary key auto_increment,
    name varchar(255),
    price double,
    uom_id int(255),
    category_id int(255),
    size_id int(255),
    grad int(255),
    color int(255),
    image varchar(255),
    date timestamp 

);

insert into product values(1,'Jackets',750,1,1,3,2,2,1,'2018-01-01');

insert into product values(2,'Coats',1200,1,4,2,1,6,1,'2018-01-01');

insert into product values(3,'Blazer',1450,1,3,3,3,7,1,'2018-01-01');

insert into product values(4,'T-Shirt',350,1,2,4,1,9,1,'2018-01-01');

insert into product values(5,'Jeans',700,1,11,5,3,3,1,'2018-01-01');

insert into product values(6,'Shari',1250,1,10,3,1,4,1,'2018-01-01');

insert into product values(7,'Lungi',250,1,8,3,2,5,1,'2018-01-01');

insert into product values(8,'Shirt',450,1,7,4,3,6,1,'2018-01-01');

insert into product values(9,'Short-Long',350,1,9,3,2,8,1,'2018-01-01');

insert into product values(10,'Panjabi',550,1,6,1,1,2,1,'2018-01-01');

drop table if exists category;
create table category(
    cat_id int(255) primary key auto_increment,
    cat_title varchar(255),
    cat_desc varchar(255)
);

insert into category values(1,'Jackets','details About Jackets');
insert into category values(2,'T-Shirt','details About T-Shirt');
insert into category values(3,'Blazers','details About Blazers');
insert into category values(4,'Coats','details About Coats');
insert into category values(5,'Jumper','details About Jumper');
insert into category values(6,'Long-Panjabi','details About Long-Panjabi');
insert into category values(7,'Shirt','details About Shirt');
insert into category values(8,'Lungi','details About Lungi');
insert into category values(9,'Short-Long','details About Short-Long');
insert into category values(10,'Shari','details About Shari');
insert into category values(11,'Jeans','details About Jeans');

drop table if exists uom;
create table uom(
   uom_id int(255) primary key auto_increment,
   uom_name varchar(255)
);

insert into uom(uom_name) values('Piece');
insert into uom(uom_name) values('Pound');
insert into uom(uom_name) values('Gram');
insert into uom(uom_name) values('Ince');
insert into uom(uom_name) values('KG');
insert into uom(uom_name) values('Meter');

drop table if exists size;
create table size(
    sz_id int(255) primary key auto_increment,
    sz_name varchar(255)
);

insert into size(sz_name) values('Small(sm)');
insert into size(sz_name) values('Small Long(sl)');
insert into size(sz_name) values('Large(lg)');
insert into size(sz_name) values('Extra Large(XL)');
insert into size(sz_name) values('small(sm)');
insert into size(sz_name) values('XXl');


drop table if exists grade;
create table grade(
    
    grd_id int(255) primary key auto_increment,
    grd_name varchar(255)
);

insert into grade values(1,'Fresh Quality');
insert into grade values(2,'High Quality');
insert into grade values(3,'Medium Quality');
insert into grade values(4,'Reject Quality');
insert into grade values(5,'Low Quality');


drop table if exists color;
create table color(
    clr_id int(255) primary key auto_increment,
    clr_name varchar(255)
);

insert into color values(1,'Pink');
insert into color values(2,'White');
insert into color values(3,'Red');
insert into color values(4,'Purple');
insert into color values(5,'Yellow');
insert into color values(6,'Black');
insert into color values(7,'Blue');
insert into color values(8,'Off-White');
insert into color values(9,'Gray');

drop table if exists image;
create table image(
    img_id int(255) primary key auto_increment,
    img_name varchar(255)
);

insert into image(img_name) values('jackets.jpg');
insert into image(img_name) values('t-shirt.jpg');
insert into image(img_name) values('jeans.jpg');
insert into image(img_name) values('long.jpg');

drop table if exists date;
create table date(
    dt_id int(255) primary key auto_increment,
    dt_time timestamp 
);


drop table if exists customer;
create table customer(
    cst_id int(255) primary key auto_increment,
    cst_name varchar(255),
    cst_num int(255),
    cst_eml varchar(255),
    cst_adr varchar(255),
    cst_com varchar(255)
);

insert into customer(cst_name,cst_num,cst_eml,cst_adr,cst_com) values
('Nicolas',01766100420,'nicolas@gmail.com','Melborn','Cotton Customer'),
('Sonam',01766100420,'sonam@gmail.com','Dhaka','T-Shirt Customer'),
('Rana',01766100420,'rana@gmail.com','Borisal','Jumper Customer'),
('Kuber',01766100420,'kuber@gmail.com','Kushtia','Coat Customer'),
('Jasor',01766100420,'jasor@gmail.com','Shylet','Panjabi Customer'),
('Nikki',01766100420,'nikki@gmail.com','Khulna','long-Cloth Customer');




drop table if exists shipping;
create table shipping(
    id int(255) primary key auto_increment,
    shp_name varchar(255)
);

insert into shipping(shp_name) values('Korim Shipping Company');
insert into shipping(shp_name) values('Rohim Shipping Agency');
insert into shipping(shp_name) values('Mehedi  Agency');
insert into shipping(shp_name) values('Rahul Carrying Agency');
insert into shipping(shp_name) values('Binot Shipping');
insert into shipping(shp_name) values('Nupur Carrying');
insert into shipping(shp_name) values('Amitab Shipping');
insert into shipping(shp_name) values('Boney Carrying Agency');


drop table if exists purchase_invoice;
create table purchase_invoice(
    id int(255) primary key auto_increment,
    supplier_id int(255),
    purchase_dt timestamp,
    created_on timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into purchase_invoice(supplier_id,purchase_dt,created_on) values
(1,'2018-01-01','2018-10-03 12:46:25'),
(2,'2019-02-04','2018-10-03 12:48:28'),
(3,'2019-02-04','2018-10-03 12:48:28'),
(4,'2019-04-06','2018-10-03 12:48:28'),
(5,'2019-08-11','2018-10-03 12:48:28'),
(6,'2019-11-08','2018-10-03 12:48:28');


drop table if exists purchase_invoice_details;
create table purchase_invoice_details(
    id int(255) primary key auto_increment,
    invoice_id int(255) unsigned NOT NULL,
    product_id int(255),
    qty double(10,2),
    uom varchar(255) NOT NULL,
    price double(10,2),
    ship_id int(255)
);

insert into purchase_invoice_details(id,invoice_id,product_id,qty,uom,price,ship_id) values
(1,1,6,600,1,550,1),
(2,1,4,300,1,400,1),
(3,1,1,170,1,300,1),
(4,2,8,100,4,300,2),
(5,3,3,90,6,300,8),
(6,3,2,100,1,300,8),
(7,4,9,80,1,300,5),
(8,4,7,150,2,300,5),
(9,4,5,180,1,300,5);



drop table if exists purchase_rtn;
create table purchase_rtn(
    id int(255) primary key auto_increment,
    supplier_id int(255),
    DATE timestamp,
    created_on timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into purchase_rtn VALUES
(1,4,'2019-11-10','2018-10-23 12:48:28'),
(2,3,'2019-12-03','2019-10-03 12:48:28'),
(3,2,'2019-07-08','2018-10-03 12:48:28'),
(4,6,'2019-06-08','2019-10-03 12:48:28'),
(5,1,'2019-11-07','2018-10-03 12:48:28');


drop table if exists purchase_rtn_details;
create table purchase_rtn_details(
    id int(255) primary key auto_increment,
    pr_rtn_invoice int(255),
    product_id int(255),
    qty int(255),
    uom_id int(255),
    price int(255),
    shipping_id int(255)
);

insert into purchase_rtn_details VALUES

(1,1,6,50,1,550,3),
(2,1,4,60,1,400,3),
(3,1,1,20,1,300,3),
(4,2,8,10,4,300,6),
(5,3,3,15,6,300,8),
(6,3,2,05,1,300,8),
(7,4,9,07,1,300,5),
(8,4,7,10,2,300,5),
(9,4,5,60,1,300,5);



drop table if exists sales;
create table sales(
    id int(255) primary key auto_increment,
    customer_id int(255),
    sales_dt TIMESTAMP,
    created_on timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into sales(customer_id,sales_dt,created_on) VALUES
(1,'2019-01-01','2019-09-03 12:46:25'),
(2,'2019-02-01','2019-09-03 12:46:25'),
(3,'2019-05-01','2019-09-03 12:46:25'),
(4,'2019-07-04','2019-09-03 12:46:25');



drop table if exists sales_details;
create table sales_details(
    id int(255) primary key auto_increment,
    sales_id int(255) unsigned NOT NULL,
    product_id int(255),
    qty double(10,2),
    uom varchar(255) NOT NULL,
    price double(10,2),
    ship_id int(255)
);


insert into sales_details(sales_id,product_id,qty,uom,price,ship_id) VALUES
(1,4,250,1,800,3),
(1,6,350,1,900,3),
(1,8,200,1,1000,3),
(2,1,100,1,3000,2),
(2,5,700,1,5000,2),
(3,4,250,1,5000,6),
(3,1,100,1,5000,6),
(4,3,400,1,600,1),
(4,2,100,1,6500,1),
(4,3,400,1,600,1),
(4,1,100,1,3000,1);


drop table if exists stock;
create table stock(
    id int(255) auto_increment primary key,
    product_id int(255)  NOT NULL,
    qty double(10,2) NOT NULL,
    reference VARCHAR(255),
    date TIMESTAMP
);




