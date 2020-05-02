<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vehicle}}`.
 */
class m200429_204809_create_vehicle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%vehicle}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'marca' => $this->string()->notNull(),
            'modelo' => $this->string()->notNull(),
            'ano' => $this->integer()->notNull(),
            'cor' => $this->string()->notNull(),
            'placa' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'fk-vehicle-client_id', 
            'vehicle', 
            'client_id', 
            'client', 
            'id', 
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-vehicle-client_id', 'vehicle');
        $this->dropTable('{{%vehicle}}');
    }
}
