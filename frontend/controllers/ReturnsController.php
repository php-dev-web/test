<?php

namespace frontend\controllers;

use Yii;
use app\models\Returns;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use common\models\User;

class ReturnsController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(), 
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserCustomer(Yii::$app->user->identity->username);
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $customer_id = Yii::$app->user->identity->id;

    	$dataProvider = new ActiveDataProvider([
		    'query' => Returns::find()->where(['customer_id' => $customer_id])->joinWith(['books', 'staff']),
		]);

        return $this->render('index', [
        	'dataProvider' => $dataProvider
        ]);
    }

}
