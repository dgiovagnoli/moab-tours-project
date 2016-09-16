<?php

use Phinx\Migration\AbstractMigration;

class CreateReviewsTable extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('reviews');
        $users->addColumn('title', 'string')
            ->addColumn('review', 'text')
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();
    }

    public function down()
    {
        $this->dropTable('Reviews');
    }
}
