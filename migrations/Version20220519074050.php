<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519074050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse_mac_hiolle_tech (id INT AUTO_INCREMENT NOT NULL, ip_adr_h_tech INT DEFAULT NULL, ip_cetam_h_tech VARCHAR(255) DEFAULT NULL, mac_adr_h_tech VARCHAR(255) NOT NULL, utilisateur_adr_h_tech VARCHAR(255) DEFAULT NULL, hiolle_adr_h_tech VARCHAR(255) DEFAULT NULL, cetam_adr_h_tech INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresse_mac_hiolle_tech');
    }
}
