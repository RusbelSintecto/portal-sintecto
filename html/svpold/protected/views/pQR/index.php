<?php
/* @var $this PQRController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pqrs',
);

$this->menu=array(
	array('label'=>'Create PQR', 'url'=>array('create')),
	array('label'=>'Manage PQR', 'url'=>array('admin')),
);
?>

<h1>Pqrs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
