<?php
/* @var $this PQRController */
/* @var $model PQR */

$this->breadcrumbs=array(
	'Pqrs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Response',
);

$this->menu=array(
	array('label'=>'Lista PQR', 'url'=>array('index')),
	array('label'=>'Crear PQR', 'url'=>array('create')),
	array('label'=>'View PQR', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administar PQR', 'url'=>array('admin')),
);
?>

<h1>Responder PQR <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_formResponse', array('model'=>$model)); ?>