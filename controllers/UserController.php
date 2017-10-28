<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\SignupForm;
use yii\web\Controller;
use Yii;

class UserController extends Controller
{
    public function actionSignin(){
        $session = Yii::$app->session;
        
        if (!$session->hasFlash('backUrl'))
            if (strpos(Yii::$app->request->referrer, 'signin'))
                $session->setFlash('backUrl', Yii::$app->request->hostInfo);
            else
                $session->setFlash('backUrl', Yii::$app->request->referrer);
        
        $model = new LoginForm();
        if (($model->load(Yii::$app->request->post()) && $model->login()) || !Yii::$app->user->isGuest) {
            $this->redirect($session->getFlash('backUrl'));
        } else
            return $this->render('index', ['model' => $model]);
    }
    
    public function actionSignout(){
        Yii::$app->user->logout();
        $this->redirect(Yii::$app->request->getReferrer() ?? $this->goHome());
    }
    
    public function actionSignup(){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $model->login();
            $this->goHome();
        }
    
        return $this->render('signup', compact('model'));
    }
}