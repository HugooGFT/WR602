<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213111722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pdf DROP FOREIGN KEY FK_EF0DB8C81CFDAE7');
        $this->addSql('DROP TABLE url');
        $this->addSql('DROP INDEX UNIQ_EF0DB8C81CFDAE7 ON pdf');
        $this->addSql('ALTER TABLE pdf ADD url VARCHAR(255) NOT NULL, DROP url_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE url (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pdf ADD url_id INT DEFAULT NULL, DROP url');
        $this->addSql('ALTER TABLE pdf ADD CONSTRAINT FK_EF0DB8C81CFDAE7 FOREIGN KEY (url_id) REFERENCES url (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF0DB8C81CFDAE7 ON pdf (url_id)');
    }
}
