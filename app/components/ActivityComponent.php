<?php


namespace app\components;


use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $classEntity;

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

    public function createActivity(&$model)
    {
        $loadFile = UploadedFile::getInstances($model, 'loadFile');

        if ($model->validate()) {
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

}