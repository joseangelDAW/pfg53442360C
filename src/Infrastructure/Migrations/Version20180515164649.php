<?php declare(strict_types = 1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180515164649 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE vaccine (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A7DD90B1F270FD45 ON vaccine (care_id)');
        $this->addSql('CREATE TABLE address (id INTEGER NOT NULL, user_id INTEGER NOT NULL, number VARCHAR(4) NOT NULL, street VARCHAR(40) NOT NULL, floor VARCHAR(20) NOT NULL, floor_information VARCHAR(20) NOT NULL, cp INTEGER NOT NULL, province VARCHAR(20) NOT NULL, city VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)');
        $this->addSql('CREATE TABLE care (id INTEGER NOT NULL, pet_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6113A845966F7FB6 ON care (pet_id)');
        $this->addSql('CREATE TABLE user (id INTEGER NOT NULL, name VARCHAR(25) NOT NULL, surname VARCHAR(40) NOT NULL, nickname VARCHAR(20) NOT NULL, password VARCHAR(60) NOT NULL, birth_date DATE NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A188FE64 ON user (nickname)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE pet (id INTEGER NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(25) NOT NULL, race VARCHAR(40) NOT NULL, birth_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E4529B85A76ED395 ON pet (user_id)');
        $this->addSql('CREATE TABLE hygiene (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EC9E4814F270FD45 ON hygiene (care_id)');
        $this->addSql('CREATE TABLE feeding (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A70BE25CF270FD45 ON feeding (care_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE vaccine');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE care');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE pet');
        $this->addSql('DROP TABLE hygiene');
        $this->addSql('DROP TABLE feeding');
    }
}
