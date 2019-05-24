<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "anggota_posyandu".
 *
 * @property string $nik
 * @property string $nama_anggota
 * @property string $peran
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $gender
 * @property string $alamat
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property string $nama_suami
 * @property string $pekerjaan
 * @property string $no_hp
 * @property string $no_hp_orangtua
 * @property string $foto_anggota
 * @property string $tgl_pendaftaran
 *
 * @property Akun[] $akun
 * @property Role $peran
 * @property ImunisasiAnak[] $imunisasiAnak
 * @property PerkembanganKesehatan[] $perkembanganKesehatan
 */
class AnggotaPosyandu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anggota_posyandu';
    }

    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama_anggota', 'peran', 'tempat_lahir', 'tgl_lahir', 'gender', 'alamat', 'foto_anggota', 'tgl_pendaftaran'], 'required'],
            [['tgl_lahir', 'tgl_pendaftaran'], 'safe'],
            [['nik', 'nama_anggota', 'peran', 'tempat_lahir', 'alamat', 'nama_ayah', 'nama_ibu', 'nama_suami', 'pekerjaan'], 'string', 'max' => 32],
            [['gender', 'no_hp', 'no_hp_orangtua'], 'string', 'max' => 16],
            [['foto_anggota'], 'string', 'max' => 255],
            [['nik'], 'unique'],
            [['peran'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['peran' => 'id_role']],
            [['file'], 'safe'],
            [['file'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nik' => 'Nik',
            'nama_anggota' => 'Nama Anggota',
            'peran' => 'Peran',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'gender' => 'Gender',
            'alamat' => 'Alamat',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'nama_suami' => 'Nama Suami',
            'pekerjaan' => 'Pekerjaan',
            'no_hp' => 'No Hp',
            'no_hp_orangtua' => 'No Hp Orangtua',
            //'foto_anggota' => 'Foto Anggota',
            'tgl_pendaftaran' => 'Tgl Pendaftaran',
            'file' => 'Foto Anggota'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkuns()
    {
        return $this->hasMany(Akun::className(), ['nik_anggota' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeran0()
    {
        return $this->hasMany(Role::className(), ['id_role' => 'peran1gc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImunisasiAnaks()
    {
        return $this->hasMany(ImunisasiAnak::className(), ['nama_penerima' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerkembanganKesehatans()
    {
        return $this->hasMany(PerkembanganKesehatan::className(), ['identitas_anggota' => 'nik']);
    }




}
