<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class'=>'col-md-8']
    ]); ?>

    <?= $form->field($model, 'searchstring') ?>

    <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>


 <!--   <?/*= $form->field($model, 'name') */?>

    <?/*= $form->field($model, 'author') */?>

    <?/*= $form->field($model, 'kind_id') */?>

   <?/*= $form->field($model, 'category_id') */?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'tag_id') ?>

    <?php // echo $form->field($model, 'link_id') ?> -->

 <!--   <div class="form-group">
        <?/*= Html::submitButton('Search', ['class' => 'btn btn-primary']) */?>
        <?/*= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) */?>
    </div>-->

    <?php ActiveForm::end(); ?>

</div>
