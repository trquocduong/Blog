<?php

Class PostController extends Controller{
    public function detail(){
        $this->view('client/post/post_detail');
    }

    public function profile(){
        $this->view('client/profile/profile');
    }

    public function profile_post(){
        $this->view('client/profile/profile_post');
    }
}
?>