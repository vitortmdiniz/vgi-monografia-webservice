<?php

namespace app\models;

use yii\db\ActiveRecord;

class Categoria extends ActiveRecord {

    public static function tableName() {
        return 'categoria';
    }

    public function rules() {
        return [
            [
                [
                    'id',
                    'id_usuario_criador',
                    'nome'
                ],
                'safe'
            ],
        ];
    }

  

   

}
