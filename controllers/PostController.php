<?php


namespace app\controllers;

use app\models\Category;
use Yii;
use app\models\TestForm;

class PostController extends AppController
{

    public $layout = 'basic';



    public function beforeAction($action)
    {
        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            debug(Yii::$app->request->post());
            return 'test';
        }
//
//        $post = TestForm::findOne(2);
//        $post->email = '22@2.com';
//        $post->save();
//        $post->delete();
        TestForm::deleteAll(['>', 'id', 3]);
        $model = new TestForm();


//        $model->name = 'Автор';
////        $model->email = 'mail@mail.com';
////        $model->text = 'Текст сообщения';
//        $model->save();


//        $model->email = '111';
//$model->text = 'Текст сообщения';
//$model->save();


        if( $model->load(Yii::$app->request->post()) ){
//            debug($model);
//            die;
                if( $model->save() ){
                    Yii::$app->session->setFlash('success', 'Данные приняты');
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка');
                }
            }

        $this->view->title = 'Все статьи';
        return $this->render('test', compact('model'));
    }

        public function actionShow()
    {
//        $this->layout = 'basic';
        $this->view->title = 'Одна статья!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);


//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
//        $cats = Category::find()->asArray()->all();
//          $cats = Category::find()->asArray()->where(['parent' => 691])->all();
//        $cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all();
//        $cats = Category::find()->asArray()->where(['<=', 'id', 695])->all();
//        $cats = Category::find()->asArray()->where('parent=691')->limit(1)->one();
//        $cats = Category::find()->asArray()->where('parent=691')->count();

//        $cats = Category::findOne(['parent' => 691]);
//        $cats = Category::findAll(['parent' => 691]);
//        $query = "SELECT * FROM categories WHERE title LIKE '%pp%'";

//        $cats = Category::findBySql($query)->all();

//          $cats = Category::findOne(694);
            // $cats = Category::find()->all(); // отложенная загрузка
//            $cats = Category::find()->with('products')->where('id = 694')->all(); // жадная загрузка
            $cats = Category::find()->with('products')->all(); // жадная загрузка

            return $this->render('show', compact('cats'));
    }

}