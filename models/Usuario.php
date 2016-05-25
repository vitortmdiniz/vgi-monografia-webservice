<?php

namespace app\models;

class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
      public static function tableName()
    {
        return 'usuario';
    }
    
     public function attributeLabels()
    {
        return [
            'id' =>  'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha'
           
            ];
    }
    
     public function rules()
    {
        return [
            [['id','nome','senha','email'], 'required'],
            [['email'],'unique'],
            [['email'],'email'],
            [['auth_key'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
       return $this->getPrimaryKey();
    }

     public function getAuthKey()
    {
        return $this->auth_key;
    }
    
    public function getUsername() 
    {
        return $this->email;
    }
    
    public function setUsername($username)
    {
        $this->email = $username;
    }
    
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function validatePassword($password)
    {
        return ($this->senha == crypt($password, Yii::$app->params['user.encryptionKey']));
        // return Yii::$app->security->validatePassword($password, $this->senha);
    }
    
    public function setPassword($password)
    {
        $this->senha = crypt($password, Yii::$app->params['user.encryptionKey']);
        // $this->senha = Yii::$app->security->generatePasswordHash($password);
    }
    
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    

    //RELACOES
    
     public function getMarcacoes()
    {
        return $this->hasMany(\common\models\Marcacao::className(), ['id_usuario' => 'id']);
    }
}
