<?php /** @var array $categories */ ?>
<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* Custom style ngọt ngào cho trang thêm mới sản phẩm */
    .coquette-add-container {
        font-family: 'Quicksand', sans-serif;
        color: #6B4E5B;
    }
    .coquette-card-add {
        background: #ffffff;
        border: 2px dashed #FFB6C1 !important; /* Viền nét đứt ren hồng nhạt */
        border-radius: 24px !important;
    }
    .coquette-header-add {
        background-color: #FFE4E1 !important; /* Hồng phấn Soft Pink đồng bộ */
        border-bottom: 2px dashed #FF69B4;
        color: #FF69B4 !important;
        border-top-left-radius: 22px !important;
        border-top-right-radius: 22px !important;
    }
    .coquette-input-group-text {
        background-color: #FFF0F5 !important;
        color: #FF69B4 !important;
        border-color: #FFE4E1 !important;
    }
    .coquette-form-control {
        border-color: #FFE4E1 !important;
        color: #6B4E5B !important;
    }
    .coquette-form-control:focus {
        border-color: #FF69B4 !important;
        box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.15) !important;
    }
    .coquette-custom-file-label {
        border-color: #FFE4E1 !important;
        color: #8B5A6F !important;
    }
    /* Các nút bấm hành động đậm chất tiểu thư */
    .btn-pink-submit {
        background-color: #FFB6C1 !important;
        border-color: #FFB6C1 !important;
        color: white !important;
        border-radius: 20px;
        font-weight: bold;
        transition: all 0.2s ease;
    }
    .btn-pink-submit:hover {
        background-color: #FF69B4 !important;
        border-color: #FF69B4 !important;
        box-shadow: 0 4px 8px rgba(255, 105, 180, 0.3);
    }
    .btn-back-list {
        border-radius: 20px;
        color: #6B4E5B !important;
        background-color: #ffffff !important;
        border: 1px solid #FFE4E1 !important;
    }
    .btn-back-list:hover {
        background-color: #FFF0F5 !important;
        border-color: #FFB6C1 !important;
    }
</style>

<div class="row justify-content-center coquette-add-container">
    <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm border-0 coquette-card-add my-4">
            
            <div class="card-header coquette-header-add py-3">
                <h4 class="mb-0 font-weight-bold text-center">
                    🎀 Thêm Sản Phẩm Sanrio Mới
                </h4>
            </div>
            
            <div class="card-body p-4">
                
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 15px;">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-exclamation-triangle mr-2 font-weight-bold"></i>
                            <strong>Có lỗi xảy ra, vui lòng kiểm tra lại:</strong>
                        </div>
                        <ul class="mb-0 pl-4">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
                    
                    <div class="form-group mb-3">
                        <label for="name" class="font-weight-bold text-secondary">Tên sản phẩm <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text coquette-input-group-text"><i class="fas fa-shopping-bag"></i></span>
                            </div>
                            <input type="text" id="name" name="name" class="form-control coquette-form-control" placeholder="Nhập tên sản phẩm (Ví dụ: Gấu bông Hello Kitty...)" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="price" class="font-weight-bold text-secondary">Giá bán (VNĐ) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text coquette-input-group-text"><i class="fas fa-heart"></i></span>
                                    </div>
                                    <input type="number" id="price" name="price" class="form-control coquette-form-control" step="0.01" placeholder="0.00" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="category_id" class="font-weight-bold text-secondary">Bộ sưu tập <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text coquette-input-group-text"><i class="fas fa-star"></i></span>
                                    </div>
                                    <select id="category_id" name="category_id" class="form-control coquette-form-control" required>
                                        <option value="" disabled selected>-- Chọn nhân vật Sanrio --</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category->id; ?>">
                                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="font-weight-bold text-secondary">Mô tả sản phẩm <span class="text-danger">*</span></label>
                        <textarea id="description" name="description" class="form-control coquette-form-control" rows="4" placeholder="Nhập thông tin mô tả chi tiết ngọt ngào về sản phẩm..." required></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="image" class="font-weight-bold text-secondary">Hình ảnh minh họa</label>
                        <div class="custom-file">
                            <input type="file" id="image" name="image" class="custom-file-input" onchange="updateFileName(this)">
                            <label class="custom-file-label coquette-custom-file-label" for="image" id="file-label">Chọn tệp hình ảnh...</label>
                        </div>
                        <small class="form-text text-muted"><i class="fas fa-info-circle mr-1"></i>Hỗ trợ các định dạng tệp công chúa: JPG, PNG, GIF, JPEG.</small>
                    </div>

                    <hr class="my-4" style="border-top: 1px dashed #FFB6C1;">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/webbanhang/Product" class="btn btn-back-list px-4 shadow-sm">
                            <i class="fas fa-arrow-left mr-2"></i>Quay lại tiệm
                        </a>
                        <button type="submit" class="btn btn-pink-submit px-4 shadow-sm">
                            <i class="fas fa-save mr-2"></i>Bày bán sản phẩm
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Hàm cập nhật tên tệp tin lên ô input file ngay khi người dùng chọn ảnh xong
function updateFileName(input) {
    var fileName = input.files[0] ? input.files[0].name : "Chọn tệp hình ảnh...";
    document.getElementById("file-label").innerText = fileName;
}
</script>

<?php include 'app/views/shares/footer.php'; ?>