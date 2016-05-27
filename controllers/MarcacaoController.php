<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Marcacao;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MarcacaoController extends Controller 
{
    public function actionEnviarMarcacao()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $marcacao = new Marcacao();
            $marcacao->id_usuario = $post['id'];
            $marcacao->nome_usuario = $post['nome'];
            $marcacao->categoria = $post['categoria'];
            $marcacao->mensagem = $post['mensagem'];
            $marcacao->latitude = $post['lat'];
            $marcacao->longitude = $post['lon'];
            if($marcacao->validate() && $marcacao->save())
                return true;
            else
                return 'Problema ao tentar salvar marcação, tente novamente.';
        }
        
    }
    
    public function actionListarMarcacoes()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Marcacao::find()->all();
    }
    
}