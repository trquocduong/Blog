<?php

class Controller {
   public function view($view) {
        require __DIR__ . '/../app/Views/' . $view . '.php';
    }
    public function model($model) {
        require_once "../app/Models/{$model}.php";
        return new $model;
    }
}
