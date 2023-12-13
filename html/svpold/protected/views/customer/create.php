<?php
if(!Yii::app()->user->isAdmin){
     $this->redirect('/noallowed.html');
}
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>

<h1>Adicionar un Cliente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>