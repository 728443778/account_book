<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountBook */
/* @var $form yii\widgets\ActiveForm */

$typeInfos = \app\models\AccountBook::getTypeInfos();
?>

<div class="account-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(\app\models\AccountBook::$types, []) ?>

    <?= $form->field($model, 'type_info_id')->dropDownList($typeInfos, []) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
