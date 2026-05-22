<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* Tổng thể style Coquette ngọt ngào */
    .coquette-container {
        font-family: 'Quicksand', sans-serif;
        color: #6B4E5B;
    }
    .coquette-title-list {
        font-weight: 700;
        color: #8B5A6F;
    }
    .coquette-card-item {
        background: #ffffff;
        border: 1px solid #FFE4E1 !important;
        border-radius: 20px !important;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .coquette-card-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 105, 180, 0.15) !important;
        border-color: #FFB6C1 !important;
    }
    .coquette-img-wrapper {
        height: 200px;
        background-color: #FFF9FA; /* Nền thạch sữa hồng nhẹ cho ảnh */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .coquette-tag-badge {
        color: #FF69B4 !important;
        background-color: #FFF0F5 !important;
        border: 1px solid #FFE4E1 !important;
        border-radius: 15px;
    }
    .text-coquette-hover:hover {
        color: #FF69B4 !important;
        text-decoration: none;
    }
    /* Làm điệu lại các nút bấm hành động */
    .btn-pink-add {
        background-color: #FFB6C1 !important;
        border-color: #FFB6C1 !important;
        color: white !important;
        border-radius: 20px;
        transition: all 0.2s ease;
    }
    .btn-pink-add:hover {
        background-color: #FF69B4 !important;
        border-color: #FF69B4 !important;
        box-shadow: 0 4px 8px rgba(255, 105, 180, 0.3);
    }
    .btn-outline-coquette-warning {
        border: 1px solid #FFB6C1 !important;
        color: #6B4E5B !important;
        background-color: #ffffff;
        border-radius: 15px;
    }
    .btn-outline-coquette-warning:hover {
        background-color: #FFF0F5;
        color: #FF69B4 !important;
        border-color: #FF69B4 !important;
    }
    .btn-outline-coquette-danger {
        border: 1px solid #FFE4E1 !important;
        color: #bbb;
        background-color: #ffffff;
        border-radius: 15px;
    }
    .btn-outline-coquette-danger:hover {
        background-color: #FFF5F5;
        color: #dc3545 !important;
        border-color: #dc3545 !important;
    }
</style>

<div class="coquette-container">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2" style="border-bottom: 2px dashed #FFB6C1 !important;">
        <h2 class="font-weight-bold coquette-title-list mb-0">
            🎀 Danh Sách Sản Phẩm Sanrio
        </h2>
        <a href="/webbanhang/Product/add" class="btn btn-pink-add font-weight-bold shadow-sm px-3">
            <i class="fas fa-plus mr-2"></i>Thêm sản phẩm mới
        </a>
    </div>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 coquette-card-item">
                        
                        <div class="coquette-img-wrapper border-bottom">
                            <?php if ($product->image): ?>
                                <img src="/webbanhang/<?php echo $product->image; ?>" 
                                     alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                                     class="w-100 h-100" 
                                     style="object-fit: cover;">
                            <?php else: ?>
                                <div class="text-center text-muted">
                                    <i class="fas fa-gift fa-3x mb-2" style="color: #FFC0CB;"></i>
                                    <small class="d-block text-uppercase font-weight-bold" style="color: #6B4E5B;">Sanrio Gift</small>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body p-3 d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge badge-pill coquette-tag-badge px-2 py-1">
                                    <i class="fas fa-heart mr-1"></i>
                                    <?php echo htmlspecialchars($product->category_name ?? 'Chưa phân loại', ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </div>

                            <h5 class="card-title font-weight-bold text-truncate mb-2" title="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                                <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-dark text-decoration-none text-coquette-hover">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>

                            <p class="card-text text-muted small text-truncate mb-3" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; white-space: normal;">
                                <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                            </p>

                            <div class="mt-auto">
                                <span class="small text-muted d-block">Giá ngọt ngào:</span>
                                <span class="h5 font-weight-bold mb-0" style="color: #FF69B4;">
                                <?php echo number_format($product->price, 0, ',', '.'); ?> <small class="font-weight-bold">VND</small>
                                </span>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top p-2 d-flex justify-content-between" style="border-top: 1px dashed #FFE4E1 !important;">
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-coquette-warning flex-grow-1 mr-1 font-weight-bold">
                                <i class="fas fa-magic mr-1"></i>Sửa
                            </a>
                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-sm btn-outline-coquette-danger flex-grow-1 ml-1 font-weight-bold" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi tiệm không? 🎀');">
                                <i class="fas fa-trash-alt mr-1"></i>Xóa
                            </a>
                        </div>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 my-5 text-center text-muted">
                <i class="fas fa-ribbon fa-4x mb-3" style="color: #FFC0CB;"></i>
                <h4 class="font-weight-bold" style="color: #8B5A6F;">Tiệm hiện chưa bày bán sản phẩm nào!</h4>
                <p>Vui lòng bấm nút "Thêm sản phẩm mới" ở trên để bắt đầu trang trí tiệm nhé.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>