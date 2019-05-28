<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vaksin".
 *
 * @property string $id_vaksin
 * @property string $nama_vaksin
 *
 * @property ImunisasiAnak[] $imunisasiAnaks
 */
class Vaksin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaksin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vaksin', 'nama_vaksin'], 'required'],
            [['id_vaksin', 'nama_vaksin'], 'string', 'max' => 16],
            [['id_vaksin'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vaksin' => 'Id Vaksin',
            'nama_vaksin' => 'Nama Vaksin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImunisasiAnaks()
    {
        return $this->hasMany(ImunisasiAnak::className(), ['vaksin' => 'id_vaksin']);
    }
}
