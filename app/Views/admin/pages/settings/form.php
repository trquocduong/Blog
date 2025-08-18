<?php
ob_start();
include __DIR__ . '/../../partials/toast.php';
?>

<!-- CodeMirror CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material.min.css">

<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0"><i class="bi bi-gear-fill me-2"></i> Cài đặt website</h5>
            <small class="text-muted">Cập nhật lần cuối: 3 phút trước</small>
        </div>
        <button type="button" class="btn btn-dark">
            <i class="fa-solid fa-star"></i>
        </button>
    </div>
</div>
<main class="card shadow-sm">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="/save">

            <!-- Thông tin chung -->
            <div class="row">
                <div class="col-6">
                    <h5 class="border-bottom pb-2 mb-3">Thông tin chung</h5>
                    <div class="mb-3">
                        <label class="form-label">Tên website:</label>
                        <input type="text" class="form-control" name="site_name" value="<?= htmlspecialchars($settings['site_name'] ?? '') ?>">
                    </div>
                    <!-- Logo & Favicon -->
                    <h5 class="border-bottom pb-2 mb-3">Logo & Favicon</h5>
                    <!-- <div class="mb-3">
                        <label class="form-label">Logo:</label>
                        <input type="file" class="form-control" name="logo">
                        <?php if (!empty($settings['logo'])): ?>
                            <img src="public/<?= $settings['logo'] ?>" class="mt-2 img-thumbnail" style="max-height:50px;">
                        <?php endif; ?>
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Favicon:</label>
                        <input type="file" class="form-control" name="favicon">
                        <?php if (!empty($settings['favicon'])): ?>
                            <img src="public/<?= $settings['favicon'] ?>" class="mt-2 img-thumbnail" style="max-height:50px;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-6">
                    <!-- SEO -->
                    <h5 class="border-bottom pb-2 mb-3">SEO</h5>
                    <div class="mb-3">
                        <label class="form-label">Meta Title:</label>
                        <input type="text" class="form-control" name="meta_title" value="<?= htmlspecialchars($settings['meta_title'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description:</label>
                        <textarea class="form-control" rows="2" name="meta_description"><?= htmlspecialchars($settings['meta_description'] ?? '') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords:</label>
                        <input type="text" class="form-control" name="meta_keywords" value="<?= htmlspecialchars($settings['meta_keywords'] ?? '') ?>">
                    </div>
                </div>
            </div>


            <!-- Script ngoài -->
            <h5 class="border-bottom pb-2 mb-3">Script ngoài</h5>
            <div class="mb-3">
                <label class="form-label">Google Analytics:</label>
                <textarea id="google_analytics" class="form-control code-editor" name="google_analytics"><?= htmlspecialchars($settings['google_analytics'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Chatbot Script:</label>
                <textarea id="chatbot_script" class="form-control code-editor" name="chatbot_script"><?= htmlspecialchars($settings['chatbot_script'] ?? '') ?></textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Lưu</button>
            </div>
        </form>
    </div>
</main>

<!-- CodeMirror JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/htmlmixed/htmlmixed.min.js"></script>

<script>
    document.querySelectorAll('.code-editor').forEach(function(el) {
        CodeMirror.fromTextArea(el, {
            lineNumbers: true,
            mode: "htmlmixed",
            theme: "material"
        });
    });
</script>

<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>