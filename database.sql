CREATE DATABASE dinzz_barbershop;

USE dinzz_barbershop;

CREATE TABLE booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    no_hp VARCHAR(20),
    layanan VARCHAR(100),
    tanggal DATE,
    jam TIME
);