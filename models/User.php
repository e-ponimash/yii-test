<?php
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public $roles;// роли

    /**
     *  ставим обработчик на AFTER_UPDATE => saveRole
     */
    public function __construct($config=[])
    {
        $this->on(self::EVENT_AFTER_UPDATE, [$this, 'saveRole']);
        return parent::__construct($config);
    }

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * Определяем поведение с метками времени
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Возращает модель User по $username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Возращает Id
     *
     * @return Id
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     *
     * @return mixed|string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /*
     *  Валидация AuthKey
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Валидация password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Устанавливает auth_key в модели
     *
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Устанавливает password_hash в модели
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     *
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    /**
     * Возращает список ролей
     *
     * @return array
     */
    public function getRoleList(){
        return [
            'admin' => 'admin',
            'guest' => 'guest'
        ];
    }

    /**
     * Проставляем метки
     * @return array
     */

    public function attributeLabels()
    {
        return [
            'username' => 'Пользователь',
            'password' => 'Пароль',
        ];
    }

    /**
     * Определяем правила для полей
     * @return array
     */
    public function rules()
    {
        return [['roles', 'safe']];
    }

    /**
     *
     */
    public function afterFind()
    {
        $this->roles = $this->getRoles();
    }

    /**
     * Проставляем  роли для пользователей
     *
     */
    public function saveRole(){
        Yii::$app->authManager->revokeAll($this->getId());
        if (is_array($this->roles)){
            foreach ($this->roles as $roleName){
                if ($role = Yii::$app->authManager->getRole($roleName)) {
                    Yii::$app->authManager->assign($role, $this->getId());
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getRoles(){
        $roles = Yii::$app->authManager->getRolesByUser($this->getId());
        return ArrayHelper::getColumn($roles,'name',false);
    }
}

