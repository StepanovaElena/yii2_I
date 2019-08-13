<?php


namespace app\components;


use app\models\Users;
use yii\base\Component;

class AuthComponent extends Component
{
    public $classEntity;

    public function getEntity()
    {
        return new $this->classEntity;
    }

    public function signUp(Users &$model): bool
    {
        if (!$model->validate(['email_fld', 'password'])) {
            return false;
        }
        $model->pass_hash_fld = $this->generateHashPassword($model->password);
        $model->auth_key = $this->generateAuthKey();
        if ($model->save()) {
            /**не явно может вызывать валидацию внутри себя, можно отключить через false*/
            \Yii::$app->rbac->addUserRole($model->id_fld);
            return true;
        }
        return false;
    }

    public function generateAuthKey(): string
    {
        return \Yii::$app->security->generateRandomString();
        /**подребуется для сохранения ссесси на длительное время, 32 случайных числа*/
    }

    private function generateHashPassword(string $password): string
    {
        return \Yii::$app->security->generatePasswordHash($password/**(, 13) можно задавать сложность*/);
    }

    /**
     * @param IdentityInterface|Users $model
     * @return bool
     */
    public function signIn(Users &$model)    {

        if (!$model->validate(['email_fld', 'password'])) {
            return false;
        }
        $user = $this->getUserByEmail($model->email_fld);
        if (!$this->validatePassword($model->password, $user->pass_hash_fld)) {
            $model->addError('password', 'Ошибка логина или пароля');
            return false;
        }
        return \Yii::$app->user->login($user, 3600);
    }

    private function getUserByEmail($email): Users
    {
        return Users::find()->andWhere(['email_fld' => $email])->one();
    }

    private function validatePassword($password, $passwordHash)
    {
        return \Yii::$app->security->validatePassword($password, $passwordHash);
    }
}