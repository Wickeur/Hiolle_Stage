<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519084700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_mac_hiolle_tech CHANGE ip_cetam_h_tech ip_cetam_h_tech INT DEFAULT NULL, CHANGE cetam_adr_h_tech cetam_adr_h_tech VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_mac_hiolle_tech CHANGE ip_cetam_h_tech ip_cetam_h_tech VARCHAR(255) DEFAULT NULL, CHANGE cetam_adr_h_tech cetam_adr_h_tech INT DEFAULT NULL');
    }
}
