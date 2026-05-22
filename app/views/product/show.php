<?php /** @var object $product */ ?>
<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* Custom CSS cục bộ cho trang Show theo vibe kẹo ngọt */
    .coquette-body {
        font-family: 'Quicksand', sans-serif;
        color: #6B4E5B;
    }
    .coquette-title-detail {
        font-family: 'Quicksand', sans-serif;
        font-weight: 700;
        color: #8B5A6F;
    }
    .coquette-card-detail {
        background: #ffffff;
        border: 2px dashed #FFB6C1 !important; /* Viền ren hồng nhạt */
        border-radius: 24px !important;
    }
    .coquette-price-box {
        background-color: #FFF0F5 !important; /* Nền thạch sữa hồng */
        border-left: 4px solid #FF69B4 !important; /* Vạch hồng đậm */
        border-radius: 12px;
    }
    .coquette-badge-cat {
        background-color: #FFB6C1 !important;
        color: #fff !important;
        border-radius: 15px;
    }
    .btn-pink-coquette {
        background-color: #FFB6C1 !important;
        border-color: #FFB6C1 !important;
        color: white !important;
        border-radius: 20px;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .btn-pink-coquette:hover {
        background-color: #FF69B4 !important;
        border-color: #FF69B4 !important;
        box-shadow: 0 4px 10px rgba(255, 105, 180, 0.2);
    }
    .btn-back-coquette {
        border-radius: 20px;
        color: #6B4E5B !important;
        background-color: #ffffff !important;
        border: 1px solid #FFE4E1 !important;
    }
    .btn-back-coquette:hover {
        background-color: #FFF0F5 !important;
        border-color: #FFB6C1 !important;
    }
</style>

<div class="row justify-content-center coquette-body">
    <div class="col-lg-10">
        
        <div class="mb-3">
            <a href="/webbanhang/Product" class="btn btn-back-coquette btn-sm shadow-sm px-3">
                <i class="fas fa-heart text-danger mr-2"></i>Quay lại danh sách
            </a>
        </div>

        <div class="card shadow-sm coquette-card-detail overflow-hidden my-3">
            <div class="card-body p-4 p-md-5">
                <div class="row">
                    
                    <div class="col-md-6 mb-4 mb-md-0 d-flex align-items-center justify-content-center bg-light rounded p-3" style="min-height: 350px; background-color: #FFF9FA !important; border: 1px solid #FFE4E1;">
                        <?php if ($product->image): ?>
                            <img src="/webbanhang/<?php echo $product->image; ?>" 
                                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                                 class="img-fluid rounded shadow-sm custom-product-img">
                        <?php else: ?>
                            <div class="text-center text-muted py-5">
                                <i class="fas fa-gift fa-4x mb-3" style="color: #FFC0CB;"></i>
                                <p class="mb-0 font-weight-bold text-uppercase" style="color: #BDB76B;">Sản phẩm chưa có hình ảnh</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 d-flex flex-column justify-content-between pl-md-4">
                        <div>
                            <h2 class="coquette-title-detail mb-3">
                                🎀 <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </h2>

                            <?php if (isset($product->category_name)): ?>
                                <div class="mb-4">
                                    <span class="badge coquette-badge-cat px-3 py-2 font-weight-normal shadow-sm">
                                        <i class="fas fa-star mr-1"></i> Bộ sưu tập: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <hr class="my-3" style="border-top: 1px dashed #FFB6C1;">

                            <div class="p-3 coquette-price-box mb-4 shadow-sm">
                                <span class="small d-block text-uppercase font-weight-bold" style="color: #8B5A6F;">Giá ngọt ngào:</span>
                                <h3 class="font-weight-bold mb-0 mt-1" style="color: #FF69B4;">
                                    <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> 
                                    <span class="h5 font-weight-bold mb-0">VND</span>
                                </h3>
                            </div>

                            <div class="mb-4">
                                <h5 class="font-weight-bold mb-2" style="color: #8B5A6F;">
                                    <i class="fas fa-feather-alt mr-2" style="color: #FF69B4;"></i>Mô tả chi tiết:
                                </h5>
                                <p class="card-text text-muted" style="white-space: pre-line; line-height: 1.6;">
                                    <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                            </div>
                        </div>

                        <div class="border-top pt-4 mt-3 d-flex flex-wrap" style="border-top: 1px dashed #FFB6C1 !important;">
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-pink-coquette px-4 font-weight-bold shadow-sm text-dark mr-2 mb-2" style="border-radius: 20px;">
                                <i class="fas fa-magic mr-2"></i>Chỉnh sửa sản phẩm
                            </a>
                            <a href="/webbanhang/Product" class="btn btn-pink-coquette px-4 mb-2 shadow-sm">
                                <i class="fas fa-ribbon mr-2"></i>Trở lại cửa hàng
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
.custom-product-img {
    max-height: 400px;
    width: auto;
    object-fit: contain;
    transition: transform 0.3s ease;
}
.custom-product-img:hover {
    transform: scale(1.03);
}
</style>

<?php include 'app/views/shares/footer.php'; ?>