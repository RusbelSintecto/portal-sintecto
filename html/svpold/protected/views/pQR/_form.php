<?php
/* @var $this PQRController */
/* @var $model PQR */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'pqr-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Campos Con <span class="required">*</span>Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'idUserCreate', array('label' => $model->getAttributeLabel('idUserCreate') . ' ' .  Yii::app()->user->arUser->name), 'required');; ?>
		<?php echo $form->hiddenField($model, 'idUserCreate', array(
			'value' => Yii::app()->user->id, 'type' => 'hidden'
		)); ?>
		<?php echo $form->error($model, 'idUserCreate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'title', array('required' => true, 'placeholder' => 'name')); ?>
		<?php echo $form->textField($model, 'title', array('size' => 60,  'placeholder' => 'name')); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'type'); ?>
		<?php echo $form->dropdownList($model, 'type', Controller::$typePQR); ?>
		<?php echo $form->error($model, 'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'areaDirigida'); ?>
		<?php echo $form->dropdownList($model, 'areaDirigida', Controller::$areatype); ?>
		<?php echo $form->error($model, 'areaDirigida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'PQRText'); ?>
		<?php echo $form->textArea($model, 'PQRText', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'PQRText'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model, 'status', array('value' =>6)); ?>
	</div>

	<div class="row">
		<?php if ($model->isNewRecord) {
			echo $form->hiddenField($model, 'created', array('value' => date('Y-m-d H:i:s')));
		} else {
			echo $form->hiddenField($model, 'modified', array('value' => date('Y-m-d H:i:s')));
		} ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->