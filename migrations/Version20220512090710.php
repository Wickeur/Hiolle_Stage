<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512090710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE les_ordi_hiolle_technologies (id INT AUTO_INCREMENT NOT NULL, nom_station_h_tech VARCHAR(255) NOT NULL, utilisateur_h_tech VARCHAR(255) DEFAULT NULL, marque_station_h_tech VARCHAR(255) DEFAULT NULL, adresse_mac_h_tech VARCHAR(255) DEFAULT NULL, tag_h_tech VARCHAR(255) DEFAULT NULL, microsoft_h_tech VARCHAR(255) DEFAULT NULL, station_acceuil_h_tech VARCHAR(255) DEFAULT NULL, moniteur_h_tech VARCHAR(255) DEFAULT NULL, clavier_souris_h_tech VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE les_ordi_hiolle_technologies');
    }
}
