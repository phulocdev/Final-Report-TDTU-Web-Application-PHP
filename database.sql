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




-- --------------------------------------------------------------------------------------------
SET SQL_SAFE_UPDATES = 0;

delete from user where email = 'admin@gmail.com';
UPDATE area
SET role = 1
WHERE email = 'admin@gmail.com';

select * from user;
insert into user values ('admin@gmail.com', '123', 1);
hdvhdv
ALTER TABLE tour
ADD COLUMN thumbnail varchar(300) NOT NULL;

ALTER TABLE tour
MODIFY COLUMN maKhuVuc varchar(20) NOT NULL;

select * from country;
select * from area;

select * from destination
select * from country

insert into destination(tenDiaDiem, maKhuVuc, maQuocGia, thumbnail) values ('Vung Tau', '00184', 'eng', './uploads/country/20240529052835avt.png')

select * from destination
delete from destination
select * from user

INSERT INTO area VALUES ('SW1A 0AA', 'Westminster, London');
INSERT INTO area VALUES ('101100', 'Huairou District, Beijing');
INSERT INTO area VALUES ('2000', 'Bennelong Point, Sydney');
INSERT INTO area VALUES ('282001', 'Agra, Uttar Pradesh');
INSERT INTO area VALUES ('22241-125', 'Cosme Velho, Rio de Janeiro');
INSERT INTO area VALUES ('12561', 'Giza Governorate');
INSERT INTO area VALUES ('403-0005', 'Fujiyoshida, Yamanashi Prefecture');

SELECT * FROM hdvhdv
select * from tour

INSERT INTO HDV (hoTen, ngayVaoLam, facebook, instagram, twitter, chucVu, gioiTinh)
VALUES 
('Nguyễn Văn Hùng', '2023-05-01 08:00:00', 'facebook.com/nguyenvanhung', 'instagram.com/nguyenvanhung', 'twitter.com/nguyenvanhung', 'Hướng dẫn viên', 1),
('Trần Thị Dũng', '2022-06-15 09:00:00', 'facebook.com/tranthingadung', 'instagram.com/tranthingadung', 'twitter.com/tranthingadung', 'Quản lý', 0),
('Lê Thị Linh', '2021-07-20 10:00:00', 'facebook.com/lethilinh', 'instagram.com/lethilinh', 'twitter.com/lethilinh', 'Hướng dẫn viên', 0),
('Phạm Văn Ngân', '2020-08-25 11:00:00', 'facebook.com/phamvangan', 'instagram.com/phamvangan', 'twitter.com/phamvangan', 'Hướng dẫn viên', 1),
('Hoàng Minh Hải', '2019-09-30 12:00:00', 'facebook.com/hoangminhhai', 'instagram.com/hoangminhhai', 'twitter.com/hoangminhhai', 'Quản lý', 1),
('Đặng Thị Lan', '2018-10-05 13:00:00', 'facebook.com/dangthilan', 'instagram.com/dangthilan', 'twitter.com/dangthilan', 'Hướng dẫn viên', 0),
('Bùi Văn Tuấn', '2017-11-10 14:00:00', 'facebook.com/buivantuan', 'instagram.com/buivantuan', 'twitter.com/buivantuan', 'Hướng dẫn viên', 1),
('Phạm Thị Hương', '2016-12-15 15:00:00', 'facebook.com/phamthihuong', 'instagram.com/phamthihuong', 'twitter.com/phamthihuong', 'Quản lý', 0),
('Vũ Quang Long', '2015-01-20 16:00:00', 'facebook.com/vuquanglong', 'instagram.com/vuquanglong', 'twitter.com/vuquanglong', 'Hướng dẫn viên', 1),
('Trịnh Thị Phương', '2014-02-25 17:00:00', 'facebook.com/trinhthiphuong', 'instagram.com/trinhthiphuong', 'twitter.com/trinhthiphuong', 'Hướng dẫn viên', 0);



