<?php declare(strict_types = 1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180508154153 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_A7DD90B1F270FD45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vaccine AS SELECT id, care_id FROM vaccine');
        $this->addSql('DROP TABLE vaccine');
        $this->addSql('CREATE TABLE vaccine (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_A7DD90B1F270FD45 FOREIGN KEY (care_id) REFERENCES care (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO vaccine (id, care_id) SELECT id, care_id FROM __temp__vaccine');
        $this->addSql('DROP TABLE __temp__vaccine');
        $this->addSql('CREATE INDEX IDX_A7DD90B1F270FD45 ON vaccine (care_id)');
        $this->addSql('DROP INDEX IDX_D4E6F81A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__address AS SELECT id, user_id, number, street, floor, floor_information, cp, province, city FROM address');
        $this->addSql('DROP TABLE address');
        $this->addSql('CREATE TABLE address (id INTEGER NOT NULL, user_id INTEGER NOT NULL, number VARCHAR(4) NOT NULL COLLATE BINARY, street VARCHAR(40) NOT NULL COLLATE BINARY, floor VARCHAR(20) NOT NULL COLLATE BINARY, floor_information VARCHAR(20) NOT NULL COLLATE BINARY, cp INTEGER NOT NULL, province VARCHAR(20) NOT NULL COLLATE BINARY, city VARCHAR(20) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO address (id, user_id, number, street, floor, floor_information, cp, province, city) SELECT id, user_id, number, street, floor, floor_information, cp, province, city FROM __temp__address');
        $this->addSql('DROP TABLE __temp__address');
        $this->addSql('CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)');
        $this->addSql('DROP INDEX UNIQ_6113A845966F7FB6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__care AS SELECT id, pet_id FROM care');
        $this->addSql('DROP TABLE care');
        $this->addSql('CREATE TABLE care (id INTEGER NOT NULL, pet_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_6113A845966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO care (id, pet_id) SELECT id, pet_id FROM __temp__care');
        $this->addSql('DROP TABLE __temp__care');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6113A845966F7FB6 ON care (pet_id)');
        $this->addSql('DROP INDEX IDX_E4529B85A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__pet AS SELECT id, user_id, name, race, birth_date FROM pet');
        $this->addSql('DROP TABLE pet');
        $this->addSql('CREATE TABLE pet (id INTEGER NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(25) NOT NULL COLLATE BINARY, race VARCHAR(40) NOT NULL COLLATE BINARY, birth_date DATETIME NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_E4529B85A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO pet (id, user_id, name, race, birth_date) SELECT id, user_id, name, race, birth_date FROM __temp__pet');
        $this->addSql('DROP TABLE __temp__pet');
        $this->addSql('CREATE INDEX IDX_E4529B85A76ED395 ON pet (user_id)');
        $this->addSql('DROP INDEX IDX_EC9E4814F270FD45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__hygiene AS SELECT id, care_id FROM hygiene');
        $this->addSql('DROP TABLE hygiene');
        $this->addSql('CREATE TABLE hygiene (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_EC9E4814F270FD45 FOREIGN KEY (care_id) REFERENCES care (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO hygiene (id, care_id) SELECT id, care_id FROM __temp__hygiene');
        $this->addSql('DROP TABLE __temp__hygiene');
        $this->addSql('CREATE INDEX IDX_EC9E4814F270FD45 ON hygiene (care_id)');
        $this->addSql('DROP INDEX IDX_A70BE25CF270FD45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__feeding AS SELECT id, care_id FROM feeding');
        $this->addSql('DROP TABLE feeding');
        $this->addSql('CREATE TABLE feeding (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_A70BE25CF270FD45 FOREIGN KEY (care_id) REFERENCES care (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO feeding (id, care_id) SELECT id, care_id FROM __temp__feeding');
        $this->addSql('DROP TABLE __temp__feeding');
        $this->addSql('CREATE INDEX IDX_A70BE25CF270FD45 ON feeding (care_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_D4E6F81A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__address AS SELECT id, user_id, number, street, floor, floor_information, cp, province, city FROM address');
        $this->addSql('DROP TABLE address');
        $this->addSql('CREATE TABLE address (id INTEGER NOT NULL, user_id INTEGER NOT NULL, number VARCHAR(4) NOT NULL, street VARCHAR(40) NOT NULL, floor VARCHAR(20) NOT NULL, floor_information VARCHAR(20) NOT NULL, cp INTEGER NOT NULL, province VARCHAR(20) NOT NULL, city VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO address (id, user_id, number, street, floor, floor_information, cp, province, city) SELECT id, user_id, number, street, floor, floor_information, cp, province, city FROM __temp__address');
        $this->addSql('DROP TABLE __temp__address');
        $this->addSql('CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)');
        $this->addSql('DROP INDEX UNIQ_6113A845966F7FB6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__care AS SELECT id, pet_id FROM care');
        $this->addSql('DROP TABLE care');
        $this->addSql('CREATE TABLE care (id INTEGER NOT NULL, pet_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO care (id, pet_id) SELECT id, pet_id FROM __temp__care');
        $this->addSql('DROP TABLE __temp__care');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6113A845966F7FB6 ON care (pet_id)');
        $this->addSql('DROP INDEX IDX_A70BE25CF270FD45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__feeding AS SELECT id, care_id FROM feeding');
        $this->addSql('DROP TABLE feeding');
        $this->addSql('CREATE TABLE feeding (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO feeding (id, care_id) SELECT id, care_id FROM __temp__feeding');
        $this->addSql('DROP TABLE __temp__feeding');
        $this->addSql('CREATE INDEX IDX_A70BE25CF270FD45 ON feeding (care_id)');
        $this->addSql('DROP INDEX IDX_EC9E4814F270FD45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__hygiene AS SELECT id, care_id FROM hygiene');
        $this->addSql('DROP TABLE hygiene');
        $this->addSql('CREATE TABLE hygiene (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO hygiene (id, care_id) SELECT id, care_id FROM __temp__hygiene');
        $this->addSql('DROP TABLE __temp__hygiene');
        $this->addSql('CREATE INDEX IDX_EC9E4814F270FD45 ON hygiene (care_id)');
        $this->addSql('DROP INDEX IDX_E4529B85A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__pet AS SELECT id, user_id, name, race, birth_date FROM pet');
        $this->addSql('DROP TABLE pet');
        $this->addSql('CREATE TABLE pet (id INTEGER NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(25) NOT NULL, race VARCHAR(40) NOT NULL, birth_date DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO pet (id, user_id, name, race, birth_date) SELECT id, user_id, name, race, birth_date FROM __temp__pet');
        $this->addSql('DROP TABLE __temp__pet');
        $this->addSql('CREATE INDEX IDX_E4529B85A76ED395 ON pet (user_id)');
        $this->addSql('DROP INDEX IDX_A7DD90B1F270FD45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vaccine AS SELECT id, care_id FROM vaccine');
        $this->addSql('DROP TABLE vaccine');
        $this->addSql('CREATE TABLE vaccine (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO vaccine (id, care_id) SELECT id, care_id FROM __temp__vaccine');
        $this->addSql('DROP TABLE __temp__vaccine');
        $this->addSql('CREATE INDEX IDX_A7DD90B1F270FD45 ON vaccine (care_id)');
    }
}
