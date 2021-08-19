<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210817132256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieu ADD villes_id INT NOT NULL');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D59286C17BC FOREIGN KEY (villes_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_2F577D59286C17BC ON lieu (villes_id)');
        $this->addSql('ALTER TABLE participant ADD sites_id INT NOT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B117838E496 FOREIGN KEY (sites_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_D79F6B117838E496 ON participant (sites_id)');
        $this->addSql('ALTER TABLE sortie ADD sites_id INT NOT NULL, ADD lieux_id INT NOT NULL, ADD etats_id INT NOT NULL, CHANGE nom_sortie nom VARCHAR(30) NOT NULL, CHANGE etat_sortie etat INT DEFAULT NULL, CHANGE url_photo_sortie url_photo VARCHAR(250) DEFAULT NULL');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F27838E496 FOREIGN KEY (sites_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2A2C806AC FOREIGN KEY (lieux_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2CA7E0C2E FOREIGN KEY (etats_id) REFERENCES etat (id)');
        $this->addSql('CREATE INDEX IDX_3C3FD3F27838E496 ON sortie (sites_id)');
        $this->addSql('CREATE INDEX IDX_3C3FD3F2A2C806AC ON sortie (lieux_id)');
        $this->addSql('CREATE INDEX IDX_3C3FD3F2CA7E0C2E ON sortie (etats_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D59286C17BC');
        $this->addSql('DROP INDEX IDX_2F577D59286C17BC ON lieu');
        $this->addSql('ALTER TABLE lieu DROP villes_id');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B117838E496');
        $this->addSql('DROP INDEX IDX_D79F6B117838E496 ON participant');
        $this->addSql('ALTER TABLE participant DROP sites_id');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F27838E496');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F2A2C806AC');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F2CA7E0C2E');
        $this->addSql('DROP INDEX IDX_3C3FD3F27838E496 ON sortie');
        $this->addSql('DROP INDEX IDX_3C3FD3F2A2C806AC ON sortie');
        $this->addSql('DROP INDEX IDX_3C3FD3F2CA7E0C2E ON sortie');
        $this->addSql('ALTER TABLE sortie DROP sites_id, DROP lieux_id, DROP etats_id, CHANGE nom nom_sortie VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat etat_sortie INT DEFAULT NULL, CHANGE url_photo url_photo_sortie VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
