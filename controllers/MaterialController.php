<?php

namespace app\controllers;

use app\models\Category;
use app\models\Kind;
use app\models\Material;
use app\models\MaterialSearch;
use app\models\MaterialTag;
use app\models\Tag;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
class MaterialController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Material models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MaterialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Material model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $form = new Material();

        if ($this->request->isPost && $form->load($this->request->post())) {
            $tag_ids = $this->request->post();

            MaterialTag::deleteAll(['material_id' => $id]);
            $tags = [];
            foreach ($tag_ids['Material']['tag_ids'] as $tag_id) {
                $tags[] = [$id, $tag_id];
            }
            MaterialTag::getDb()->createCommand()
                ->batchInsert(MaterialTag::tableName(), ['material_id', 'tag_id'], $tags)->execute();
        }
        $model = $this->findModel($id);
        $model->tag_ids = [];
        $tag_ids = MaterialTag::find()->select('tag_id')->where(['material_id' => $id])->all();
        foreach ($tag_ids as $t){
            $model->tag_ids[] = $t->tag_id;
        }

        return $this->render('view', [
            'model' => $model,
            'form' => $form,
            'tags' => Tag::find()->all(),
        ]);
    }

    /**
     * Creates a new Material model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Material();

        $categories = Category::find()->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');

        $kinds = Kind::find()->all();
        $kinds = ArrayHelper::map($kinds, 'id', 'name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Post has been updated.'));
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } elseif ($this->request->isGet) {
            $model->load($this->request->get());
            $model->tag_ids = ArrayHelper::map($model->tags, 'name', 'name');
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
            'kinds' => $kinds,
        ]);
    }

    /**
     * Updates an existing Material model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categories = Category::find()->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');

        $kinds = Kind::find()->all();
        $kinds = ArrayHelper::map($kinds, 'id', 'name');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Post has been updated.'));
            return $this->redirect(['update', 'id' => $model->id]);
        }
        elseif ($this->request->isPost) {
            $model->load(Yii::$app->request->get());
            $model->tag_ids = ArrayHelper::map($model->tags, 'name', 'name');
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
            'kinds' => $kinds,
        ]);
    }

    /**
     * Deletes an existing Material model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Material model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Material the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Material::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
