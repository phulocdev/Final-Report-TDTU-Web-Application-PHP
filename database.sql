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




-- --------------------------------------------------------------------------------------------
SET SQL_SAFE_UPDATES = 0;

delete from user where email = 'admin@gmail.com';
UPDATE area
SET role = 1
WHERE email = 'admin@gmail.com';

select * from user;
insert into user values ('admin@gmail.com', '123', 1);

ALTER TABLE destination
ADD COLUMN thumbnail varchar(300) NOT NULL;

ALTER TABLE destination
MODIFY COLUMN maKhuVuc varchar(20) NOT NULL;

select * from country;
select * from area;

select * from destination
select * from country

insert into destination(tenDiaDiem, maKhuVuc, maQuocGia, thumbnail) values ('Vung Tau', '00184', 'eng', './uploads/country/20240529052835avt.png')

select * from destination
delete from destination


INSERT INTO area VALUES ('SW1A 0AA', 'Westminster, London');
INSERT INTO area VALUES ('101100', 'Huairou District, Beijing');
INSERT INTO area VALUES ('2000', 'Bennelong Point, Sydney');
INSERT INTO area VALUES ('282001', 'Agra, Uttar Pradesh');
INSERT INTO area VALUES ('22241-125', 'Cosme Velho, Rio de Janeiro');
INSERT INTO area VALUES ('12561', 'Giza Governorate');
INSERT INTO area VALUES ('403-0005', 'Fujiyoshida, Yamanashi Prefecture');



