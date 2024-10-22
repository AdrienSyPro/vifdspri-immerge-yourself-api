<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241022185445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Challenge, Experience and Timeline tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE challenge_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE experience_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE timeline_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE challenge (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE experience (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE timeline (id INT NOT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE challenge_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE experience_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE timeline_id_seq CASCADE');
        $this->addSql('DROP TABLE challenge');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE timeline');
    }
}
