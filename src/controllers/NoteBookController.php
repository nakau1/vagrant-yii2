<?php

namespace app\controllers;

use Yii;
use app\models\NoteBook;
use app\models\searches\NoteBookSearch;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NoteBookController implements the CRUD actions for NoteBook model.
 */
class NoteBookController extends CommonController
{
    /**
     * @inheritdoc
     */
    public function behaviors(\Exception $ssss)
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
     * @param $identification
     * @return NoteBook|array|null
     */
    protected function findModel($identification)
    {
        $query = NoteBook::find();
        $query->mine();
        return $query->andWhere([
            NoteBook::tableName(). '.identification' => $identification,
        ])->one();
    }

    /**
     * @param $identification string
     * @return string
     */
    public function actionIndex($identification = null)
    {
        $searchModel = new NoteBookSearch();
        $query = NoteBook::find()
            ->mine()
            ->childOf($identification)
            ->orderBy([
                NoteBook::tableName(). '.'. NoteBook::COLUMN_SORT_NUMBER => SORT_DESC,
            ]);
        $dataProvider = $searchModel->search($query, Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'identification' => $identification,
        ]);
    }

    /**
     * @param null $identification
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($identification = null)
    {
        $parent = $this->findModel($identification);
        if ($identification && !$parent) {
            throw new NotFoundHttpException('');
        }

        $noteBook = new NoteBook();

        if ($noteBook->load(Yii::$app->request->post())) {
            $noteBook->user_id = $this->user->id;
            $noteBook->parent_identification = $identification;
            if ($noteBook->save()) {
                return $this->redirect(['view', 'identification' => $noteBook->identification]);
            }
        }

        return $this->render('create', [
            'model' => $noteBook,
        ]);
    }

    /**
     * @param $identification string
     * @return string
     */
    public function actionView($identification)
    {
        return $this->render('view', [
            'model' => $this->findModel($identification),
        ]);
    }

    /**
     * @param $identification
     * @return string|\yii\web\Response
     */
    public function actionUpdate($identification)
    {
        $model = $this->findModel($identification);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/note-book', 'identification' => $model->parent_identification]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param $identification
     * @return \yii\web\Response
     */
    public function actionDelete($identification)
    {
        $this->findModel($identification)->delete();

        return $this->redirect(['index']);
    }
}
