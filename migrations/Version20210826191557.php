<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210826191557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D59286C17BC FOREIGN KEY (villes_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B117838E496 FOREIGN KEY (sites_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE participant_sortie ADD CONSTRAINT FK_8E436D739D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant_sortie ADD CONSTRAINT FK_8E436D73CC72D953 FOREIGN KEY (sortie_id) REFERENCES sortie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2D936B2FA FOREIGN KEY (organisateur_id) REFERENCES participant (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F27838E496 FOREIGN KEY (sites_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2A2C806AC FOREIGN KEY (lieux_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F2CA7E0C2E FOREIGN KEY (etats_id) REFERENCES etat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D59286C17BC');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B117838E496');
        $this->addSql('ALTER TABLE participant_sortie DROP FOREIGN KEY FK_8E436D739D1C3019');
        $this->addSql('ALTER TABLE participant_sortie DROP FOREIGN KEY FK_8E436D73CC72D953');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F2D936B2FA');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F27838E496');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F2A2C806AC');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F2CA7E0C2E');
    }
}
