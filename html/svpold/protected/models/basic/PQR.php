<?php

/**
 * This is the model class for table "{{PQR}}".
 *
 * The followings are the available columns in table '{{PQR}}':
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property integer $areaDirigida
 * @property integer $idUserCreate
 * @property string $PQRText
 * @property integer $idUserfinished
 * @property string $PQRAnswer
 * @property integer $status
 * @property string $created
 * @property string $modified
 * @property string $finished
 *
 * The followings are the available model relations:
 * @property User $idUserCreate0
 * @property User $idUserfinished0
 */
class PQR extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{PQR}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

		//Define Campos requeridos -Rusbel
		$requiredFields = array('idUserCreate','type');
		//Añade Campos requeridos Si existen -Rusbel

		return array(

			//Campos requeridos -Rusbel
			array('idUserCreate,title,type,areaDirigida,PQRText', 'required' , 'on'=>'create'),
			array('finished,PQRAnswer', 'required' , 'on'=>'response'),
			
			array('type, areaDirigida, idUserCreate, idUserfinished, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			array('PQRText, PQRAnswer, created, modified, finished', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, type, areaDirigida, idUserCreate, PQRText, idUserfinished, PQRAnswer, status, created, modified, finished', 'safe', 'on'=>'search'),
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
			'userCreate' => array(self::BELONGS_TO, 'User', 'idUserCreate'),
			'userfinish' => array(self::BELONGS_TO, 'User', 'idUserfinished'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Nombre',
			'type' => 'Tipo',
			'areaDirigida' => 'Dirigida A',
			'idUserCreate' => 'Creado Por',
			'PQRText' => 'Detalles',
			'idUserfinished' => 'Atentido por',
			'PQRAnswer' => 'Respuesta',
			'status' => 'Status',
			'created' => 'Created',
			'modified' => 'Modified',
			'finished' => 'Finished',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('areaDirigida',$this->areaDirigida);
		$criteria->compare('idUserCreate',$this->idUserCreate);
		$criteria->compare('PQRText',$this->PQRText,true);
		$criteria->compare('idUserfinished',$this->idUserfinished);
		$criteria->compare('PQRAnswer',$this->PQRAnswer,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('finished',$this->finished,true);
		$criteria->compare('idUserCreate',Yii::app()->user->id,false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PQR the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
