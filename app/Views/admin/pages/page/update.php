<?php
ob_start();
?>
<div class="tabs shadow-lg mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Sửa thẻ</h5>
            <small>Last updated 3 mins ago</small>
        </div>
        <div class="col-6">
            <div class="text-end">
                <button type="button" class="btn btn-dark"><i class="fa-solid fa-star" style="color: white;"></i></button>
            </div>
        </div>
    </div>
</div>
<main class="main">
    <form action="/pages-update" method="POST">
        <div class="row gx-4">
            <div class="col-8">
                <div class="card p-3 shadow-sm">
                    <input type="hidden" name="id" value="<?= $page['id'] ?? '' ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $page['title'] ?? '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (đường dẫn)</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="<?= $page['slug'] ?? '' ?>" required>
                        <small class="text-muted">Ví dụ: "gioi-thieu", "lien-he"</small>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea name="content" id="content" class="form-control" rows="10"><?= $page['content'] ?? '' ?></textarea>
                    </div>
                    <h6>Thông tin SEO</h6>

                    <div class="mb-3">
                        <label for="seo_title" class="form-label">SEO Title</label>
                        <input type="text" class="form-control" id="seo_title" name="seo_title" value="<?= $page['seo_title'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="seo_description" class="form-label">SEO Description</label>
                        <textarea name="seo_description" id="seo_description" class="form-control" rows="3"><?= $page['seo_description'] ?? '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3 shadow-sm">
                    <div class="mb-3">
                        <label for="hide" class="form-label">Trạng thái</label>
                        <select class="form-control" name="hide" id="hide">
                            <option value="0" <?= (isset($page['hide']) && $page['hide'] == 0) ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="1" <?= (isset($page['hide']) && $page['hide'] == 1) ? 'selected' : '' ?>>Ẩn</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa trang</button>
                </div>
            </div>

            <hr>

        </div>
    </form>

    <!-- Gắn TinyMCE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>


    <script>
        tinymce.init({
            selector: '#content',
            height: 400,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code fullscreen',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code fullscreen',
        });
    </script>

    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>