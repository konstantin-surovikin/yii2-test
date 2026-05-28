<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscription}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%author}}`
 */
class m260527_211620_create_subscription_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscription}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'phone' => $this->string(15)->notNull(),
            'created_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-subscription-author_id}}',
            '{{%subscription}}',
            'author_id'
        );

        // add foreign key for table `{{%author}}`
        $this->addForeignKey(
            '{{%fk-subscription-author_id}}',
            '{{%subscription}}',
            'author_id',
            '{{%author}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%author}}`
        $this->dropForeignKey(
            '{{%fk-subscription-author_id}}',
            '{{%subscription}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-subscription-author_id}}',
            '{{%subscription}}'
        );

        $this->dropTable('{{%subscription}}');
    }
}
