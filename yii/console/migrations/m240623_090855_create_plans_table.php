<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%plans}}`.
 */
class m240623_090855_create_plans_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%plans}}', [
            'id' => $this->primaryKey(),
            'insurance_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'overview' => $this->text(),
            'max_age' => $this->integer(),
            'min_age' => $this->integer(),
            'plan_code' => $this->string()->notNull(),
        ]);

        $this->createIndex(
            'idx-plans-insurance_id',
            '{{%plans}}',
            'insurance_id'
        );

        
        $this->addForeignKey(
            'fk-plans-insurance_id',
            '{{%plans}}',
            'insurance_id',
            '{{%insurances}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      
        $this->dropForeignKey(
            'fk-plans-insurance_id',
            '{{%plans}}'
        );

        $this->dropIndex(
            'idx-plans-insurance_id',
            '{{%plans}}'
        );

   
        $this->dropTable('{{%plans}}');
    }
}
