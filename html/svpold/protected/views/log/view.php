<?php
/* @var $this LogController */
/* @var $model Log */
if(!Yii::app()->user->isSuperAdmin){
     $this->redirect('/noallowed.html');
}

$this->breadcrumbs=array(
	'Logs'=>array('index'),
	CHtml::encode($model->id),
);


?>

<h1>View Log #<?php echo CHtml::encode($model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'customerUserLogin',
		'userLogin',
		'backgroundCheckCode',
		'serverName',
		'module',
		'controller',
		'action',
		'ip',
		'comments',
		'created',
		'modified',
	),
)); ?>
