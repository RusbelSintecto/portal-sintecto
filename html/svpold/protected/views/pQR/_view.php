<?php
/* @var $this PQRController */
/* @var $data PQR */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('areaDirigida')); ?>:</b>
	<?php echo CHtml::encode($data->areaDirigida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUserCreate')); ?>:</b>
	<?php echo CHtml::encode($data->idUserCreate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PQRText')); ?>:</b>
	<?php echo CHtml::encode($data->PQRText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUserfinished')); ?>:</b>
	<?php echo CHtml::encode($data->idUserfinished); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PQRAnswer')); ?>:</b>
	<?php echo CHtml::encode($data->PQRAnswer); ?>
	<br />
	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finished')); ?>:</b>
	<?php echo CHtml::encode($data->finished); ?>
	<br />

	*/ ?>

	<div>
		<?php echo CHtml::button('Responder', array('submit' => array('pQR/Response/'.$data->id))); ?>
		</div>

</div>