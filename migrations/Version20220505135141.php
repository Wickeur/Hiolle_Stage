<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220505135141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nouveau_entrant DROP precise_reseau_nouv, DROP precise_adresse, CHANGE acces_reseau_nouv acces_reseau_nouv VARCHAR(255) NOT NULL, CHANGE adresse_nouv adresse_nouv VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nouveau_entrant ADD precise_reseau_nouv VARCHAR(255) DEFAULT NULL, ADD precise_adresse VARCHAR(255) DEFAULT NULL, CHANGE acces_reseau_nouv acces_reseau_nouv TINYINT(1) NOT NULL, CHANGE adresse_nouv adresse_nouv TINYINT(1) NOT NULL');
    }
}
