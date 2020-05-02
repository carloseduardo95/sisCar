<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "repair".
 *
 * @property int $id
 * @property int $vehicle_id
 * @property string $descricao
 * @property float $valor
 * @property int $created_at
 * @property int|null $updated_at
 *
 * @property Vehicle $vehicle
 */
class Repair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repair';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'descricao', 'valor'], 'required'],
            [['vehicle_id', 'created_at', 'updated_at'], 'integer'],
            [['valor'], 'number'],
            [['descricao'], 'string', 'max' => 255],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vehicle_id' => Yii::t('app', 'Vehicle ID'),
            'descricao' => Yii::t('app', 'Descricao'),
            'valor' => Yii::t('app', 'Valor'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }
}
