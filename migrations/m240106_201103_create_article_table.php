<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m240106_201103_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
            'image' => $this->string(),
            'tag' => $this->string(),
            'viewed' => $this->integer()->notNull()->default(0),
            'topic_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
        // create index for column `topic_id`
        $this->createIndex(
            'idx-topic_id',
            'article',
            'topic_id'
        );
        // add foreign key for table `topic`
        $this->addForeignKey(
            'fk-topic_id',
            'article',
            'topic_id',
            'topic',
            'id',
            'CASCADE'
        );
        // create index for column `user_id`
        $this->createIndex(
            'idx-post-user_id',
            'article',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-user_id',
            'article',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
