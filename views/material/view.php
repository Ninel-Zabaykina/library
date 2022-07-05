<?php

use app\models\Tag;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="material-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name' ,
            'author',
            'kind.name',
            'category.name',
            'description:ntext',
            'tag_id',
            //'link_id',
        ],
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <fieldset>
        <legend>Tags</legend>
        <?= $form->field($model, 'tag_ids')->widget(Select2::className(), [
            'model' => $model,
            'attribute' => 'tag_ids',
            'data' => ArrayHelper::map(Tag::find()->all(), 'name', 'name'),
            'options' => [
                'multiple' => true,
            ],
            'pluginOptions' => [
                'tags' => true,
            ],
        ]); ?>
    </fieldset>

    <div class="form-group">
        <?= Html::submitButton('Добавить тэг', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
