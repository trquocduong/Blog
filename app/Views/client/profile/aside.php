     <div class="col-4">

         <ol class="list-group">
             <button type="button" class="list-group-item list-group-item-action text-light text-bold" aria-current="true" style="background-color: var(--main-color)">
                 Thông tin của bạn !
             </button>
             <li class="list-group-item d-flex justify-content-between align-items-start">
                 <div class="ms-2 me-auto text-center">
                     <div class="fw-bold"> <a href="/profile?id=<?= $_SESSION['user']['id'] ?>" class="nav-link text-center"><i class="fa-solid fa-user"></i> Tài khoản.</a></div>
                 </div>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-start">
                 <div class="ms-3 me-auto">
                     <div class="fw-bold"> <a href="/profile_post" class="nav-link">Bài viết của bạn</a></div>
                     Content for list item
                 </div>
                 <span class="badge rounded-pill" style="background-color: var(--main-color)">14</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-start">
                 <div class="ms-3 me-auto">
                     <div class="fw-bold">Bài viết yêu thích.</div>
                     Content for list item
                 </div>
                 <span class="badge rounded-pill" style="background-color: var(--main-color)">14</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-start">
                 <div class="ms-3 me-auto">
                     <div class="fw-bold"><a href="/forget_password?id=<?= $_SESSION['user']['id'] ?>" class="nav-link">Đổi mật khẩu.</a></div>
                 </div>
             </li>
             <button type="button" class="list-group-item list-group-item-action text-danger"><a href="/logout" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></button>
         </ol>

     </div>