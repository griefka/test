<?php

class PortfolioController extends Controller
{

    public $layout='//layouts/main';

	public function actionIndex()
	{



        $criteria = new CDbCriteria();

        $count=Portfolio::model()->count($criteria);

        $pages=new CPagination($count);

        $pages->pageSize = 8;
        $pages->applyLimit($criteria);

        $all_portfolio =  Portfolio::model()->findAll($criteria);


//        $models = Portfolio::model()->findAll($criteria);


		$this->render('index', array(
            'all_portfolio'=>$all_portfolio,
//            'models' => $models,
            'pages' => $pages
        ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}