<?php

use Phinx\Migration\AbstractMigration;

class SeedReviewTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            insert into reviews (title, review, user_id, created_at)
            values
            ('Review Title', 'Review text', 1, '2015-08-26 19:15:43')
        ");
    }

    public function down()
    {

    }
}
