<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520120819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE office_licence_htech (id INT AUTO_INCREMENT NOT NULL, poste_o_l_h_tech VARCHAR(255) NOT NULL, utilisateur_o_l_h_tech VARCHAR(255) DEFAULT NULL, type_o_l_h_tech VARCHAR(255) DEFAULT NULL, licence_o_l_h_tech VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_licence_htech (id INT AUTO_INCREMENT NOT NULL, poste_p_l_h_tech VARCHAR(255) NOT NULL, utilisateur_p_l_h_tech VARCHAR(255) DEFAULT NULL, licence_p_l_h_tech VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE office_licence_htech');
        $this->addSql('DROP TABLE project_licence_htech');
    }
}
