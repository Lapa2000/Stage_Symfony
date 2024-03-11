<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306115203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_fournisseur (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, raisonsocial LONGTEXT NOT NULL, categorie LONGTEXT NOT NULL, adresseadministratif LONGTEXT NOT NULL, nom LONGTEXT NOT NULL, prenom LONGTEXT NOT NULL, adresse LONGTEXT NOT NULL, tel LONGTEXT NOT NULL, tel2 LONGTEXT NOT NULL, fax LONGTEXT NOT NULL, email LONGTEXT NOT NULL, website LONGTEXT NOT NULL, image LONGTEXT NOT NULL, creepar LONGTEXT NOT NULL, datecreation DATE NOT NULL, datemodification DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avoir_clients (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, modepaimement LONGTEXT NOT NULL, numerocompte LONGTEXT NOT NULL, codeclient LONGTEXT NOT NULL, codefacture LONGTEXT NOT NULL, montanttotalfacture LONGTEXT NOT NULL, montantsaisie LONGTEXT NOT NULL, montantrestant LONGTEXT NOT NULL, datemontant LONGTEXT NOT NULL, creepar LONGTEXT NOT NULL, datecreation DATE NOT NULL, datemodification DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avoir_clients_history (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, modepaimement LONGTEXT NOT NULL, numerocompte LONGTEXT NOT NULL, codeclient LONGTEXT NOT NULL, codefacture LONGTEXT NOT NULL, montanttotalfacture LONGTEXT NOT NULL, montantsaisie LONGTEXT NOT NULL, ancienmontant LONGTEXT NOT NULL, payetawa LONGTEXT NOT NULL, restantmazal LONGTEXT NOT NULL, datemontant LONGTEXT NOT NULL, creepar LONGTEXT NOT NULL, datecreation DATE NOT NULL, datemodification DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avoir_fournisseurs (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, codeavoir LONGTEXT NOT NULL, codefournisseur LONGTEXT NOT NULL, codefacture LONGTEXT NOT NULL, montantrestant LONGTEXT NOT NULL, datemontant LONGTEXT NOT NULL, creepar LONGTEXT NOT NULL, datecreation DATE NOT NULL, datemodification DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_client (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, codedevis LONGTEXT NOT NULL, masociete LONGTEXT NOT NULL, monadresse LONGTEXT NOT NULL, montel LONGTEXT NOT NULL, monfax LONGTEXT NOT NULL, monregistre LONGTEXT NOT NULL, monmatricule LONGTEXT NOT NULL, clientcode LONGTEXT NOT NULL, clientraison LONGTEXT NOT NULL, clientnom LONGTEXT NOT NULL, clientprenom LONGTEXT NOT NULL, clientel LONGTEXT NOT NULL, clientfax LONGTEXT NOT NULL, clientadresse LONGTEXT NOT NULL, clientmatricule LONGTEXT NOT NULL, totalht LONGTEXT NOT NULL, tva LONGTEXT NOT NULL, totaltva LONGTEXT NOT NULL, remises LONGTEXT NOT NULL, timbres LONGTEXT NOT NULL, totalttc LONGTEXT NOT NULL, chauffeurnom LONGTEXT NOT NULL, chauffeurvehicule LONGTEXT NOT NULL, creationcode LONGTEXT NOT NULL, creationnom LONGTEXT NOT NULL, creationprenom LONGTEXT NOT NULL, creationdate LONGTEXT NOT NULL, creationheure LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agent_fournisseur');
        $this->addSql('DROP TABLE avoir_clients');
        $this->addSql('DROP TABLE avoir_clients_history');
        $this->addSql('DROP TABLE avoir_fournisseurs');
        $this->addSql('DROP TABLE commande_client');
    }
}
