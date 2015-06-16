<?php

class PostController extends Controller
{


    public $layout='//layouts/main';

	public function actionIndex($tag = false)
	{


        if($tag)
        {
           $criteria = new CDbCriteria();

           $criteria->with = array('tags');
           $criteria->together = true;
           $criteria->condition= 'tags.id='.$tag;

           $count = Post::model()->count($criteria);
           $pages= new CPagination($count);
           $pages->pageSize = 3;
           $pages->applyLimit($criteria);

            $posts = Post::model()->findAll($criteria);



            $this->render('index', array('posts'=>$posts, 'pages'=>$pages));
        }
        else {

            $criteria = new CDbCriteria();
            $criteria->order = 'create_time DESC';
            $count=Post::model()->count();
            $pages=new CPagination($count);
            $pages->pageSize = 3;
            $pages->applyLimit($criteria);
            $posts = Post::model()->findAll($criteria);



            $this->render('index', array('posts'=>$posts, 'pages'=>$pages));

        }


	}

    public function actionView($id){

        $current_post = Post::model()->find('id='.$id);


        $criteria = new CDbCriteria();
        $criteria->with = array('post', array('order'=>'t.create_time, post.create_time'));
        $criteria->order = 't.create_time DESC';
        $criteria->condition = 't.post_id='.$id;


        $model = new Comment();


        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Comment']))
        {
            $model->attributes=$_POST['Comment'];
            $model->post_id = $id;
            $model->create_time=date('Y-m-d H:i:s');
            $model->update_time=date('Y-m-d H:i:s');
            if($model->save()){
                $model->unsetAttributes();
            }

        }
        $count = Comment::model()->count($criteria);

        $pages= new CPagination($count);
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $comments = Comment::model()->findAll($criteria);


        $this->render('view', array(
           'current_post'=>$current_post,
            'model'=>$model,
            'comments'=>$comments,
            'pages'=>$pages
        ));
    }

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}