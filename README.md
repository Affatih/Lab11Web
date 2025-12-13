# Lab11Web
Tujuan Praktikum
Memahami konsep dasar Framework Modular.
Memahami konsep routing menggunakan .htaccess.
Membangun mini-framework sederhana berbasis PHP OOP.
Melakukan CRUD menggunakan class Database dan Form.

# Struktur Folder

Lab11Web/
├── .htaccess
├── config.php
├── index.php
├── class/
│   ├── Database.php
│   └── Form.php
├── module/
│   └── artikel/
│       ├── index.php
│       ├── tambah.php
│       ├── ubah.php
│       └── hapus.php
├── template/
│   ├── header.php
│   ├── footer.php
│   └── sidebar.php
└── README.md

Routing
Routing membaca URL dan mengarahkan ke modul sesuai path: Contoh: /artikel/tambah → module/artikel/tambah.php

Database
Gunakan database berikut:

CREATE DATABASE latihan_oop;
USE Lab11Web;

CREATE TABLE artikel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    isi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
