<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->execute('INSERT INTO `admin` (`id`, `username`, `name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `verification_token`, `phone`, `cat`, `avatar_image`, `status`, `created_at`, `updated_at`, `blocked_at`, `blocked_id`, `login_at`, `login_ip`, `access_token`, `created_ip`) VALUES (1, "admin", "Администратор", "", "$2y$13$IH6EYjmRCACh.7QYAWGf0.o9TsBnY7HLkkDs.fFsSPQTOdBgnGpKS", NULL, "admin@iwl.com", NULL, NULL, 1, NULL, 10, 1640627705, NULL, NULL, NULL, NULL, NULL, "", NULL);');
        $this->execute('INSERT INTO `lang` (`id`, `locale`, `name`, `status`) VALUES ("en", "en-EN", "EN", 10), ("ru", "ru-RU", "RU", 10);');
    }

    public function down()
    {
    }
}
