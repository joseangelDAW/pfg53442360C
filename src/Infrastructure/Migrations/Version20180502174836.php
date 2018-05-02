<?php declare(strict_types = 1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180502174836 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_EF484A8F866C74FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__higiene AS SELECT id, cuidado_id FROM higiene');
        $this->addSql('DROP TABLE higiene');
        $this->addSql('CREATE TABLE higiene (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_EF484A8F866C74FC FOREIGN KEY (cuidado_id) REFERENCES cuidado (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO higiene (id, cuidado_id) SELECT id, cuidado_id FROM __temp__higiene');
        $this->addSql('DROP TABLE __temp__higiene');
        $this->addSql('CREATE INDEX IDX_EF484A8F866C74FC ON higiene (cuidado_id)');
        $this->addSql('DROP INDEX IDX_43ABB086866C74FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__alimentacion AS SELECT id, cuidado_id FROM alimentacion');
        $this->addSql('DROP TABLE alimentacion');
        $this->addSql('CREATE TABLE alimentacion (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_43ABB086866C74FC FOREIGN KEY (cuidado_id) REFERENCES cuidado (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO alimentacion (id, cuidado_id) SELECT id, cuidado_id FROM __temp__alimentacion');
        $this->addSql('DROP TABLE __temp__alimentacion');
        $this->addSql('CREATE INDEX IDX_43ABB086866C74FC ON alimentacion (cuidado_id)');
        $this->addSql('DROP INDEX IDX_F384BE95A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__direccion AS SELECT id, user_id, numero, calle, piso, especificacion_piso, cp, provincia, poblacion FROM direccion');
        $this->addSql('DROP TABLE direccion');
        $this->addSql('CREATE TABLE direccion (id INTEGER NOT NULL, user_id INTEGER NOT NULL, numero VARCHAR(4) NOT NULL COLLATE BINARY, calle VARCHAR(40) NOT NULL COLLATE BINARY, piso VARCHAR(20) NOT NULL COLLATE BINARY, especificacion_piso VARCHAR(20) NOT NULL COLLATE BINARY, cp INTEGER NOT NULL, provincia VARCHAR(20) NOT NULL COLLATE BINARY, poblacion VARCHAR(20) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_F384BE95A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO direccion (id, user_id, numero, calle, piso, especificacion_piso, cp, provincia, poblacion) SELECT id, user_id, numero, calle, piso, especificacion_piso, cp, provincia, poblacion FROM __temp__direccion');
        $this->addSql('DROP TABLE __temp__direccion');
        $this->addSql('CREATE INDEX IDX_F384BE95A76ED395 ON direccion (user_id)');
        $this->addSql('DROP INDEX IDX_11298D77A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__mascota AS SELECT id, user_id, nombre, raza, fecha_nacimiento FROM mascota');
        $this->addSql('DROP TABLE mascota');
        $this->addSql('CREATE TABLE mascota (id INTEGER NOT NULL, user_id INTEGER NOT NULL, nombre VARCHAR(25) NOT NULL COLLATE BINARY, raza VARCHAR(40) NOT NULL COLLATE BINARY, fecha_nacimiento DATETIME NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_11298D77A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO mascota (id, user_id, nombre, raza, fecha_nacimiento) SELECT id, user_id, nombre, raza, fecha_nacimiento FROM __temp__mascota');
        $this->addSql('DROP TABLE __temp__mascota');
        $this->addSql('CREATE INDEX IDX_11298D77A76ED395 ON mascota (user_id)');
        $this->addSql('DROP INDEX UNIQ_C9321361FB60C59E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__cuidado AS SELECT id, mascota_id FROM cuidado');
        $this->addSql('DROP TABLE cuidado');
        $this->addSql('CREATE TABLE cuidado (id INTEGER NOT NULL, mascota_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_C9321361FB60C59E FOREIGN KEY (mascota_id) REFERENCES mascota (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO cuidado (id, mascota_id) SELECT id, mascota_id FROM __temp__cuidado');
        $this->addSql('DROP TABLE __temp__cuidado');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C9321361FB60C59E ON cuidado (mascota_id)');
        $this->addSql('DROP INDEX IDX_7289F433866C74FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vacuna AS SELECT id, cuidado_id FROM vacuna');
        $this->addSql('DROP TABLE vacuna');
        $this->addSql('CREATE TABLE vacuna (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_7289F433866C74FC FOREIGN KEY (cuidado_id) REFERENCES cuidado (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO vacuna (id, cuidado_id) SELECT id, cuidado_id FROM __temp__vacuna');
        $this->addSql('DROP TABLE __temp__vacuna');
        $this->addSql('CREATE INDEX IDX_7289F433866C74FC ON vacuna (cuidado_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_43ABB086866C74FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__alimentacion AS SELECT id, cuidado_id FROM alimentacion');
        $this->addSql('DROP TABLE alimentacion');
        $this->addSql('CREATE TABLE alimentacion (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO alimentacion (id, cuidado_id) SELECT id, cuidado_id FROM __temp__alimentacion');
        $this->addSql('DROP TABLE __temp__alimentacion');
        $this->addSql('CREATE INDEX IDX_43ABB086866C74FC ON alimentacion (cuidado_id)');
        $this->addSql('DROP INDEX UNIQ_C9321361FB60C59E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__cuidado AS SELECT id, mascota_id FROM cuidado');
        $this->addSql('DROP TABLE cuidado');
        $this->addSql('CREATE TABLE cuidado (id INTEGER NOT NULL, mascota_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO cuidado (id, mascota_id) SELECT id, mascota_id FROM __temp__cuidado');
        $this->addSql('DROP TABLE __temp__cuidado');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C9321361FB60C59E ON cuidado (mascota_id)');
        $this->addSql('DROP INDEX IDX_F384BE95A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__direccion AS SELECT id, user_id, numero, calle, piso, especificacion_piso, cp, provincia, poblacion FROM direccion');
        $this->addSql('DROP TABLE direccion');
        $this->addSql('CREATE TABLE direccion (id INTEGER NOT NULL, user_id INTEGER NOT NULL, numero VARCHAR(4) NOT NULL, calle VARCHAR(40) NOT NULL, piso VARCHAR(20) NOT NULL, especificacion_piso VARCHAR(20) NOT NULL, cp INTEGER NOT NULL, provincia VARCHAR(20) NOT NULL, poblacion VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO direccion (id, user_id, numero, calle, piso, especificacion_piso, cp, provincia, poblacion) SELECT id, user_id, numero, calle, piso, especificacion_piso, cp, provincia, poblacion FROM __temp__direccion');
        $this->addSql('DROP TABLE __temp__direccion');
        $this->addSql('CREATE INDEX IDX_F384BE95A76ED395 ON direccion (user_id)');
        $this->addSql('DROP INDEX IDX_EF484A8F866C74FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__higiene AS SELECT id, cuidado_id FROM higiene');
        $this->addSql('DROP TABLE higiene');
        $this->addSql('CREATE TABLE higiene (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO higiene (id, cuidado_id) SELECT id, cuidado_id FROM __temp__higiene');
        $this->addSql('DROP TABLE __temp__higiene');
        $this->addSql('CREATE INDEX IDX_EF484A8F866C74FC ON higiene (cuidado_id)');
        $this->addSql('DROP INDEX IDX_11298D77A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__mascota AS SELECT id, user_id, nombre, raza, fecha_nacimiento FROM mascota');
        $this->addSql('DROP TABLE mascota');
        $this->addSql('CREATE TABLE mascota (id INTEGER NOT NULL, user_id INTEGER NOT NULL, nombre VARCHAR(25) NOT NULL, raza VARCHAR(40) NOT NULL, fecha_nacimiento DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO mascota (id, user_id, nombre, raza, fecha_nacimiento) SELECT id, user_id, nombre, raza, fecha_nacimiento FROM __temp__mascota');
        $this->addSql('DROP TABLE __temp__mascota');
        $this->addSql('CREATE INDEX IDX_11298D77A76ED395 ON mascota (user_id)');
        $this->addSql('DROP INDEX IDX_7289F433866C74FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vacuna AS SELECT id, cuidado_id FROM vacuna');
        $this->addSql('DROP TABLE vacuna');
        $this->addSql('CREATE TABLE vacuna (id INTEGER NOT NULL, cuidado_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO vacuna (id, cuidado_id) SELECT id, cuidado_id FROM __temp__vacuna');
        $this->addSql('DROP TABLE __temp__vacuna');
        $this->addSql('CREATE INDEX IDX_7289F433866C74FC ON vacuna (cuidado_id)');
    }
}
