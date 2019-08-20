<?php


namespace app\components;


use app\behaviours\LogBehaviour;
use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $classEntity;

    const EVENT_CUSTOM_EVENT = 'custom_event';

    public function behaviors()
    {
        return [
            LogBehaviour::class,
        ];
    }

    public function init()
    {
        parent::init();

        if (empty($this->classEntity)) {
            throw new \Exception('classEntity param required');
        }
    }

    public function getEntity()
    {
        return new $this->classEntity;
    }

    public function getActivityById($id)
    {
        return Activity::find()->andWhere(['id_fld' => $id])->one();
    }

    public function getAllActivityAsArray($params = [])
    {
        return Activity::find()
            ->where($params)
            ->asArray()
            ->all();
    }

    public function createActivity(Activity &$model)
    {
        $loadFile = UploadedFile::getInstances($model, 'loadFile');
        $model->userID_fld = \Yii::$app->user->getId();
        //if ($model->validate()) {
        //save() уже содержит в себе валидацию
        if ($model->save()) {
            $this->trigger(self::EVENT_CUSTOM_EVENT);
            if ($loadFile) {
                foreach ($loadFile as $item) {
                    if ($file = $this->saveUploadedFile($item)) {
                        $model->loadFile[] = $file;
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function editActivity(Activity &$model)
    {
        if ($model->validate()) {
            return false;
        }
        return $model->updateAttributes(['body_fld', 'endDay']);
    }

    public function deleteActivity(Activity &$model)
    {
        return $model->delete();
    }

    private function saveUploadedFile(UploadedFile $file)
    {
        $path = $this->getPathToSaveImage();
        $filename = $this->genFileName($file);
        $path .= DIRECTORY_SEPARATOR . $filename;
        if ($file->saveAs($path)) {
            return $filename;
        } else {
            return null;
        }
    }

    private function getPathToSaveImage()
    {
        $path = \Yii::getAlias('@webroot/loaded_files');
        FileHelper::createDirectory($path);
        return $path;
    }

    private function genFileName(UploadedFile $file)
    {
        return time() . '_' . $file->getBaseName() . '.' . $file->getExtension();
    }

    /**
     * @return Activity[]|null
     */
    public function getActiveActivityTodayNotification(): array
    {
        $result = Activity::find()
            ->andWhere('startDay_fld>=:date', [':date' => date('Y-m-d')])
            ->andWhere(['useNotification_fld' => 1])
            ->all();
        return $result;
    }

}