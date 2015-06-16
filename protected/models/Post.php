<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property string $author
 * @property string $title
 * @property string $text
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Category[] $tblCategories
 * @property Tag[] $tblTags
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, title, text, create_time', 'required'),
			array('author, title', 'length', 'max'=>255),
            array('author, title', 'length', 'min'=>3),
			array('update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, author, title, text, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}



    public static function showPosts(){

        $criteria = new CDbCriteria();
        $criteria->limit = 5;
        $criteria->order = 'create_time DESC';


        $posts = Post::model()->findAll($criteria);

        foreach($posts as $all){
            echo '<li>'.CHtml::link($all->title, Yii::app()->createUrl('post/view', array('id'=>$all->id)));
            echo $all->text.'</li>';
        }

    }


    public static function showPostsForIndex(){

        $criteria = new CDbCriteria();
        $criteria->limit = 3;
        $criteria->order = 'create_time DESC';

        $posts = Post::model()->findAll($criteria);

        foreach($posts as $all){
            echo '<div class="rp_pp">';
            echo CHtml::image('/images/puppy.jpg');
            echo CHtml::link($all->title, Yii::app()->createUrl('post/view', array('id'=>$all->id)));
            echo '<p>'.$all->create_time;
            echo ' - ';
            echo Comment::commentCounter($all->id);
            echo '</p>';
            echo '<div class="cleaner"></div>';
            echo '</div>';

        }

    }

    public static function showMostCommentPosts(){

        $criteria = new CDbCriteria();
        $criteria->select = 't.title, t.text, count(comments.id) as countComments';
        $criteria->with = array('comments');
        $criteria->together = true;
        $criteria->group = 't.id';
        $criteria->order = "countComments DESC";
        $criteria->limit = 5;

        $posts = Post::model()->findAll($criteria);


        foreach($posts as $all){
            echo '<li>'.CHtml::link($all->title, Yii::app()->createUrl('post/view', array('id'=>$all->id)));
            echo $all->text.'</li>';
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
			'comments' => array(self::HAS_MANY, 'Comment', 'post_id'),
			'tblCategories' => array(self::MANY_MANY, 'Category', '{{post_category}}(id_post, id_category)'),
			'tags' => array(self::MANY_MANY, 'Tag', '{{post_tag}}(id_post, id_tag)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'author' => 'Author',
			'title' => 'Title',
			'text' => 'Text',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
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
		$criteria->compare('author',$this->author,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
