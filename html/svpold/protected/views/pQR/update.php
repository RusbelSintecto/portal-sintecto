<?php
/* @var $this PQRController */
/* @var $model PQR */

$this->breadcrumbs=array(
	'Pqrs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PQR', 'url'=>array('index')),
	array('label'=>'Create PQR', 'url'=>array('create')),
	array('label'=>'View PQR', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PQR', 'url'=>array('admin')),
);
?>

<h1>Update PQR <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>