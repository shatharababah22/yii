<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%airports}}`.
 */
class m240623_114417_create_airports_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%airports}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(50),
            'name' => $this->string(200),
            'cityCode' => $this->string(50),
            'cityName' => $this->string(200),
            'country_id' => $this->integer()->notNull(),
            
        ]);

        
        $this->createIndex(
            '{{%idx-airports-country_id}}',
            '{{%airports}}',
            'country_id'
        );

      
        $this->addForeignKey(
            '{{%fk-airports-country_id}}',
            '{{%airports}}',
            'country_id',
            '{{%countries}}',
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
            '{{%fk-airports-country_id}}',
            '{{%airports}}'
        );





        $this->dropIndex(
            '{{%idx-airports-country_id}}',
            '{{%airports}}'
        );

        $this->dropTable('{{%airports}}');
    }
   
}
