<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514190930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, client_name VARCHAR(100) NOT NULL, mail VARCHAR(100) NOT NULL, phone INT NOT NULL, birthday DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membership (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, membership_type_id INT DEFAULT NULL, date_begin DATE NOT NULL, date_end DATE NOT NULL, INDEX IDX_86FFD28519EB6921 (client_id), INDEX IDX_86FFD2854CE11AC2 (membership_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membership_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD28519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD2854CE11AC2 FOREIGN KEY (membership_type_id) REFERENCES membership_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD28519EB6921');
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD2854CE11AC2');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE membership');
        $this->addSql('DROP TABLE membership_type');
    }
}
