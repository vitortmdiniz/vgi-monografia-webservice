<?php

namespace api\models;

class Marcacao extends ActiveRecord {

    public static function tableName() {
        return 'marcacao';
    }

    public function rules() {
        return [
            [
                [
                    'id',
                    'id_usuario',
                    'id_categoria',
                    'mensagem',
                    'data_criacao',
                    'data_atualizado',
                    'latitude',
                    'longitude',
                    'rating',
                ],
                'safe'
            ],
        ];
    }

  

   

}
