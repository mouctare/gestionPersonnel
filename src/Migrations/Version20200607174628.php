<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200607174628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE availability (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, start DATETIME NOT NULL, date_end DATETIME NOT NULL, INDEX IDX_3FB7A2BF79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_site_id INT NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, INDEX IDX_D499BFF679F37AE5 (id_user_id), INDEX IDX_D499BFF62820BF36 (id_site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_site_id INT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, description VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, INDEX IDX_C42F778479F37AE5 (id_user_id), INDEX IDX_C42F77842820BF36 (id_site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, date_start DATETIME NOT NULL, type_service VARCHAR(255) NOT NULL, lat NUMERIC(10, 8) NOT NULL, lng NUMERIC(11, 8) NOT NULL, INDEX IDX_E19D9AD279F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, street_number INT NOT NULL, street_name VARCHAR(255) NOT NULL, building_name VARCHAR(255) NOT NULL, post_code INT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, card_pro VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF679F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF62820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F778479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77842820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD279F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF62820BF36');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77842820BF36');
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BF79F37AE5');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF679F37AE5');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F778479F37AE5');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD279F37AE5');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE user');
    }
}
