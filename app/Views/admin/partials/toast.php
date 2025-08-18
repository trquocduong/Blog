<!-- Toast Thành Công -->
<?php if (isset($_SESSION['toast'])): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div id="toast-success" class="toast align-items-center text-bg-success border-0 show" role="alert" data-bs-delay="2000" data-bs-autohide="true">
            <div class="d-flex">
                <div class="toast-body"><?= htmlspecialchars($_SESSION['toast']) ?></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['toast']); ?>
<?php endif; ?>

<!-- Toast Lỗi -->
<?php if (isset($_SESSION['toast_error'])): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div id="toast-error" class="toast align-items-center text-bg-danger border-0 show" role="alert" data-bs-delay="2000" data-bs-autohide="true">
            <div class="d-flex">
                <div class="toast-body"><?= htmlspecialchars($_SESSION['toast_error']) ?></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['toast_error']); ?>
<?php endif; ?>

<script>
    setTimeout(() => {
        document.querySelectorAll('.toast').forEach(toast => toast.classList.remove('show'));
    }, 2000);
</script>