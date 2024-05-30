create database safetour;
use safetour;

create table user (
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role TINYINT(1) NOT NULL DEFAULT 0
);

create table country (
	maQuocGia varchar(5) NOT NULL PRIMARY KEY,
    tenQuocGia varchar(30) NOT NULL,
    danhGia float NOT NULL,
    thumbnail varchar(300) NOT NULL
);

create table area (
	maKhuVuc varchar(20) NOT NULL PRIMARY KEY,
    tenKhuVuc varchar(30) NOT NULL
);

create table destination (
    maDiaDiem INT AUTO_INCREMENT PRIMARY KEY,
    tenDiaDiem VARCHAR(30) NOT NULL UNIQUE,
    maKhuVuc varchar(20) NOT NULL,
    maQuocGia varchar(5) NOT NULL,
    thumbnail varchar(300) NOT NULL
);

create table tour (
	tourID INT AUTO_INCREMENT PRIMARY KEY,
    tourName varchar(60) NOT NULL,
    price int NOT NULL,
    soCho int NOT NULL,
    thumbnail varchar(300) NOT NULL,
    soNgay int NOT NULL,
    ngayKhoiHanh datetime NOT NULL,
    videoDesc varchar(200) NOT NULL,
	soDiemDen int NOT NULL,
    maKhuVuc varchar(20) NOT NULL,
    HdvID INT NOT NULL
);

create table HDV 
(
	HdvID INT AUTO_INCREMENT PRIMARY KEY,
    hoTen varchar(30) NOT NULL,
    ngayVaoLam datetime NOT NULL,
    facebook varchar(200) NOT NULL,
    instagram varchar(200) NOT NULL,
    twitter varchar(200) NOT NULL,
	chucVu varchar(20) NOT NULL,
    gioiTinh int NOT NULL
);

create table customer 
(
customerID INT AUTO_INCREMENT PRIMARY KEY,
soCMND INT unique NOT NULL,
email varchar(50) unique NOT NULL, 
phoneNumber varchar(12) NOT NULL,
address varchar(60) NOT NULL
);

create table chitietbooktour 
(
	bookTourID INT auto_increment PRIMARY KEY,
    customerID int NOT NULL,
    tourID int NOT NULL,
    payType tinyint NOT NULL -- 0 is tt truc tiep va 1 is chuyen khoan 
);

ALTER TABLE chitietbooktour ADD CONSTRAINT fk_ctbk_customer
foreign key (customerID) REFERENCES customer(customerID);

ALTER TABLE chitietbooktour ADD CONSTRAINT fk_ctbk_tour
foreign key (tourID) REFERENCES tour(tourID);

ALTER TABLE tour ADD CONSTRAINT fk_tour_HDV
foreign key (HdvID) REFERENCES HDV(HdvID);

ALTER TABLE tour ADD CONSTRAINT fk_tour_area
foreign key (maKhuVuc) REFERENCES area(maKhuVuc);


ALTER TABLE destination
ADD CONSTRAINT fk_destination_country
FOREIGN KEY (maQuocGia) REFERENCES country(maQuocGia);

ALTER TABLE destination
ADD CONSTRAINT fk_destination_area
FOREIGN KEY (maKhuVuc) REFERENCES area(maKhuVuc);