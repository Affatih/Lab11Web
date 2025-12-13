<!DOCTYPE html>
<html>
<head>
    <title>Praktikum 11 OOP Lanjutan</title>
    <style>
        /* Global Reset */
        body { font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; color: #333; }
        a { text-decoration: none; color: #007bff; }
        a:hover { color: #0056b3; }

        /* Layout */
        .header { background: #007bff; color: white; padding: 15px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .wrapper { display: flex; min-height: 100vh; }
        .sidebar { width: 200px; background: #2c3e50; color: white; padding: 20px 0; box-shadow: 2px 0 5px rgba(0,0,0,0.1); }
        .sidebar h3 { padding: 0 20px 10px; margin: 0; border-bottom: 1px solid #34495e; }
        .sidebar a { display: block; padding: 10px 20px; color: #ecf0f1; border-bottom: 1px solid #34495e; }
        .sidebar a:hover { background: #34495e; color: #ffffff; }
        .content { flex-grow: 1; padding: 20px; }

        /* Table Styling */
        .data-table { border-collapse: collapse; width: 100%; margin-top: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .data-table th { background-color: #f8f8f8; color: #555; }
        .data-table tr:nth-child(even) { background-color: #f9f9f9; }
        .data-table tr:hover { background-color: #f1f1f1; }
        .aksi-col a { margin-right: 10px; }

        /* Form Styling */
        .form-table input[type="text"], .form-table textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-table .label-col { width: 150px; text-align: right; padding-right: 20px; vertical-align: top; }
        .form-table .submit-col input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            float: right;
        }
        .form-table .submit-col input[type="submit"]:hover { background-color: #218838; }
    </style>
</head>
<body>

<div class="header">
    <h2>Praktikum 11 - PHP OOP Lanjutan</h2>
</div>

<div class="wrapper">
    <div class="sidebar">
        <h3>Menu</h3>
    <a href="/labweb11/artikel/index">Daftar Artikel</a>
    <a href="/labweb11/artikel/tambah">Tambah Baru</a>
    </div>

    <div class="content">