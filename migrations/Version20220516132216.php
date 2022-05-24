<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516132216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE les_ordi_hiolle_technologies ADD iplan_h_tech VARCHAR(255) DEFAULT NULL, ADD ipwlan_h_tech VARCHAR(255) DEFAULT NULL, ADD produit_sn_h_tech VARCHAR(255) DEFAULT NULL, ADD adresse_mac_2_h_tech VARCHAR(255) DEFAULT NULL, ADD clipper_local_h_tech VARCHAR(255) DEFAULT NULL, ADD clipper_tse_h_tech VARCHAR(255) DEFAULT NULL, ADD cle_clip_h_tech VARCHAR(255) DEFAULT NULL, ADD observation_h_tech VARCHAR(255) DEFAULT NULL, ADD mdp_admin_local_h_tech VARCHAR(255) DEFAULT NULL, ADD service_h_tech VARCHAR(255) DEFAULT NULL, ADD prix_achat_h_tech VARCHAR(255) DEFAULT NULL, ADD silog VARCHAR(255) DEFAULT NULL, ADD num_bureau_h_tech VARCHAR(255) DEFAULT NULL, ADD ref_h_tech VARCHAR(255) DEFAULT NULL, ADD processeur_h_tech VARCHAR(255) DEFAULT NULL, ADD memoire_h_tech VARCHAR(255) DEFAULT NULL, ADD disque_dur_h_tech VARCHAR(255) DEFAULT NULL, ADD date_achat VARCHAR(255) DEFAULT NULL, ADD garantie_h_tech VARCHAR(255) DEFAULT NULL, ADD fo_p_h_tech VARCHAR(255) DEFAULT NULL, ADD ecran_h_tech VARCHAR(255) DEFAULT NULL, ADD syst_exploi_h_tech VARCHAR(255) DEFAULT NULL, ADD express_service_code_h_tech VARCHAR(255) DEFAULT NULL, ADD carepack_hp_h_tech VARCHAR(255) DEFAULT NULL, ADD carepack_date VARCHAR(255) DEFAULT NULL, ADD product_h_tech VARCHAR(255) DEFAULT NULL, ADD num_serie_h_tech VARCHAR(255) DEFAULT NULL, ADD iso_h_tech VARCHAR(255) DEFAULT NULL, ADD imprimante_h_tech VARCHAR(255) DEFAULT NULL, ADD reference_h_tech VARCHAR(255) DEFAULT NULL, ADD sacoche_h_tech VARCHAR(255) DEFAULT NULL, ADD pack_office_h_tech VARCHAR(255) DEFAULT NULL, ADD antivirus_h_tech VARCHAR(255) DEFAULT NULL, ADD scan_h_tech VARCHAR(255) DEFAULT NULL, ADD silog_h_tech VARCHAR(255) DEFAULT NULL, ADD autocad_h_tech VARCHAR(255) DEFAULT NULL, ADD autres_h_tech VARCHAR(255) DEFAULT NULL, ADD msproject_h_tech VARCHAR(255) DEFAULT NULL, ADD identifie_h_tech VARCHAR(255) DEFAULT NULL, ADD script_demar_h_tech VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE les_ordi_hiolle_technologies DROP iplan_h_tech, DROP ipwlan_h_tech, DROP produit_sn_h_tech, DROP adresse_mac_2_h_tech, DROP clipper_local_h_tech, DROP clipper_tse_h_tech, DROP cle_clip_h_tech, DROP observation_h_tech, DROP mdp_admin_local_h_tech, DROP service_h_tech, DROP prix_achat_h_tech, DROP silog, DROP num_bureau_h_tech, DROP ref_h_tech, DROP processeur_h_tech, DROP memoire_h_tech, DROP disque_dur_h_tech, DROP date_achat, DROP garantie_h_tech, DROP fo_p_h_tech, DROP ecran_h_tech, DROP syst_exploi_h_tech, DROP express_service_code_h_tech, DROP carepack_hp_h_tech, DROP carepack_date, DROP product_h_tech, DROP num_serie_h_tech, DROP iso_h_tech, DROP imprimante_h_tech, DROP reference_h_tech, DROP sacoche_h_tech, DROP pack_office_h_tech, DROP antivirus_h_tech, DROP scan_h_tech, DROP silog_h_tech, DROP autocad_h_tech, DROP autres_h_tech, DROP msproject_h_tech, DROP identifie_h_tech, DROP script_demar_h_tech');
    }
}
