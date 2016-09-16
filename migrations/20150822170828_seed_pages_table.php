<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            insert into pages (browser_title, page_content, slug)
            values
            ('About moab-tours', '<h1>About Moab-Tours</h1><p>All about this company.</p>', 'about-project')
        ");
        $this->execute("
            insert into pages (browser_title, page_content, slug)
            values
            ('Success', '<h1>Success</h1><p>Check your email to verify and continue.</p>', 'success')
        ");
        $this->execute("
            insert into pages (browser_title, page_content, slug)
            values
            ('Not Found', '<h1>Page Not Found!</h1><p>Page not found!</p>', 'page-not-found')
        ");
        $this->execute("
            insert into pages (browser_title, page_content, slug)
            values
            ('Account Activated', '<h1>Acount Now Active</h1><p>Your account is now active, and you can log in.</p>', 'account-activated')
        ");
        $this->execute("
            insert into pages (browser_title, page_content, slug)
            values
            ('Saved', '<h1>Review Saved</h1><p>Your review has been saved.</p>', 'review-saved')
        ");
    }

    public function down()
    {

    }
}
