<?php
$title = "Trang chi tiết";
ob_start();
?>

<body class="container py-4">
    <div class="tabs shadow-sm mb-3 p-3">
        <div class="row">
            <div class="col-6">
                <h2>✍️ Đăng bài viết mới</h2>
                <small>Cập nhật 3 ngày gần nhất</small>
            </div>
            <div class="col-6">
                <div class="text-end">
                    <button type="button" class="btn btn-dark"><i class="fa-solid fa-star" style="color: white;"></i></button>
                </div>
            </div>
        </div>
    </div>

    <form action="/post/store" method="POST">
        <div class="mb-3">
            <label>Nội dung</label>
            <textarea id="editor"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu bài viết</button>
    </form>

    <hr>


    <h4>Xem trước nội dung</h4>
    <div id="previewContent" class="border p-3"></div>
</body>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script src="/public/ckfinder/ckfinder.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
                openerMethod: 'modal',
            },
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'insertTable', 'blockQuote', 'mediaEmbed', '|',
                    'undo', 'redo', '|',
                    'insertImage',
                    'ckfinder'
                ]
            }
        })
        .then(editor => {
            console.log('CKEditor5 with CKFinder is ready!', editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../main/main.php';
?>