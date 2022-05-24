<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220505133208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nouveau_entrant (id INT AUTO_INCREMENT NOT NULL, nom_nouv VARCHAR(255) NOT NULL, prenom_nouv VARCHAR(255) NOT NULL, societe_nouv VARCHAR(255) NOT NULL, service_nouv VARCHAR(255) NOT NULL, materiel_pc_nouv TINYINT(1) NOT NULL, logiciel_nouv TINYINT(1) NOT NULL, sacoche_nouv TINYINT(1) NOT NULL, autre_demande_nouv VARCHAR(255) DEFAULT NULL, acces_reseau_nouv TINYINT(1) NOT NULL, precise_reseau_nouv VARCHAR(255) DEFAULT NULL, adresse_nouv TINYINT(1) NOT NULL, precise_adresse VARCHAR(255) DEFAULT NULL, date_arrivee DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE nouveau_entrant');
    }
}
