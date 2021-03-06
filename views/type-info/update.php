<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeInfo */

$this->title = 'Update Type Info: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
