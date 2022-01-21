<?php

namespace app\controllers;


use amnah\yii2\user\models\User;
use app\models\Client;
use app\models\search\ClientSearch;
use Yii;
use yii\filters\AccessControl;
use yii\rbac\Role;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['@'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['client'],
                        ],
                        [
                            'allow' => false,
                            'actions' => ['create'],
                            'roles' => ['admin', 'client'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index', 'update', 'delete', 'view'],
                            'roles' => ['admin'],
                        ],
                        [
                        'allow' => true,
                        'actions' => ['admin'],
                        'roles' => ['client', 'admin'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }



    public function actionAdmin()
    {
        $thisUser = User::find()->where(['id' => Yii::$app->user->id])->one();
        $thisUser->setAttribute('role_id', 1);
        $thisUser->save();
        return $this->render('admin');
    }

    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws \Exception
     */
    public function actionCreate()
    {
        //if(empty($_GET["address_id"])) return $this->redirect(array('/client/create', 'address_id' => '0'));
        $model = new Client();
        $address_id = $_GET["address_id"];
        $model->address_id = $address_id;

        $model->username = Yii::$app->user->identity['username'];;
        $model->id = Yii::$app->user->identity->getId();
        $thisId = Yii::$app->user->identity->getId();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $thisUser = User::find()->where(['id' => $thisId])->one();
                $thisUser->setAttribute('role_id', 3)  ;
                $thisUser->save();
                //Yii::$app->user->Identity(['role_id']) =;
                //$var1 = User::find()->where('id' === Yii::$app->user->identity->getId())->one();
                //$var1['role'] = 3;
                //$var1->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model = new Client();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Client model.
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
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
