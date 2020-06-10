<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610132219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, ref INT NOT NULL, title VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, picture VARCHAR(255) DEFAULT NULL, price INT NOT NULL, surface INT NOT NULL, adress VARCHAR(100) NOT NULL, postal_code INT NOT NULL, city VARCHAR(100) NOT NULL, number_of_parts INT DEFAULT NULL, number_of_bedrooms INT DEFAULT NULL, garage VARCHAR(30) DEFAULT NULL, parking VARCHAR(30) DEFAULT NULL, balcony TINYINT(1) DEFAULT NULL, garden TINYINT(1) DEFAULT NULL, floor VARCHAR(20) DEFAULT NULL, locality VARCHAR(100) DEFAULT NULL, rental TINYINT(1) DEFAULT NULL, sale TINYINT(1) DEFAULT NULL, apartment TINYINT(1) DEFAULT NULL, house TINYINT(1) DEFAULT NULL, budget INT DEFAULT NULL, furnished TINYINT(1) DEFAULT NULL, opposite TINYINT(1) DEFAULT NULL, caretaker TINYINT(1) DEFAULT NULL, handicap_access TINYINT(1) DEFAULT NULL, heater VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE property_search');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE property_search (id INT AUTO_INCREMENT NOT NULL, ref INT NOT NULL, title VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, price INT NOT NULL, surface INT NOT NULL, adress VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, postal_code INT NOT NULL, city VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, number_of_parts INT DEFAULT NULL, number_of_bedrooms INT DEFAULT NULL, garage VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, parking VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, balcony TINYINT(1) DEFAULT NULL, garden TINYINT(1) DEFAULT NULL, floor VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, locality VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, rental TINYINT(1) DEFAULT NULL, sale TINYINT(1) DEFAULT NULL, apartment TINYINT(1) DEFAULT NULL, house TINYINT(1) DEFAULT NULL, budget INT DEFAULT NULL, furnished TINYINT(1) DEFAULT NULL, opposite TINYINT(1) DEFAULT NULL, caretaker TINYINT(1) DEFAULT NULL, handicap_access TINYINT(1) DEFAULT NULL, heater VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE property');
    }
}
