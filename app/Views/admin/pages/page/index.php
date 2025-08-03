<?php
ob_start();
// session_start();
include __DIR__ . '/../../partials/toast.php';
?>

<div class="tabs shadow-sm mb-3 p-3">
    <div class="row">
        <div class="col-6">
            <h5><i class="bi bi-tags-fill me-2"></i>Trang</h5>
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
    <div class="row">
        <div class="col-3 card">
            <ol class="list-group mt-3">
                <a href="/tags" class="text-decoration-none text-dark">
                    <li class="list-group-item d-flex justify-content-between align-items-start <?= !isset($_GET['hide']) ?>">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Tất cả trang</div>
                            <small>Last updated 3 mins ago</small>
                        </div>
                        <span class="badge text-bg-primary rounded-pill"></span>
                        <!-- <?= $total ?> -->
                    </li>
                </a>

                <a href="/tags?hide=0" class="text-decoration-none text-dark">
                    <li class="list-group-item d-flex justify-content-between align-items-start <?= (isset($_GET['hide']) && $_GET['hide'] == 0)  ?>">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Trang khả dụng</div>
                            <small>Last updated 3 mins ago</small>
                        </div>
                        <span class="badge text-bg-primary rounded-pill"></span>
                        <!-- <?= $totalVisible ?> -->
                    </li>
                </a>

                <a href="/tags?hide=1" class="text-decoration-none text-dark">
                    <li class="list-group-item d-flex justify-content-between align-items-start <?= (isset($_GET['hide']) && $_GET['hide'] == 1) ?>">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Trang bị đóng</div>
                            <small>Last updated 3 mins ago</small>
                        </div>
                        <span class="badge text-bg-primary rounded-pill"></span>
                        <!-- <?= $totalHidden ?> -->
                    </li>
                </a>
            </ol>

        </div>
        <div class="mx-4 col-8 card">
            <div class="card-body">
                <strong class="">Danh sách trang
                </strong>
                <div class="row mt-3">
                    <div class="col-6">
                        <form class="d-flex" action="/pages-search" method="POST">
                            <input class="form-control me-2" type="search" name="search"
                                placeholder="Tìm kiếm tài khoản ?" aria-label="Search"
                                value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>">
                            <button class="btn btn-outline-success" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/create-page"><button type="button" class="btn btn-success mb-2">Thêm trang !</button>
                    </div></a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Slug</th>
                            <th>Ngày Tạo</th>
                            <th>Cập Nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($pages as $item) : ?>
                        <tbody>
                            <td><?= $i++ ?></td>
                            <td><a href="/pages-detail?slug=<?= $item['slug'] ?>" class="nav-link"><?= $item['title'] ?></a></td>
                            <td> <a href="/<?= $item['slug'] ?>" target="_blank"><?= $item['slug'] ?></a></td>
                            <td><?= $item['created_at'] ?></td>
                            <td><?= $item['updated_at'] ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/pages-edit?id=<?= $item['id'] ?>" class="nav-link text-center">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="/pages-delete?id=<?= $item['id'] ?>" class="nav-link text-center">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>


                        </tbody>
                    <?php endforeach; ?>

                </table>
                <div class="d-flex justify-content-end mt-4">
                    <nav aria-label="Page navigation">
                        <!-- <ul class="pagination pagination-sm">
                      @if ($users->onFirstPage())
                          <li class="page-item disabled">
                              <span class="page-link"><i class="fa-solid fa-arrow-left"></i></span>
                          </li>
                      @else
                          <li class="page-item">
                              <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous"><i class="fa-solid fa-arrow-left"></i></a>
                          </li>
                      @endif
                      @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                          <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                          </li>
                      @endforeach
                      @if ($users->hasMorePages())
                          <li class="page-item">
                              <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next"><i class="fa-solid fa-arrow-right"></i></a>
                          </li>
                      @else
                          <li class="page-item disabled">
                              <span class="page-link"><i class="fa-solid fa-arrow-right"></i></span>
                          </li>
                      @endif
                  </ul> -->
                    </nav>
                </div>

            </div>
        </div>
    </div>
</main>
<?php
$admin = ob_get_clean();
include __DIR__ . '/../../main.php';
?>