<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property string $id_role
 * @property string $nama_role
 *
 * @property Akun[] $akuns
 * @property AnggotaPosyandu[] $anggotaPosyandus
 * @property PetugasPosyandu[] $petugasPosyandus
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_role'], 'required'],
            [['id_role', 'nama_role'], 'string', 'max' => 32],
            [['id_role'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_role' => 'Id Role',
            'nama_role' => 'Nama Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkuns()
    {
        return $this->hasMany(Akun::className(), ['peran_pengguna' => 'id_role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaPosyandus()
    {
        return $this->hasMany(AnggotaPosyandu::className(), ['peran1' => 'id_role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetugasPosyandus()
    {
        return $this->hasMany(PetugasPosyandu::className(), ['peran_petugas' => 'id_role']);
    }
}
