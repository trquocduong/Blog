<?php 
$title="Trang chi tiết";
ob_start();
?>
<div class="herf mb-3 text-secondary">
  <a href="/" class="nav-link d-inline">Trang chủ /</a>
  <a href="#" class="nav-link d-inline">Slug</a>
</div>

<div class="bg-light p-2">
    <div class="bg-card p-3 mt-3">
    <div class="row">
        <div class="col-8">
            <div class="card shadow-sm" style="background-color:white;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card p-2 m-5">
                    Chia sẽ :
                </div>
                <div class="post p-2">
                    <h5>Bài viết liên quan</h5>
                </div>
                <div class="row m-2">
                    <div class="col-4 animate__animated animate__fadeInUp animate__delay-3s">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                        </div>
                    <div class="col-4 animate__animated animate__fadeInUp animate__delay-4s">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                        </div>
                    <div class="col-4 animate__animated animate__fadeInUp animate__delay-5s">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                        </div>
                </div>
                </div>
 
        </div>
       

        <div class="col-4 animate__animated animate__fadeInDown">
            <div class="card shadow-lg" style="background-color:white;">
           
               
                    <div class="row g-0 animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                   

                    
                    <div class="row g-0 animate__animated animate__fadeInUp animate__delay-2s">
                        <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
             
        </div>
    </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../main/main.php'; 
?>