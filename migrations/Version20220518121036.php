<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220518121036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE serveurs_hiolle_tech (id INT AUTO_INCREMENT NOT NULL, nom_serv_h_tech VARCHAR(255) NOT NULL, salle_serv_h_tech VARCHAR(255) DEFAULT NULL, ip_serv_h_tech VARCHAR(255) DEFAULT NULL, dc_serv_h_tech VARCHAR(255) DEFAULT NULL, role_serv_h_tech VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE serveurs_hiolle_tech');
    }
}
