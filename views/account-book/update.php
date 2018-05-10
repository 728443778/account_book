<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountBook */

$this->title = 'Update Account Book: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Account Books', 'url' => ['index?sort=-id']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
