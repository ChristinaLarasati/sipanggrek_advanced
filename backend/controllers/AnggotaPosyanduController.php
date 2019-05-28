<?php

namespace backend\controllers;

use Yii;
use backend\models\AnggotaPosyandu;
use backend\models\PerkembanganKesehatan;
use yii\data\ActiveDataProvider;
use backend\models\search\AnggotaPosyanduSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnggotaPosyanduController implements the CRUD actions for AnggotaPosyandu model.
 */
class AnggotaPosyanduController extends Controller
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

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'update', 'view', 'delete'],
                        'allow' => true,
                        'role' => ['1', '2', '3', '4'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all AnggotaPosyandu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnggotaPosyanduSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AnggotaPosyandu model.
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
     * Creates a new AnggotaPosyandu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AnggotaPosyandu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->nik]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AnggotaPosyandu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nik]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

        /**
     * Updates an existing AnggotaPosyandu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionKesehatan($id)
    {
        $query = PerkembanganKesehatan::find()->where(['identitas_anggota'=>$id])->all();
        
        $dataProvider = new ActiveDataProvider([
            'query'=>$query
            ]);
            

        return $this->redirect('perkembangankesehatan', [
            //'dataProvider' => $dataProvider,
            // $posts = $dataProvider->getModels()
        ]);
        
    }

    public function actionCekkes($id)
    {
        $anggota = AnggotaPosyandu::find()->where(['nik' => $id])->one();
        $model = new PerkembanganKesehatan();

        if ($model->load(Yii::$app->request->post())) {
            $model->identitas_anggota = $anggota->nik;
            
            $model->save();
            // echo "<pre>"; print_r($model); die();
            return $this->redirect(['view', 'id' => $anggota->nik]);
        }
        else{
            return $this->render('/perkembangan-kesehatan/createCekKesehatan', 
            [
                'anggota' => $anggota,
                'model' => $model,
            ]);
        }

        
    }


    /**
     * Deletes an existing AnggotaPosyandu model.
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
     * Finds the AnggotaPosyandu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AnggotaPosyandu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnggotaPosyandu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public  function buatKoneksi(){
        $koneksi = mysqli_connect("localhost","root","","backend/views/perkembangan-kesehatan");
    }
}
