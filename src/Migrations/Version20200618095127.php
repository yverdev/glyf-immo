<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200618095127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property ADD picture_kitchen VARCHAR(255) DEFAULT NULL, ADD picture_bedroom VARCHAR(255) DEFAULT NULL, ADD picture_bathroom VARCHAR(255) DEFAULT NULL, ADD picture_livingroom VARCHAR(255) DEFAULT NULL, CHANGE picture picture VARCHAR(255) DEFAULT NULL, CHANGE garage garage TINYINT(1) DEFAULT NULL, CHANGE parking parking TINYINT(1) DEFAULT NULL, CHANGE balcony balcony TINYINT(1) DEFAULT NULL, CHANGE garden garden TINYINT(1) DEFAULT NULL, CHANGE floor floor INT DEFAULT NULL, CHANGE rental rental TINYINT(1) DEFAULT NULL, CHANGE sale sale TINYINT(1) DEFAULT NULL, CHANGE furnished furnished TINYINT(1) DEFAULT NULL, CHANGE caretaker caretaker TINYINT(1) DEFAULT NULL, CHANGE handicap_access handicap_access TINYINT(1) DEFAULT NULL, CHANGE heater heater VARCHAR(100) DEFAULT NULL, CHANGE rooms rooms INT DEFAULT NULL, CHANGE bedrooms bedrooms INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE property_id property_id INT DEFAULT NULL, CHANGE phone phone VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE phone phone VARCHAR(10) DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact CHANGE property_id property_id INT DEFAULT NULL, CHANGE phone phone VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE property DROP picture_kitchen, DROP picture_bedroom, DROP picture_bathroom, DROP picture_livingroom, CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rooms rooms INT DEFAULT NULL, CHANGE bedrooms bedrooms INT DEFAULT NULL, CHANGE garage garage VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE parking parking VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE balcony balcony TINYINT(1) DEFAULT \'NULL\', CHANGE garden garden TINYINT(1) DEFAULT \'NULL\', CHANGE floor floor VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rental rental TINYINT(1) DEFAULT \'NULL\', CHANGE sale sale TINYINT(1) DEFAULT \'NULL\', CHANGE furnished furnished TINYINT(1) DEFAULT \'NULL\', CHANGE caretaker caretaker TINYINT(1) DEFAULT \'NULL\', CHANGE handicap_access handicap_access TINYINT(1) DEFAULT \'NULL\', CHANGE heater heater VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE phone phone VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
