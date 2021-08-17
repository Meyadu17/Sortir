<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210817101900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etats DROP no_etat');
        $this->addSql('ALTER TABLE lieux DROP no_lieu');
        $this->addSql('ALTER TABLE participants DROP no_participant');
        $this->addSql('ALTER TABLE sites DROP no_site');
        $this->addSql('ALTER TABLE sorties DROP no_sortie');
        $this->addSql('ALTER TABLE villes DROP no_ville');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etats ADD no_etat INT NOT NULL');
        $this->addSql('ALTER TABLE lieux ADD no_lieu INT NOT NULL');
        $this->addSql('ALTER TABLE participants ADD no_participant INT NOT NULL');
        $this->addSql('ALTER TABLE sites ADD no_site INT NOT NULL');
        $this->addSql('ALTER TABLE sorties ADD no_sortie INT NOT NULL');
        $this->addSql('ALTER TABLE villes ADD no_ville INT NOT NULL');
    }
}
