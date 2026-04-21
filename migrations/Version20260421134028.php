<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260421134028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel_soiree ADD date_reservation_fin DATE NOT NULL, CHANGE date_reservation date_reservation_debut DATE NOT NULL');
        $this->addSql('ALTER TABLE soiree DROP date_reservation_debut, DROP date_reservation_fin');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel_soiree ADD date_reservation DATE NOT NULL, DROP date_reservation_debut, DROP date_reservation_fin');
        $this->addSql('ALTER TABLE soiree ADD date_reservation_debut DATE NOT NULL, ADD date_reservation_fin DATE NOT NULL');
    }
}
