<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617101616 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property CHANGE picture picture VARCHAR(255) DEFAULT NULL, CHANGE garage garage VARCHAR(30) DEFAULT NULL, CHANGE parking parking VARCHAR(30) DEFAULT NULL, CHANGE balcony balcony TINYINT(1) DEFAULT NULL, CHANGE garden garden TINYINT(1) DEFAULT NULL, CHANGE floor floor VARCHAR(20) DEFAULT NULL, CHANGE rental rental TINYINT(1) DEFAULT NULL, CHANGE sale sale TINYINT(1) DEFAULT NULL, CHANGE furnished furnished TINYINT(1) DEFAULT NULL, CHANGE opposite opposite TINYINT(1) DEFAULT NULL, CHANGE caretaker caretaker TINYINT(1) DEFAULT NULL, CHANGE handicap_access handicap_access TINYINT(1) DEFAULT NULL, CHANGE heater heater VARCHAR(100) DEFAULT NULL, CHANGE rooms rooms INT DEFAULT NULL, CHANGE bedrooms bedrooms INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD property_id INT DEFAULT NULL, CHANGE phone phone VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638549213EC ON contact (property_id)');
        $this->addSql('ALTER TABLE user CHANGE phone phone VARCHAR(10) DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638549213EC');
        $this->addSql('DROP INDEX IDX_4C62E638549213EC ON contact');
        $this->addSql('ALTER TABLE contact DROP property_id, CHANGE phone phone VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE property CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rooms rooms INT DEFAULT NULL, CHANGE bedrooms bedrooms INT DEFAULT NULL, CHANGE garage garage VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE parking parking VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE balcony balcony TINYINT(1) DEFAULT \'NULL\', CHANGE garden garden TINYINT(1) DEFAULT \'NULL\', CHANGE floor floor VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rental rental TINYINT(1) DEFAULT \'NULL\', CHANGE sale sale TINYINT(1) DEFAULT \'NULL\', CHANGE furnished furnished TINYINT(1) DEFAULT \'NULL\', CHANGE opposite opposite TINYINT(1) DEFAULT \'NULL\', CHANGE caretaker caretaker TINYINT(1) DEFAULT \'NULL\', CHANGE handicap_access handicap_access TINYINT(1) DEFAULT \'NULL\', CHANGE heater heater VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE phone phone VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
