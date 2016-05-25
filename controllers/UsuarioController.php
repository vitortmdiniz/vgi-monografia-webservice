<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Usuario;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioController extends Controller {

    public function actionListar()
    {
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Usuario::find()->all();
    }
    
    public function actionCadastrar()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $usuario = new Usuario();
            $usuario->nome = $post['nome'];
            $usuario->email = $post['email'];
            $usuario->setPassword($post['senha']);
            if($usuario->validate() && $usuario->save())
                return true;
            else
                return 'Problema na conexão com o servidor, favor tentar novamente mais tarde';
        }
        
    }
    
    
}