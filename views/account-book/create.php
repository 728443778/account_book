<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountBook */

$this->title = 'Create Account Book';
$this->params['breadcrumbs'][] = ['label' => 'Account Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
