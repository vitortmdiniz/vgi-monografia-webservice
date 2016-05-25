<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $id_empresa
 * @property int $id_produto_categoria
 * @property string $nome
 * @property string $descricao
 * @property float $preco
 * @property string $imagem
 * @property int $disponivel
 * @property int $ordem
 */

class Marcacao extends ActiveRecord
{
    
    public static function tableName()
    {
        return 'marcacao';
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'ID Usuario',
            'nome_usuario' => 'Nome do Usuário',
            'rating' => 'Rating',
            'mensagem' => 'Mensagem',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude'
            ];
    }
    
    public function rules()
    {
        return [
            [['id_usuario','nome_usuario','latitude','longitude','mensagem'], 'required'],
            [['rating'], 'safe'],
        ];
    }
    
    public function getUsuario()
    {
        return $this->hasOne(\app\models\Usuario::className(), ['id' => 'id_usuario']);
    }

    
}