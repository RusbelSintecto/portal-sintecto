<?php

/**
 * This is the model class for table "{{XmlSection}}".
 *
 * The followings are the available columns in table '{{XmlSection}}':
 * @property integer $id
 * @property integer $verificationSectionId
 * @property integer $verificationResultId
 * @property string $answer
 *
 * The followings are the available model relations:
 * @property VerificationResult $verificationResult
 * @property VerificationSection $verificationSection
 */
class XmlSection extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{XmlSection}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('verificationSectionId, verificationResultId', 'required'),
            array('verificationSectionId, verificationResultId', 'numerical', 'integerOnly' => true),
            array('answer', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, verificationSectionId, verificationResultId, answer', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'verificationResult' => array(self::BELONGS_TO, 'VerificationResult', 'verificationResultId'),
            'verificationSection' => array(self::BELONGS_TO, 'VerificationSection', 'verificationSectionId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'verificationSectionId' => 'Sección de Verificación',
            'verificationResultId' => 'Estado de Verificación',
            'answer' => 'Respuesta',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('verificationSectionId', $this->verificationSectionId);
        $criteria->compare('verificationResultId', $this->verificationResultId);
        $criteria->compare('answer', $this->answer, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return XmlSection the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function createBasicRecords($verificationSectionId) {
        $xmlSection = new XmlSection;
        $xmlSection->verificationSectionId = $verificationSectionId;
        $xmlSection->verificationResultId = VerificationResult::PENDING;
        if (!$xmlSection->save()) {
            Yii::app()->user->setFlash('verificationSection', 'Error saving the xmlSection detial');
            Yii::log("Error Saving the verification section: " . serialize($xmlSection->getErrors()), "error", "ZWF." . __CLASS__);
        }
    }

    function getAnswerArray() {
        if ($this->answer != "") {
            @$ans = unserialize($this->answer);
            if ($ans === false || !is_array($ans)) {
                $ans = array();
            }
        } else {
            $ans = array();
        }
        return $ans;
    }

    public function afterSave() {
        parent::afterSave();
        $this->verificationSection->save();
        return;
    }

}
