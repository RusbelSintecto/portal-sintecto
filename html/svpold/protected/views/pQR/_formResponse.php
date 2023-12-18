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
		<?php echo $form->labelEx($model, 'title', array('label' => 'Nombre De Solicitud:'.' '.$model->getAttribute('title') )); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'type'); ?>
		<?php echo $form->dropdownList($model, 'type', Controller::$typePQR, array('disabled' => 'disabled')); ?>
		<?php echo $form->error($model, 'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'areaDirigida'); ?>
		<?php echo $form->dropdownList($model, 'areaDirigida', Controller::$areatype,array('disabled' => 'disabled')); ?>
		<?php echo $form->error($model, 'areaDirigida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'PQRText', array('label' => 'Detalles:'.'<br><br>'.$model->getAttribute('PQRText').'<br><br>' )); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'idUserfinished', array('label' => $model->getAttributeLabel('idUserfinished') . ':  ' .  Yii::app()->user->arUser->name), 'required');; ?>
		<?php echo $form->hiddenField($model, 'idUserfinished', array(
			'value' => Yii::app()->user->id, 'type' => 'hidden'
		)); ?>
		<?php echo $form->error($model, 'idUserfinished'); ?>
	</div>
<br><br>
	<div class="row">
		<?php echo $form->labelEx($model, 'PQRAnswer'); ?>
		<?php echo $form->textArea($model, 'PQRAnswer', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'PQRAnswer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'status'); ?>
		<?php echo $form->dropdownList($model, 'status', Controller::$statusPQR); ?>
		<?php echo $form->error($model, 'status'); ?>
	</div>

	<div class="row">
		<?php if ($model->isNewRecord) {
			echo $form->hiddenField($model, 'created', array('value' => date('Y-m-d H:i:s')));
		} else {
			echo $form->hiddenField($model, 'modified', array('value' => date('Y-m-d H:i:s')));
		} ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'finished'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'finished',
			'options' => array(
				'dateFormat' => 'yy-mm-dd',
			),
		)); ?>
		<?php echo $form->error($model, 'finished'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->