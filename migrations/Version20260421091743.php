<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260421091743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel ADD nom VARCHAR(100) NOT NULL, DROP date_reservation_debut, DROP date_reservation_fin, DROP materiel, DROP soiree');
        $this->addSql('ALTER TABLE materiel_soiree ADD date_reservation DATE NOT NULL, ADD materiel_id INT NOT NULL, ADD soiree_id INT NOT NULL, DROP date_reservation_debut, DROP date_reservation_fin, DROP materiel, DROP soiree');
        $this->addSql('ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE516880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id)');
        $this->addSql('ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE5BA021F7B FOREIGN KEY (soiree_id) REFERENCES soiree (id)');
        $this->addSql('CREATE INDEX IDX_DFC1EAE516880AAF ON materiel_soiree (materiel_id)');
        $this->addSql('CREATE INDEX IDX_DFC1EAE5BA021F7B ON materiel_soiree (soiree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel ADD date_reservation_debut DATE NOT NULL, ADD date_reservation_fin DATE NOT NULL, ADD soiree VARCHAR(100) NOT NULL, CHANGE nom materiel VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE materiel_soiree DROP FOREIGN KEY FK_DFC1EAE516880AAF');
        $this->addSql('ALTER TABLE materiel_soiree DROP FOREIGN KEY FK_DFC1EAE5BA021F7B');
        $this->addSql('DROP INDEX IDX_DFC1EAE516880AAF ON materiel_soiree');
        $this->addSql('DROP INDEX IDX_DFC1EAE5BA021F7B ON materiel_soiree');
        $this->addSql('ALTER TABLE materiel_soiree ADD date_reservation_fin DATE NOT NULL, ADD materiel VARCHAR(100) NOT NULL, ADD soiree VARCHAR(100) NOT NULL, DROP materiel_id, DROP soiree_id, CHANGE date_reservation date_reservation_debut DATE NOT NULL');
    }
}
