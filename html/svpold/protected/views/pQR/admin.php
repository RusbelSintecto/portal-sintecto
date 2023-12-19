<?php
/* @var $this PQRController */
/* @var $model PQR */

$this->breadcrumbs=array(
	'Pqrs'=>array('index'),
	'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pqr-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pqrs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br>
<br>


<?php echo CHtml::button('Crear Nuevo', array('submit' => array('pQR/create'),'class' => 'span-5 button',)); ?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pqr-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'type' => array(
            'name' => 'type',
            'header' => 'Tipo Peticion',
			'value' => '($data->typePQR)' , 
            'type' => 'raw',
            'filter' => CHtml::activeDropDownList($model, 'type', Controller::$typePQR),
            'htmlOptions' => array('width' => '40px'),
        ),
		'areaDirigida'=> array(
            'name' => 'areaDirigida',
            'header' => 'Area Dirigida',
			'value' => '($data->areaType)' , 
            'type' => 'raw',
            'filter' => CHtml::activeDropDownList($model, 'areaDirigida', Controller::$areatype),
            'htmlOptions' => array('width' => '40px'),
        ),
		'userCreate.name',
		'PQRText',
		'userfinish.name',
		'PQRAnswer',
		'status'=> array(
            'name' => 'status',
            'header' => 'Estado',
			'value' => '($data->statusPqr)' , 
            'type' => 'raw',
            'filter' => CHtml::activeDropDownList($model, 'status', Controller::$statusPQR),
            'htmlOptions' => array('width' => '40px'),
        ),
		'created',
		'modified',
		'finished',
		/*
		*/
		array(
			'class'=>'CButtonColumn',
			'header' => GridViewFilter::getClearButton($this->route),
			'template' => '{view}{response}{update}{delete}',
			'viewButtonUrl' => 'Yii::app()->createUrl("PQR/view/", array("id"=>$data->id, "clearFilter" => 1))',
			'buttons' => array(
                'update' => array(
                    'visible' => '$data->userCreate->name==Yii::app()->user->arUser->name' ,
					'options'=>array( 'class'=>'icon-search' ),
				
                ),
                'response' => array(
                    'label' => '<i class="fa fa-pencil-square-o "></i>',
                    'url' => 'Yii::app()->createUrl("PQR/response", array("id"=>$data->id))',
					'options' => array('title' => 'Responder Peticion PQR'),
					'visible' => '$data->userCreate->name!==Yii::app()->user->arUser->name',
                ),
            ),
		),
	),
)); ?>
