<?php
/* @var $this PQRController */
/* @var $model PQR */

$this->breadcrumbs=array(
	'Pqrs'=>array('index'),
	$model->title,
);

//Condicion De menu  Rusbel 
if($model->idUserCreate==Yii::app()->user->arUser->id){
	$array = array('label'=>'Actualizar PQR', 'url'=>array('update', 'id'=>$model->id));
}else{
	$array = array('label'=>'Responder PQR', 'url'=>array('response', 'id'=>$model->id));
}

$this->menu=array(
	array('label'=>'Lista PQR', 'url'=>array('index')),
	array('label'=>'Crear PQR', 'url'=>array('create')),
	$array ,
	array('label'=>'Eliminar PQR', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar PQR', 'url'=>array('admin')),
);
?>

<h1>View PQR #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'type',
		'areaDirigida',
		'idUserCreate',
		'PQRText',
		'idUserfinished',
		'PQRAnswer',
		'status',
		'created',
		'modified',
		'finished',
	),
)); ?>
