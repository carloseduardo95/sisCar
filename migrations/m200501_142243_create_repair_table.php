<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%repair}}`.
 */
class m200501_142243_create_repair_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%repair}}', [
            'id' => $this->primaryKey(),
            'vehicle_id' => $this->integer()->notNull(),
            'descricao' => $this->string()->notNull(),
            'valor' => $this->decimal()->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'fk-repair-vehicle_id', 
            'repair', 
            'vehicle_id', 
            'vehicle', 
            'id', 
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-repair-vehicle_id', 'repair');
        $this->dropTable('{{%repair}}');
    }
}
