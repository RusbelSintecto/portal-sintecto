<?php

/**
 * This is the model class for table "{{DetailRegister}}".
 *
 * The followings are the available columns in table '{{DetailRegister}}':
 * @property integer $id
 * @property integer $verificationSectionId
 * @property integer $verificationResultId
 * @property integer $required
 * @property string $name
 * @property string $verifiedOn
 * @property string $simit
 * @property string $runt
 * @property string $libreta_militar
 *
 * The followings are the available model relations:
 * @property VerificationSection $verificationSection
 * @property Verification $verification
 */
class DetailRegister extends SVPActiveRecord {

    const WITH_ADVERSE = 'A la fecha Presenta Adversos.';
    const WITHOUT_ADVERSE = 'A la fecha No Presenta Adversos.';

    public static function basicRegisters() {
        return array(
        );
    }

    public static function basicRegister($id) {
        $arr = DetailRegister::basicRegisters();
        if (isset($arr[$id])) {
            $ans = $arr[$id];
        } else {
            $ans = null;
        }
        return $ans;
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DetailRegister the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{DetailRegister}}';
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
            array('name', 'length', 'max' => 45),
            array('comments', 'length', 'max' => 255),
            array('simit, runt, libreta_militar', 'length', 'max'=>80),
            array('verifiedOn', 'length', 'max' => 10),
            array('required', 'boolean'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, verificationSectionId, verificationResultId, name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'verificationSection' => array(self::BELONGS_TO, 'VerificationSection', 'verificationSectionId'),
            'verificationResult' => array(self::BELONGS_TO, 'VerificationResult', 'verificationResultId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'verificationSectionId' => 'Verification Section',
            'verificationResultId' => 'Verification',
            'name' => 'Name',
            'simit' => 'Simit',
            'runt' => 'Runt',
            'libreta_militar' => 'Libreta Militar',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('verificationSectionId', $this->verificationSectionId);
        $criteria->compare('verificationResultId', $this->verificationResultId);
        $criteria->compare('required', $this->required);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('simit',$this->simit,true);
        $criteria->compare('runt',$this->runt,true);
        $criteria->compare('libreta_militar',$this->libreta_militar,true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getHasEnoughData() {
        return ($this->name != "");
    }

    public function afterSave() {
        parent::afterSave();
        $this->verificationSection->save();
        return;
    }

    public static function createBasicRecords($verificationSectionId) {
        $values = array(
            'verificationSectionId' => $verificationSectionId,
            'verificationResultId' => VerificationResult::PENDING,
            'required' => TRUE,
                )
        ;
        $detailRegister = new DetailRegister;
        $detailRegister->verificationSectionId = $verificationSectionId;
        $detailRegister->verificationResultId = VerificationResult::PENDING;
        if (!$detailRegister->save()) {
        Yii::app()->user->setFlash('verificationSection', 'Error saving the Register detail ');
        Yii::log("Error Saving the verification section: " . serialize($detailRegister->getErrors()), "error", "ZWF." . __CLASS__);
        }
        /*$regNames = DetailRegister::basicRegisters();
        foreach ($regNames as $registerName) {
            $values['name'] = $registerName;
            $doc = new DetailRegister();
            $doc->attributes = $values;
            if (!$doc->save()) {
                Yii::app()->user->setFlash('verificationSection', serialize($doc->getErrors));
            }
        }*/
    }

    public function getComentAdvs($idSection, $val) {
        $models = VerificationSection::model()->findByAttributes(['id'=>$idSection]);

        if($val==0){
            $models->comments="No se encontraron coincidencias en registro público.";
        }else if($val==1){
            $models->comments="Se encontraron coincidencias en registro público.";
        }
		$models->update();

		WebUser::logAccess("Se realizo la actualización del comentario en la pestaña adversos.", $models->backgroundCheck->code);
		return true;
    }

}