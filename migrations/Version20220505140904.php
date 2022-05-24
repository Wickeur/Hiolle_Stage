<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220505140904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nouveau_entrant CHANGE materiel_pc_nouv materiel_pc_nouv VARCHAR(255) NOT NULL, CHANGE logiciel_nouv logiciel_nouv VARCHAR(255) NOT NULL, CHANGE sacoche_nouv sacoche_nouv VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nouveau_entrant CHANGE materiel_pc_nouv materiel_pc_nouv TINYINT(1) NOT NULL, CHANGE logiciel_nouv logiciel_nouv TINYINT(1) NOT NULL, CHANGE sacoche_nouv sacoche_nouv TINYINT(1) NOT NULL');
    }
}
