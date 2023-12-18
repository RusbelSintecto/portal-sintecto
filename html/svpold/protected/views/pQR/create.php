<?php
/* @var $this PQRController */
/* @var $model PQR */

$this->breadcrumbs=array(
	'Pqrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista PQR', 'url'=>array('index')),
	array('label'=>'Administrar PQR', 'url'=>array('admin')),
);
?>

<h1>Create PQR</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>