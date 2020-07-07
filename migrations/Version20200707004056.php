<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200707004056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre CHANGE num_batiment num_batiment VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD matricule VARCHAR(30) NOT NULL, ADD nom VARCHAR(30) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD email VARCHAR(30) NOT NULL, ADD telephone VARCHAR(30) NOT NULL, ADD date_naissance DATE NOT NULL, ADD type_etudiant VARCHAR(30) NOT NULL, ADD pension VARCHAR(10) DEFAULT NULL, ADD adresse VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre CHANGE num_batiment num_batiment INT NOT NULL');
        $this->addSql('ALTER TABLE etudiant DROP matricule, DROP nom, DROP prenom, DROP email, DROP telephone, DROP date_naissance, DROP type_etudiant, DROP pension, DROP adresse');
    }
}
