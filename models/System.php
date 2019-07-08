<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system".
 *
 * @property int $s_id รหัสเครือข่าย
 * @property string $s_name ชื่อเครือข่าย
 *
 * @property Package[] $packages
 */
class System extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['s_name'], 'required'],
            [['s_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'รหัสเครือข่าย',
            's_name' => 'ชื่อเครือข่าย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Package::className(), ['sys_id' => 's_id']);
    }
}
