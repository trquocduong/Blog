<?php
ob_start();
?>
<div class="tabs shadow-lg mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Thêm trang !</h5>
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
    <form action="/upload_file" method="POST" enctype="multipart/form-data">
        <div class="row gx-4">
            <div class="col-8">
                <div class="card p-3 shadow-sm mb-3">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Chọn file:</label>
                        <input type="file" name="media[]" class="form-control" multiple required onchange="previewFiles(event)">
                        <small class="text-muted">Có thể chọn nhiều file. Hỗ trợ: JPG, PNG, GIF, PDF...</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Alt Text (SEO cho ảnh):</label>
                        <input type="text" name="alt_text" class="form-control" placeholder="Mô tả hình ảnh (SEO)">
                        <small class="text-muted">Dùng từ khóa chính, mô tả nội dung ảnh.</small>
                    </div>

                    <div class="mb-3" id="preview-area" style="display:flex; gap:10px; flex-wrap:wrap;"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3 shadow-sm">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>

            <hr>

        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>


    <script>
        function previewFiles(event) {
            let preview = document.getElementById('preview-area');
            preview.innerHTML = '';
            let files = event.target.files;

            for (let i = 0; i < files.length; i++) {
                if (files[i].type.startsWith('image/')) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '150px';
                        img.style.border = '1px solid #ccc';
                        img.style.padding = '4px';
                        img.style.borderRadius = '6px';
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(files[i]);
                } else {
                    let div = document.createElement('div');
                    div.textContent = files[i].name;
                    div.style.border = '1px solid #ccc';
                    div.style.padding = '6px';
                    div.style.borderRadius = '6px';
                    div.style.background = '#f8f9fa';
                    preview.appendChild(div);
                }
            }
        }
    </script>

    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>