<?php

/**
 * This is the model class for table "{{recall}}".
 *
 * The followings are the available columns in table '{{recall}}':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 */
class Recall extends CActiveRecord
{


    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            $this->name = htmlentities($this->name,ENT_QUOTES, 'UTF-8');
            $this->subject = htmlentities($this->subject,ENT_QUOTES, 'UTF-8');
            $this->message = htmlentities($this->message,ENT_QUOTES, 'UTF-8');
            return true;
        }
        else
            return false;
    }

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{recall}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, subject, message', 'required'),
			array('name, email, subject', 'length', 'max'=>255),
            array('name, subject, message', 'length', 'min'=>'5', 'message'=>'Поле должно содержать минимум 4 символов'),
            array('email', 'email'),
            array('name', 'match', 'pattern'=>'/^([А-Яа-яA-Za-z ]+)$/u', 'message'=>'Недопустимый формат ввода. Вводите только буквы'),
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, subject, message', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'email' => 'E-mail',
			'subject' => 'Должность',
			'message' => 'Сообщение',
		);
	}

    public static function showRecall(){

        $criteria = new CDbCriteria();
        $criteria->limit = 3;
        $criteria->condition = 'status=1';
        $criteria->order = 'id DESC';

        $recalls = Recall::model()->findAll($criteria);

        foreach($recalls as $all_recalls){
            echo  '<div class="testimonial">';
            echo '<p>'.$all_recalls->message.'</p>';
            echo  '<cite>'.$all_recalls->name.'</cite>';
            echo '<span>'.' - '.CHtml::link($all_recalls->subject, '/recall/create').'</span>';
            echo '</div>';
        }
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recall the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
