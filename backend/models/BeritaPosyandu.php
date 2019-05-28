<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita_posyandu".
 *
 * @property string $id_berita
 * @property string $judul
 * @property string $isi_berita
 * @property string $tgl_unggah
 */
class BeritaPosyandu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita_posyandu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berita', 'judul', 'isi_berita', 'tgl_unggah'], 'required'],
            [['tgl_unggah'], 'safe'],
            [['id_berita'], 'string', 'max' => 8],
            [['judul'], 'string', 'max' => 64],
            [['isi_berita'], 'string', 'max' => 500],
            [['id_berita'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'judul' => 'Judul',
            'isi_berita' => 'Isi Berita',
            'tgl_unggah' => 'Tgl Unggah',
        ];
    }
}
