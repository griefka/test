<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property integer $post_id
 * @property string $author
 * @property string $text
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Post $post
 */
class Comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, text, email', 'required'),
			array('author', 'length', 'max'=>255),
            array('author', 'length', 'min'=>3),
            array('email','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, post_id, author, email, text, create_time, update_time', 'safe', 'on'=>'search'),
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
			'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}


    public static function commentCounter($id){

        $criteria = new CDbCriteria();
        $criteria->with = 'post';
        $criteria->condition = 'post.id='.$id;
        $count_comments = Comment::model()->count($criteria);

        return  $count_comments;
    }

    public static function showComments($id){

        $criteria = new CDbCriteria();
        $criteria->with = array('post', array('order'=>'t.create_time, post.create_time'));
        $criteria->order = 't.create_time DESC';
        $criteria->condition = 't.post_id='.$id;

        $comments = Comment::model()->findAll($criteria);






        //РАБОТАЕТ
//
//        $comments = Comment::model()->with('post')->findAll((array(
//            'order'=>'t.create_time, post.create_time',
//            'condition'=> 't.post_id=1'
//        )));

        foreach($comments as $all){

            echo '<ol class="comments first_level">';
           echo '<li>';
            echo ' <div class="comment_box commentbox1">';
            echo '<div class="comment_text">';
            echo '<div class="comment_author">'.$all->author.'<span class="date">'.$all->create_time.'</span></div>';
            echo '<p>'.$all->text.'</p>';
            echo '</div>';
            echo '    <div class="cleaner"></div>';
            echo '</div>';
            echo '</li>';
            echo '</ol>';

        }

    }

//    public function beforeSave(){
//
//        if(parent::beforeSave())
//        {
//            if($this->isNewRecord)
//            {
//                $this->create_time=$this->update_time=date('Y-m-d H:m:s', time());
//            }
//            else
//                //  $this->update_time=time();
//                $this->update_time= date('Y-m-d H:m:s', time());
//            return true;
//        }
//        else
//            return false;
//    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'post_id' => 'Post',
			'author' => 'Имя',
			'text' => 'Текст',
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
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('author',$this->author,true);
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
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
