<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "imunisasi_anak".
 *
 * @property string $id_imunisasi
 * @property string $nama_penerima
 * @property int $usia
 * @property string $vaksin
 * @property string $tgl_pemberian
 * @property string $petugas
 *
 * @property AnggotaPosyandu $namaPenerima
 * @property Vaksin $vaksin0
 * @property PetugasPosyandu $petugas0
 */
class ImunisasiAnak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imunisasi_anak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_imunisasi', 'nama_penerima', 'usia', 'vaksin', 'tgl_pemberian', 'petugas'], 'required'],
            [['usia'], 'integer'],
            [['tgl_pemberian'], 'safe'],
            [['id_imunisasi', 'vaksin'], 'string', 'max' => 16],
            [['nama_penerima', 'petugas'], 'string', 'max' => 32],
            [['id_imunisasi'], 'unique'],
            [['nama_penerima'], 'exist', 'skipOnError' => true, 'targetClass' => AnggotaPosyandu::className(), 'targetAttribute' => ['nama_penerima' => 'nik']],
            [['vaksin'], 'exist', 'skipOnError' => true, 'targetClass' => Vaksin::className(), 'targetAttribute' => ['vaksin' => 'id_vaksin']],
            [['petugas'], 'exist', 'skipOnError' => true, 'targetClass' => PetugasPosyandu::className(), 'targetAttribute' => ['petugas' => 'nik_petugas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imunisasi' => 'Id Imunisasi',
            'nama_penerima' => 'Nama Penerima',
            'usia' => 'Usia',
            'vaksin' => 'Vaksin',
            'tgl_pemberian' => 'Tgl Pemberian',
            'petugas' => 'Petugas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaPenerima()
    {
        return $this->hasOne(AnggotaPosyandu::className(), ['nik' => 'nama_penerima']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaksin0()
    {
        return $this->hasOne(Vaksin::className(), ['id_vaksin' => 'vaksin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas0()
    {
        return $this->hasOne(PetugasPosyandu::className(), ['nik_petugas' => 'petugas']);
    }
}
