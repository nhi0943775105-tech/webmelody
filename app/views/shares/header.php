<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanrio Sweet Boutique 🎀</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <style>
        /* CSS Giao Diện Nơ Hồng Coquette Toàn Hệ Thống */
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #FFF0F5 !important;
        }
        .navbar {
            background-color: #FFE4E1 !important; 
            border-bottom: 3px dashed #FF69B4 !important;
        }
        .navbar-brand {
            font-family: 'Dancing Script', cursive;
            font-size: 1.8rem;
            color: #FF69B4 !important;
            font-weight: bold;
        }
        .navbar-brand::before { content: '🎀 '; }
        .nav-link { color: #6B4E5B !important; font-weight: 600; }
        .nav-link:hover { color: #FF69B4 !important; }
        
        /* Chuyển các nút bấm mặc định thành tone hồng phấn quyến rũ */
        .btn-success, .btn-primary {
            background-color: #FFB6C1 !important;
            border-color: #FFB6C1 !important;
            color: white !important;
            border-radius: 20px;
            font-weight: bold;
        }
        .btn-success:hover, .btn-primary:hover {
            background-color: #FF69B4 !important;
            border-color: #FF69B4 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/webbanhang/Product">Angry Strawberry
            
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">