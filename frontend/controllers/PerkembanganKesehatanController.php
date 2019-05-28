<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PerkembanganKesehatan;
use frontend\models\search\PerkembanganKesehatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerkembanganKesehatanController implements the CRUD actions for PerkembanganKesehatan model.
 */
class PerkembanganKesehatanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PerkembanganKesehatan models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new PerkembanganKesehatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        $data =  PerkembanganKesehatan::find()->where(['identitas_anggota' => $id])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $data,
        ]);
    }

    /**
     * Displays a single PerkembanganKesehatan model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PerkembanganKesehatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PerkembanganKesehatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_perkembangan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PerkembanganKesehatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_perkembangan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PerkembanganKesehatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerkembanganKesehatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PerkembanganKesehatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PerkembanganKesehatan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function kesehatan($id)
    {
        // $model = $this -> findModel($id);
        // return $this->redirect(['views/perkembangan-kesehatan/perkembangankesehatan']);

        return $this->render('perkembangankesehatan', [
            'model' => $this->findModel($id),
        ]);
        
    }

}
