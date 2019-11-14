<?php


namespace app\controllers;



class MyController extends AppController
{
//    public function actionIndex($id = null){
//        $hi = 'Hello, World!';
//        $names = ['Ivanov', 'Petrov', 'Sidorov'];
//
//        if(!$id) $id = 'test';
//
////        return $this->render('index', ['hello' => $hi, 'names' => $names]);
//        return $this->render('index', compact('hi', 'names', 'id'));
//    }

    public function actionIndex($id = null){
//        return $this->render("index");
        $hi = 'Hello, Php Programmist!';
        $names = ['Ivanov Programmistovich', 'Petrov Programmistovich', 'Sidorov Programmistovich'];

//        return $this->render('index', ['hello' => $hi, 'names' => $names]);
//        return $this->render('index', ['hello' => $hi]);

//
        if(!$id) $id = 'test';
//
//        return $this->render('index', ['hello' => $hi, 'names' => $names]);
        return $this->render('index', compact('hi', 'names', 'id'));
    }


    public function actionBlogPost(){
        // my/blog-post
        return 'Blog Post Php Programmist';
    }


}