<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517091204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE les_ordi_hiolle_technologies DROP microsoft_h_tech, DROP moniteur_h_tech');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE les_ordi_hiolle_technologies ADD microsoft_h_tech VARCHAR(255) DEFAULT NULL, ADD moniteur_h_tech VARCHAR(255) DEFAULT NULL');
    }
}
