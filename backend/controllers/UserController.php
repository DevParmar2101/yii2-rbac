<?php

namespace backend\controllers;

use backend\models\SignupForm;
use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = new SignupForm();
        $user->scenario = 'user-create';
        $user->role = 'user';
        if ($user->load(Yii::$app->request->post()) &&  $user->validate()) {
            $user->setUserSignup();
            Yii::$app->session->setFlash('success', 'User Created Successfully');
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $user,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $user_role = '';
        $role = array_keys(Yii::$app->authManager->getRolesByUser($user->id));
        if(isset($role[0])){
            $user->role = $role[0];
            $user_role = $role[0];
        }
        if ($user->load(Yii::$app->request->post()) &&  $user->validate()) {
            $user->updated_at = date('Y-m-d H:i');
            if(isset($user->password) && $user->password!=''){
                $user->password_hash=Yii::$app->security->generatePasswordHash($user->password);
            }

            $user->save();

            if(isset($user->role) && $user->role!="" && $user->role!=$user_role){
                Yii::$app->authManager->revokeAll($user->id);
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole($user->role);
                $auth->assign($authorRole, $user->primaryKey);
            }

            Yii::$app->session->setFlash('success', 'User Updated Successfully');
            return $this->redirect('index');
        }
        return $this->render('update', [
            'model' => $user,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
