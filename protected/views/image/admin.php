<ul class="nav nav-tabs">
     <li ><?php echo CHtml::link('List Image',array('//image/index')) ?></li>
    <li class="active"><?php echo CHtml::link('Mange Image',array('//image/admin')) ?></li>
    <li><?php echo CHtml::link('Create Image',array('//image/create')) ?></li>
</ul>
<?php
/* @var $this ImageController */
/* @var $model Image */

$this->breadcrumbs = array(
    'Images' => array('index'),
    'Manage',
);


?>

<h1>Manage Photos</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(  
    'type'=>'striped bordered condensed',
    'id' => 'image-grid',
    'dataProvider' => $model->searchadmin(),
    'filter' => $model,
    'template'=>'{summary}{pager}{items}{pager}',
    'pager' => array(
                //'cssFile' => Yii::app()->baseUrl . '/css/.css',
                'header' => false,
        ),
    'columns' => array(
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'$data->id',
        ),
        array(
            'name' => 'Title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->Title),$data->url)',
        ),
        array(
            'name'=>'thumbnails',
            'type'=>'raw',
            'value'=>  'CHtml::link(CHtml::image(Yii::app()->request->baseUrl.$data->thumbnails),$data->url)',
        ),
        array(
            'name' => 'status',
            'value' => 'Lookup::item("ImageStatus",$data->status)',
            'filter' => Lookup::items('ImageStatus'),
        ),
        array(
            'name' => 'CreatedTime',
            'type' => 'datetime',
            'filter' => false,
        ),
        array(
            'class' => 'CButtonColumn',
            
        ),
    ),
));
?>
