<?php declare(strict_types = 1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180505082945 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE address (id INTEGER NOT NULL, user_id INTEGER NOT NULL, number VARCHAR(4) NOT NULL, street VARCHAR(40) NOT NULL, floor VARCHAR(20) NOT NULL, floor_information VARCHAR(20) NOT NULL, cp INTEGER NOT NULL, province VARCHAR(20) NOT NULL, city VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)');
        $this->addSql('CREATE TABLE care (id INTEGER NOT NULL, pet_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6113A845966F7FB6 ON care (pet_id)');
        $this->addSql('CREATE TABLE feeding (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A70BE25CF270FD45 ON feeding (care_id)');
        $this->addSql('CREATE TABLE hygiene (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EC9E4814F270FD45 ON hygiene (care_id)');
        $this->addSql('CREATE TABLE pet (id INTEGER NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(25) NOT NULL, race VARCHAR(40) NOT NULL, birth_date DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E4529B85A76ED395 ON pet (user_id)');
        $this->addSql('CREATE TABLE vaccine (id INTEGER NOT NULL, care_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A7DD90B1F270FD45 ON vaccine (care_id)');
        $this->addSql('DROP TABLE alimentacion');
        $this->addSql('DROP TABLE cuidado');
        $this->addSql('DROP TABLE direccion');
        $this->addSql('DROP TABLE higiene');
        $this->addSql('DROP TABLE mascota');
        $this->addSql('DROP TABLE vacuna');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE alimentacion (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43ABB086866C74FC ON alimentacion (cuidado_id)');
        $this->addSql('CREATE TABLE cuidado (id INTEGER NOT NULL, mascota_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C9321361FB60C59E ON cuidado (mascota_id)');
        $this->addSql('CREATE TABLE direccion (id INTEGER NOT NULL, user_id INTEGER NOT NULL, numero VARCHAR(4) NOT NULL COLLATE BINARY, calle VARCHAR(40) NOT NULL COLLATE BINARY, piso VARCHAR(20) NOT NULL COLLATE BINARY, especificacion_piso VARCHAR(20) NOT NULL COLLATE BINARY, cp INTEGER NOT NULL, provincia VARCHAR(20) NOT NULL COLLATE BINARY, poblacion VARCHAR(20) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F384BE95A76ED395 ON direccion (user_id)');
        $this->addSql('CREATE TABLE higiene (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EF484A8F866C74FC ON higiene (cuidado_id)');
        $this->addSql('CREATE TABLE mascota (id INTEGER NOT NULL, user_id INTEGER NOT NULL, nombre VARCHAR(25) NOT NULL COLLATE BINARY, raza VARCHAR(40) NOT NULL COLLATE BINARY, fecha_nacimiento DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_11298D77A76ED395 ON mascota (user_id)');
        $this->addSql('CREATE TABLE vacuna (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7289F433866C74FC ON vacuna (cuidado_id)');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE care');
        $this->addSql('DROP TABLE feeding');
        $this->addSql('DROP TABLE hygiene');
        $this->addSql('DROP TABLE pet');
        $this->addSql('DROP TABLE vaccine');
    }
}
