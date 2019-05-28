<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "petugas_posyandu".
 *
 * @property string $nik_petugas
 * @property string $nama_petugas
 * @property string $peran_petugas
 * @property string $tgl_daftar
 *
 * @property Akun[] $akun
 * @property ImunisasiAnak[] $imunisasiAnak
 * @property PerkembanganKesehatan[] $perkembanganKesehatan
 * @property Role $peranPetugas
 */
class PetugasPosyandu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'petugas_posyandu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik_petugas', 'nama_petugas', 'peran_petugas', 'no_hp_petugas', 'tgl_daftar'], 'required'],
            [['tgl_daftar'], 'safe'],
            [['nik_petugas', 'nama_petugas', 'peran_petugas'], 'string', 'max' => 32],
            [['no_hp_petugas'], 'string', 'max' => 16],
            [['nik_petugas'], 'unique'],
            [['peran_petugas'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['peran_petugas' => 'id_role']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nik_petugas' => 'Nik Petugas',
            'nama_petugas' => 'Nama Petugas',
            'peran_petugas' => 'Peran Petugas',
            'no_hp_petugas' => 'No Hp Petugas',
            'tgl_daftar' => 'Tgl Daftar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkuns()
    {
        return $this->hasMany(Akun::className(), ['id_petugas' => 'nik_petugas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImunisasiAnaks()
    {
        return $this->hasMany(ImunisasiAnak::className(), ['petugas' => 'nik_petugas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerkembanganKesehatans()
    {
        return $this->hasMany(PerkembanganKesehatan::className(), ['pemeriksa' => 'nik_petugas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeranPetugas()
    {
        return $this->hasOne(Role::className(), ['id_role' => 'peran_petugas']);
    }
}
