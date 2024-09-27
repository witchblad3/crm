<?php

namespace frontend\controllers;

use common\models\ApplicationHistory;
use common\models\User;
use Yii;
use common\models\Application;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

/**
 * Контроллер заявок
 */
class ApplicationController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Application::find(),
        ]);
        if(!Yii::$app->user->isGuest) {
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
        return false;
    }

    public function actionCreate()
    {
        $model = new Application();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Заявка успешно создана.');
                return $this->redirect(['site/index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate($id)
    {
        $model = Application::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException('Заявка не найдена.');
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        $historyDataProvider = new ActiveDataProvider([
            'query' => ApplicationHistory::find()
                ->with('changedByUser')
                ->where(['application_id' => $model->id])
                ->orderBy('changed_at DESC'),
        ]);

        return $this->render('view', [
            'model' => $model,
            'historyDataProvider' => $historyDataProvider,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Application::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
    }

}
