<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionIndex()
    {
        $currentUser = Yii::$app->user->identity;

        if ($currentUser->role !== 'admin') {
            throw new ForbiddenHttpException('У вас нет прав для редактирования списка.');
        }

        $users = User::find()->all();
        return $this->render('index', [
            'users' => $users,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('Пользователь не найден.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
