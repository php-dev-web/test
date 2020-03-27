<?php

namespace frontend\controllers;

use Yii;
use app\models\Customer;
use app\models\Delivery;
use app\models\Book;
use app\models\Returns;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class MyBookController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(), 
                'only' => ['index', 'return'],
                'rules' => [
                    [
                        'actions' => ['index', 'return'],
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
        $user_id = Yii::$app->user->identity->id;
        $customer_id = Customer::find()->where(['user_id' => $user_id])->one()->id;

		$dataProvider = new ActiveDataProvider([
		    'query' => Book::find()->joinWith(['delivery'])->where(['customer_id' => $customer_id]),
		]);

        return $this->render('index', [
        	'dataProvider' => $dataProvider
        ]);
    }

    public function actionReturn($id)
    {
        $delivery = Delivery::findOne(['book_id' => $id]);
        $model = new Returns();

        if ($model->load(Yii::$app->request->post())) {
            $model->date = date('Y-m-d H:i:s');
            $model->book_id = Yii::$app->request->get('id');
            $model->staff_id = $delivery->staff_id;
            $model->customer_id = Yii::$app->user->identity->id;
            if ($model->save() && $delivery->delete()) {
                return $this->redirect(['/my-book/index']);
            }
        }

        return $this->render('_form', [
            'model' => $model
        ]);
    }

}
