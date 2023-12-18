<?php
/* @var $this PQRController */
/* @var $model PQR */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'areaDirigida'); ?>
		<?php echo $form->textField($model,'areaDirigida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUserCreate'); ?>
		<?php echo $form->textField($model,'idUserCreate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PQRText'); ?>
		<?php echo $form->textArea($model,'PQRText',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUserfinished'); ?>
		<?php echo $form->textField($model,'idUserfinished'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PQRAnswer'); ?>
		<?php echo $form->textArea($model,'PQRAnswer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'finished'); ?>
		<?php echo $form->textField($model,'finished'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->