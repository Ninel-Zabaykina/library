<?php

use app\models\Tag;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = 'Добавить материал';
//$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-create">

    <h1 class="my-md-5 my-4"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5 col-md-8">
            <div class="material-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'kind_id')->dropDownList($kinds) ?>

                <?= $form->field($model, 'category_id')->dropDownList($categories) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>


</div>
