<?php
use yii\db\Migration;

/**
 * Handles the creation of table `{{%countries}}`.
 */
class m240623_113111_create_countries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%countries}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(5)->notNull(),
            'country' => $this->string(255)->notNull(),
            'callCode' => $this->float(),
            'zone' => $this->string(30)->notNull(),
            'currency' => $this->string(5),
            'active' => $this->boolean()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%countries}}');
    }
}

