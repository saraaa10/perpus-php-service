-- database.sql

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS perpus_db;

-- Use the created database
USE perpus_db;

-- Create the books table
CREATE TABLE IF NOT EXISTS books (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    penerbit VARCHAR(255) NOT NULL,
    penulis VARCHAR(255) NOT NULL,
    tahun_terbit INT NOT NULL,
    jumlah_halaman INT NOT NULL
);

-- Insert some sample data if needed
INSERT INTO books (nama, isbn, penerbit, penulis, tahun_terbit, jumlah_halaman)
VALUES
    ('Book 1', '1234567890', 'Publisher A', 'Author X', 2022, 200),
    ('Book 2', '0987654321', 'Publisher B', 'Author Y', 2020, 150),
    ('Book 3', '1111222233', 'Publisher C', 'Author Z', 2021, 180);
