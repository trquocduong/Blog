<?php
$title = "Trang chi tiết";
ob_start();
?>

<body class="container py-4">
    <div class="tabs shadow-sm mb-3 p-3">
        <div class="row">
            <div class="col-6">
                <h2>✍️ Đăng bài viết mới</h2>
            </div>
            <div class="col-6">
                <div class="text-end">
                    <button type="button" class="btn btn-dark"><i class="fa-solid fa-star"
                            style="color: white;"></i></button>
                </div>
            </div>
        </div>
    </div>

    <form action="/post/store" method="POST">
        <div class="row">
            <div class="col-6 shadow-sm mb-3 p-3 ms-0">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Mô tả ngắn</label>
                    <input type="text" class="form-control" name="description" id="description" aria-describedby=""
                        style="height:100px">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nội dung</label>
                    <textarea id="editor"></textarea>
                </div>
            </div>
            <div class="col-6 shadow-sm mb-3 p-3">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Ảnh đại diện</label>
                    <input type="file" class="form-control" name="title" id="title" aria-describedby="">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Danh mục</label>
                            <input type="category_id" class="form-control" name="title" id="title" aria-describedby="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Thẻ</label>
                            <input type="tabs" class="form-control" name="title" id="title" aria-describedby="">
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Meta Description</label>
                    <input type="text" class="form-control" name="description" id="description" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Meta KeyWord</label>
                    <input type="text" class="form-control" name="description" id="description" aria-describedby="">
                </div>
                <hr>
                <div class="mb-3">
                    <h4>Xem trước nội dung</h4>
                    <div id="previewContent" class="border p-3"></div>
                </div>


            </div>
        </div>
        <button type="submit" class="btn btn-primary p-2">Đăng bài</button>
        <button type="submit" class="btn btn-primary p-2">Lưu vào nháp</button>
    </form>

    <hr>
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