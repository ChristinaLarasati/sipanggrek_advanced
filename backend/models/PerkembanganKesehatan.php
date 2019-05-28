<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perkembangan_kesehatan".
 *
 * @property int $id_perkembangan
 * @property string $identitas_anggota
 * @property int $lingkar_perut
 * @property int $berat_badan
 * @property int $tinggi_badan
 * @property string $keluhan
 * @property string $tgl_pemeriksaan
 * @property string $pemeriksa
 *
 * @property AnggotaPosyandu $entitasAnggota
 * @property PetugasPosyandu $pemeriksa0
 */
class PerkembanganKesehatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perkembangan_kesehatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identitas_anggota', 'berat_badan', 'tgl_pemeriksaan'], 'required'],
            [['lingkar_perut', 'berat_badan', 'tinggi_badan'], 'integer'],
            [['tgl_pemeriksaan'], 'safe'],
            [['identitas_anggota'], 'string', 'max' => 32],
            [['keluhan'], 'string', 'max' => 64],
            [['identitas_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => AnggotaPosyandu::className(), 'targetAttribute' => ['identitas_anggota' => 'nik']],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perkembangan' => 'Id Perkembangan',
            'identitas_anggota' => 'Identitas Anggota',
            'lingkar_perut' => 'Lingkar Perut',
            'berat_badan' => 'Berat Badan',
            'tinggi_badan' => 'Tinggi Badan',
            'keluhan' => 'Keluhan',
            'tgl_pemeriksaan' => 'Tgl Pemeriksaan',
            'pemeriksa' => 'Pemeriksa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntitasAnggota()
    {
        return $this->hasOne(AnggotaPosyandu::className(), ['nik' => 'identitas_anggota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemeriksa0()
    {
        return $this->hasOne(PetugasPosyandu::className(), ['nik_petugas' => 'pemeriksa']);
    }
}
