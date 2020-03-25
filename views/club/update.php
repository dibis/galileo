<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Club */

$this->title = Yii::t('app', 'Update Club: {name}', [
    'name' => $model->clu_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clu_id, 'url' => ['view', 'id' => $model->clu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="club-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
