<?php 
// Gọi Database và Model để lấy sản phẩm Sanrio đổ ra trang chủ
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');

$db = (new Database())->getConnection();
$productModel = new ProductModel($db);
$products = $productModel->getProducts();

// Lấy tối đa 4 sản phẩm mới nhất làm hàng Hot
$featuredProducts = array_slice($products, 0, 4);

include 'app/views/shares/header.php'; 
?>

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #FFF0F5; 
        color: #6B4E5B;
    }
    .coquette-title {
        font-family: 'Dancing Script', cursive;
        color: #FF69B4;
        font-size: 3.5rem;
        text-shadow: 1px 1px 2px #FFC0CB;
    }
    .ribbon-divider {
        text-align: center;
        position: relative;
        margin: 20px 0;
    }
    .ribbon-divider::before {
        content: "";
        position: absolute;
        top: 50%; left: 0; right: 0; height: 1px;
        background: linear-gradient(to right, transparent, #FFB6C1, transparent);
        z-index: 1;
    }
    .ribbon-divider i {
        background: #FFF0F5; padding: 0 15px; color: #FF69B4; font-size: 1.5rem; position: relative; z-index: 2;
    }
    .hero-banner {
        background: linear-gradient(135deg, #FFE4E1 0%, #FFC0CB 100%);
        border: 2px dashed #FF69B4; border-radius: 30px; padding: 60px 20px; text-align: center; position: relative; overflow: hidden; margin-bottom: 50px; shadow: 0 10px 20px rgba(255, 182, 193, 0.3);
    }
    .hero-banner::after, .hero-banner::before {
        content: '🎀'; position: absolute; font-size: 3rem; opacity: 0.3;
    }
    .hero-banner::after { bottom: 10px; right: 20px; }
    .hero-banner::before { top: 10px; left: 20px; }

    .sanrio-avatar {
        width: 100px; height: 100px; border-radius: 50%; border: 3px solid #FFE4E1; background-color: #fff; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 2.5rem; transition: all 0.3s ease;
    }
    .sanrio-category:hover .sanrio-avatar { transform: scale(1.1) rotate(5deg); border-color: #FF69B4; }
    .sanrio-category a { text-decoration: none; color: #6B4E5B; font-weight: 700; }

    .coquette-card {
        background: #ffffff; border: 1px solid #FFE4E1 !important; border-radius: 20px !important; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .coquette-card:hover {
        transform: translateY(-5px); box-shadow: 0 10px 20px rgba(255, 105, 180, 0.15) !important; border-color: #FFB6C1 !important;
    }
    .coquette-card .card-img-container {
        height: 220px; background-color: #FFF9FA; display: flex; align-items: center; justify-content: center; position: relative;
    }
    .coquette-badge {
        position: absolute; top: 10px; left: 10px; background: #FF69B4; color: #fff; font-size: 0.75rem; padding: 5px 10px; border-radius: 15px; font-weight: bold;
    }
    .coquette-btn {
        background-color: #FFB6C1; color: white; font-weight: bold; border-radius: 20px; border: none; transition: all 0.2s ease;
    }
    .coquette-btn:hover { background-color: #FF69B4; color: white; }
</style>

<div class="container mt-4">
    <div class="hero-banner">
        <h1 class="coquette-title">Sanrio Sweet Boutique 🎀</h1>
        <p class="lead font-weight-bold" style="color: #8B5A6F;">Thế giới mộng mơ của Hello Kitty, My Melody và những người bạn!</p>
        <a href="/webbanhang/Product" class="btn coquette-btn px-4 py-2 mt-3 shadow-sm">
            <i class="fas fa-heart mr-2"></i>Khám Phá Cửa Hàng
        </a>
    </div>

    <div class="ribbon-divider"><i class="fas fa-ribbon"></i></div>
    
    <div class="row text-center mb-5 justify-content-center">
        <div class="col-6 col-sm-3 mb-4 sanrio-category">
            <a href="/webbanhang/Product"><div class="sanrio-avatar">🐱</div><h5>Hello Kitty</h5></a>
        </div>
        <div class="col-6 col-sm-3 mb-4 sanrio-category">
            <a href="/webbanhang/Product"><div class="sanrio-avatar">🐰</div><h5>My Melody</h5></a>
        </div>
        <div class="col-6 col-sm-3 mb-4 sanrio-category">
            <a href="/webbanhang/Product"><div class="sanrio-avatar">😈</div><h5>Kuromi</h5></a>
        </div>
        <div class="col-6 col-sm-3 mb-4 sanrio-category">
            <a href="/webbanhang/Product"><div class="sanrio-avatar">🐶</div><h5>Cinnamoroll</h5></a>
        </div>
    </div>

    <div class="ribbon-divider"><i class="fas fa-ribbon"></i></div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-weight-bold mb-0" style="color: #8B5A6F;"><i class="fas fa-star text-warning mr-2"></i>Sản Phẩm Mới Cập Bến</h3>
        <a href="/webbanhang/Product" class="text-decoration-none font-weight-bold" style="color: #FF69B4;">Xem tất cả <i class="fas fa-angle-right ml-1"></i></a>
    </div>

    <div class="row">
        <?php if (!empty($featuredProducts)): ?>
            <?php foreach ($featuredProducts as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm coquette-card">
                        <div class="card-img-container border-bottom">
                            <span class="coquette-badge">New 🎀</span>
                            <?php if ($product->image): ?>
                                <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product" class="w-100 h-100" style="object-fit: cover;">
                            <?php else: ?>
                                <i class="fas fa-gift fa-3x" style="color: #FFC0CB;"></i>
                            <?php endif; ?>
                        </div>

                        <div class="card-body p-3 d-flex flex-column">
                            <h6 class="font-weight-bold text-truncate mb-2">
                                <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-dark text-decoration-none">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h6>
                            <div class="mt-auto">
                                <span class="h5 font-weight-bold text-danger"><?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</span>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 p-3 pt-0">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="btn btn-block btn-sm coquette-btn py-2">
                                <i class="fas fa-eye mr-2"></i>Xem chi tiết sản phẩm
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>