<?php

/**
 * This is the model class for table "{{tag}}".
 *
 * The followings are the available columns in table '{{tag}}':
 * @property integer $id
 * @property string $title
 * @property integer $frequency
 *
 * The followings are the available model relations:
 * @property Post[] $tblPosts
 */
class Tag extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tag}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('frequency', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, frequency', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'posts' => array(self::MANY_MANY, 'Post', '{{post_tag}}(id_tag, id_post)'),
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
			'frequency' => 'Frequency',
		);
	}

    public static function showTags($id)
    {
        $criteria = new CDbCriteria();
        $criteria->with = 'posts';
        $criteria->condition = 'posts.id='.$id;
        $tags_for_post = Tag::model()->findAll($criteria);


        foreach($tags_for_post as $all){
            echo $all->title;
            echo ' ';
        }
    }

    public static function showMostUseTags(){
        $criteria = new CDbCriteria();
        $criteria->limit = 3;
        //$criteria->condition = 'frequency='
        $criteria->order = 'frequency DESC';

        $tags = Tag::model()->findAll($criteria);

        foreach($tags as $all){
            echo '<li>'.CHtml::link($all->title, Yii::app()->createUrl('post/index', array('tag'=>$all->id))).'</li>';
        }

    }


    public static function commentCounter($id){

        $criteria = new CDbCriteria();
        $criteria->with = 'post';
        $criteria->condition = 'post.id='.$id;
        $count_comments = Comment::model()->count($criteria);

        return  $count_comments;
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
		$criteria->compare('frequency',$this->frequency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
