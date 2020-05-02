<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $nome
 * @property int $idade
 * @property string $cpf
 * @property string $cidade
 * @property string $estado
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Vehicle[] $vehicles
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
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
            [['nome', 'idade', 'cpf', 'cidade', 'estado'], 'required'],
            [['cpf'], 'unique'],
            [['idade'], 'integer'],
            [['nome', 'cpf', 'cidade'], 'string', 'max' => 255],
            [['estado'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'idade' => 'Idade',
            'cpf' => 'Cpf',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Vehicles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicle::className(), ['client_id' => 'id']);
    }
}
