<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <br>
    <div class="inline">

        <div class="col-xs-3">

            <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>

        </div>

        <div class="col-xs-5"></div>

        <div class="col-xs-4">

            <?php
            echo $this->render('_search', ['model' => $searchModel]);
            ?> 

        </div>

        <div style="clear: both"></div>

    </div><br>

<?=
            
GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="text-danger"><strong>Sin permiso</strong></span>'],
    'tableOptions' => ['class' => 'table table-striped'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        //'id',
        'username',
        //'auth_key',
        //'password_hash',
        //'password_reset_token',
        'email:email',
        //'status',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status == 10) {
                        return 'Activo';
                    } else {
                        return 'Inactivo';
                    }
                },
            ],

        'itemAssignments.item_name',
        //'created_at',
        [
            'attribute' => 'created_at',
            'format' => ['DateTime', 'php:d-m-Y']
        ],
        //'updated_at',
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'text-align: right;'],
             'template' => '{view} {update} {change} {permisos} {delete}',
             'buttons' => [
                    //view button
                    'view' => function ($url, $model) {
                        return  Html::a('<span class="fa fa-search"></span>'.Yii::t('app', 'Ver'), $url, 
                        [ 'title' => Yii::t('app', 'View'), 'class'=>'btn btn-primary btn-xs', ]) ;
                    },
                    'update' => function ($url, $model) {
                        return  Html::a('<span class="fa fa-pencil-square-o"></span>'.Yii::t('app', 'Actualizar'), $url, 
                        [ 'title' => Yii::t('app', 'Update'), 'class'=>'btn btn-warning btn-xs', ]) ;
                    },
                    'change' => function ($url, $model) {
                        return  Html::a('<span class="fa fa-pencil-square-o"></span>'.Yii::t('app', 'Contraseña'), $url, 
                        [ 'title' => Yii::t('app', 'Change pass'), 'class'=>'btn btn-success btn-xs', ]) ;
                    },
                    'permisos' => function ($url, $model) {
                        return  Html::a('<span class="fa fa-pencil-square-o"></span>'.Yii::t('app', 'Permisos'), $url, 
                        [ 'title' => Yii::t('app', 'Change rol'), 'class'=>'btn btn-success btn-xs', ]) ;
                    },
                    'delete' => function($url, $model){
                        return Html::a('<span class="fa fa-remove"></span>'.Yii::t('app', 'Borrar'),  ['delete', 'id' => $model->id], [
                            'title' => Yii::t('app', 'Delete'),
                            'class' => 'btn btn-danger btn-xs',
                            'data' => [
                                'confirm' => Yii::t('app', '¿Está seguro de querer eliminarlo?'),
                                'method' => 'post',
                            ],
                        ]);
                    },

                ],
            'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/view', 'id' => $key]);
                        return $url;
                    }
                    elseif ($action === 'update') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/update', 'id' => $key]);
                        return $url;
                    }
                    elseif ($action === 'change') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/change', 'id' => $key]);
                        return $url;
                    }
                    elseif ($action === 'permisos') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/permisos', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
        'tableOptions' =>['class' => 'table table-striped'],               

]);
?>
</div>
