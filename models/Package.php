<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "package".
 *
 * @property int $pk_id รหัสแพ็คเกจ
 * @property string $pk_name ชื่อแพ็คเกจ
 * @property string $pk_detail รายละเอียด
 * @property double $pk_value ราคา
 * @property string $pk_number หมายเลข
 * @property int $sys_id เครือข่าย
 *
 * @property System $sys
 */
class Package extends \yii\db\ActiveRecord
{
  
    public $upload_foler ='uploads';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pk_name', 'pk_detail', 'pk_value', 'pk_number', 'sys_id'], 'required'],
            [['pk_value'], 'number'],
            [['sys_id'], 'integer'],
            [['pk_name', 'pk_detail'], 'string', 'max' => 255],
            [['pk_number'], 'string', 'max' => 50],
            [['photo'], 'file',
            'skipOnEmpty' => true,
            'extensions' => 'png,jpg'
        ],
            [['sys_id'], 'exist', 'skipOnError' => true, 'targetClass' => System::className(), 'targetAttribute' => ['sys_id' => 's_id']],
        ];
    }
    

    public function upload($model,$attribute)
{
    $photo  = UploadedFile::getInstance($model, $attribute);
      $path = $this->getUploadPath();
    if ($this->validate() && $photo !== null) {

        $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
        //$fileName = $photo->baseName . '.' . $photo->extension;
        if($photo->saveAs($path.$fileName)){
          return $fileName;
        }
    }
    return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
}

public function getUploadPath(){
  return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
}

public function getUploadUrl(){
  return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
}

public function getPhotoViewer(){
  return empty($this->photo) ? Yii::getAlias('@web').'/assets/none.png' : $this->getUploadUrl().$this->photo;
}

    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pk_id' => 'รหัสแพ็คเกจ',
            'pk_name' => 'ชื่อแพ็คเกจ',
            'pk_detail' => 'รายละเอียด',
            'pk_value' => 'ราคา',
            'pk_number' => 'หมายเลข',
            'sys_id' => 'เครือข่าย(1:TRUE , 2:AIS , 3:Dtac)',
            'photo' => 'รูปภาพ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSys()
    {
        return $this->hasOne(System::className(), ['s_id' => 'sys_id']);
    }
}
