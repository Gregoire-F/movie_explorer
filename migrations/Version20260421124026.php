<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260421124026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel_soiree CHANGE date_reservation date_reservation DATE NOT NULL');
        $this->addSql('ALTER TABLE soiree CHANGE date_reservation_debut date_reservation_debut DATE NOT NULL, CHANGE date_reservation_fin date_reservation_fin DATE NOT NULL');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(30) NOT NULL, ADD last_name VARCHAR(30) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel_soiree CHANGE date_reservation date_reservation DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE soiree CHANGE date_reservation_debut date_reservation_debut DATE DEFAULT NULL, CHANGE date_reservation_fin date_reservation_fin DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name');
    }
}
