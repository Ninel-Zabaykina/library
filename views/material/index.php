<?php

use app\models\Material;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1 class="my-md-5 my-4"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-primary mb-4']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            //'id',
//            'name',
            [
               'attribute' => 'name',
               'value' => function($model){
                   return Html::a($model->name, ['material/view', 'id' => $model->id]);
//                   return Html::a(Html::encode($model->name), Url::to(['/' . $model->category->slug . '/' . $data->slug . '/' . $data->id]));
                },
                'format' => 'raw'
            ],
            'author',
            [
                'label' => 'Тип',
                'attribute'=>'kind_id',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->kind->name;
                },
                'format' => 'raw',
            ],
            [
                    'label' => 'Категория',
                'attribute'=>'category_id',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->category->name;
                },
                'format' => 'raw',
            ],
            //'description:ntext',
            //'tag_id',
            //'link_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Material $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
