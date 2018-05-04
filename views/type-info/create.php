<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeInfo */

$this->title = 'Create Type Info';
$this->params['breadcrumbs'][] = ['label' => 'Type Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
