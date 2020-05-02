<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m200429_204808_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'idade' => $this->integer()->notNull(),
            'cpf' => $this->string()->notNull()->unique(),
            'cidade' => $this->string()->notNull(),
            'estado' => $this->char(2)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%client}}');
    }
}
