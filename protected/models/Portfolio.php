<?php

/**
 * This is the model class for table "{{portfolio}}".
 *
 * The followings are the available columns in table '{{portfolio}}':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 */
class Portfolio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{portfolio}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, image', 'required'),
			array('title, image', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, image', 'safe', 'on'=>'search'),
		);
	}

    public static function allCategory($id){

        $model = self::model()->findAllByPk($id);

        foreach($model as $all){
            echo $all->title;
            echo '<li>'.CHtml::link($all->title, Yii::app()->createUrl('category/view', array('id'=>$all->id))).'</li>';
        }
    }

    // <a href="/images/portfolio/01.jpg" rel="lightbox[portfolio]"><img src="/images/portfolio/01.jpg" alt="Image 01" class="image_frame"/></a>

    public static function showPortfolio(){
         $all_portfolio =  self::model()->findAll();

        foreach($all_portfolio as $all){
            echo '<div class="col one_fourth gallery_box">';
            echo CHtml::image('/images/portfolio/'.$all->image);
        //    echo CHtml::link('/images/portfolio/01.jpg', array('class' => 'image_frame'));
            echo '<h5>'.$all->title.'</h5>';
            echo '<p>'.$all->description.'</p>';
            echo '</div>';
        }
    }

    public static function showPortfolioImage(){

        $criteria = new CDbCriteria();
        $criteria->limit = 6;
        $criteria->order = 'id DESC';

        $all_portfolio = Portfolio::model()->findAll($criteria);


        //  <a href="#" rel="lightbox"><img class="cloudcarousel" src="/images/slider/01.jpg" alt="CSS Templates 1" title="Website Templates 1" /></a>

        foreach($all_portfolio as $all){
       echo     $image = CHtml::image('/images/portfolio/medium/medium_'.$all->image, '', array('class'=>'cloudcarousel'));
     //   echo   = CHtml::image('/images/portfolio/.'.$all->image,'', array('class'=>'cloudcarousel', 'title'=>'Картиночка'));
//            echo CHtml::link($image, Yii::app()->createUrl('post/view', array('id'=>1)));
        }
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Portfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
