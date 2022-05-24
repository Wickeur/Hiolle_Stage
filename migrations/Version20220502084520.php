<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502084520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amodiag (id INT AUTO_INCREMENT NOT NULL, nom_de_la_station VARCHAR(255) NOT NULL, utilisateur_habituel VARCHAR(255) NOT NULL, marque_de_la_station VARCHAR(255) DEFAULT NULL, adresse_mac VARCHAR(255) DEFAULT NULL, tag VARCHAR(255) DEFAULT NULL, microsoft_office VARCHAR(255) DEFAULT NULL, station_acceuil VARCHAR(255) DEFAULT NULL, moniteur VARCHAR(255) DEFAULT NULL, clavier_souris VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nom_de_la_station (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE amodiag');
        $this->addSql('DROP TABLE nom_de_la_station');
    }
}
