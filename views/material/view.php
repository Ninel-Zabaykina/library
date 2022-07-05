<?php

use app\models\Tag;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="main-wrapper">

    <h1 class="my-md-5 my-4"><?= Html::encode($this->title) ?></h1>

    <div class="row mb-3">
        <div class="col-lg-6 col-md-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    //'name' ,
                    'author',
                    'kind.name',
                    'category.name',
                    'description:ntext',
        //            'tag_id',
                    //'link_id',
                ],
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <h3>Теги</h3>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'tag_ids')->widget(Select2::className(), [
                'model' => $model,
                'attribute' => 'tag_ids',
                'data' => ArrayHelper::map(Tag::find()->all(), 'id', 'name'),
                'options' => [
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true,
                ],
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Добавьте подпись"
                           id="floatingModalSignature">
                    <label for="floatingModalSignature">Подпись</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>

                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Добавьте ссылку" id="floatingModalLink">
                    <label for="floatingModalLink">Ссылка</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

