<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200607102928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE availability ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3FB7A2BF79F37AE5 ON availability (id_user_id)');
        $this->addSql('ALTER TABLE planning ADD id_site_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF62820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_D499BFF62820BF36 ON planning (id_site_id)');
        $this->addSql('ALTER TABLE report ADD id_user_id INT NOT NULL, ADD id_site_id INT NOT NULL');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F778479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77842820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_C42F778479F37AE5 ON report (id_user_id)');
        $this->addSql('CREATE INDEX IDX_C42F77842820BF36 ON report (id_site_id)');
        $this->addSql('ALTER TABLE service ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD279F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD279F37AE5 ON service (id_user_id)');
        $this->addSql('ALTER TABLE site ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_694309E479F37AE5 ON site (id_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BF79F37AE5');
        $this->addSql('DROP INDEX IDX_3FB7A2BF79F37AE5 ON availability');
        $this->addSql('ALTER TABLE availability DROP id_user_id');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF62820BF36');
        $this->addSql('DROP INDEX IDX_D499BFF62820BF36 ON planning');
        $this->addSql('ALTER TABLE planning DROP id_site_id');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F778479F37AE5');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77842820BF36');
        $this->addSql('DROP INDEX IDX_C42F778479F37AE5 ON report');
        $this->addSql('DROP INDEX IDX_C42F77842820BF36 ON report');
        $this->addSql('ALTER TABLE report DROP id_user_id, DROP id_site_id');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD279F37AE5');
        $this->addSql('DROP INDEX IDX_E19D9AD279F37AE5 ON service');
        $this->addSql('ALTER TABLE service DROP id_user_id');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E479F37AE5');
        $this->addSql('DROP INDEX IDX_694309E479F37AE5 ON site');
        $this->addSql('ALTER TABLE site DROP id_user_id');
    }
}
