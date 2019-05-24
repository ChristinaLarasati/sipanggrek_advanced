<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "akun".
 *
 * @property string $username
 * @property string $password
 * @property string $nik_anggota
 * @property string $id_petugas
 * @property string $peran_pengguna
 *
 * @property AnggotaPosyandu $nikAnggota
 * @property PetugasPosyandu $petugas
 * @property Role $peranPengguna
 */
class Akun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'peran_pengguna'], 'required'],
            [['username', 'password', 'nik_anggota', 'id_petugas', 'peran_pengguna'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['nik_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => AnggotaPosyandu::className(), 'targetAttribute' => ['nik_anggota' => 'nik']],
            [['id_petugas'], 'exist', 'skipOnError' => true, 'targetClass' => PetugasPosyandu::className(), 'targetAttribute' => ['id_petugas' => 'nik_petugas']],
            [['peran_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['peran_pengguna' => 'id_role']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'nik_anggota' => 'Nik Anggota',
            'id_petugas' => 'Id Petugas',
            'peran_pengguna' => 'Peran Pengguna',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNikAnggota()
    {
        return $this->hasOne(AnggotaPosyandu::className(), ['nik' => 'nik_anggota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasOne(PetugasPosyandu::className(), ['nik_petugas' => 'id_petugas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeranPengguna()
    {
        return $this->hasOne(Role::className(), ['id_role' => 'peran_pengguna']);
    }
}
