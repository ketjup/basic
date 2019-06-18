<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190617092737 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331E6E82E7');
        $this->addSql('DROP TABLE betaal');
        $this->addSql('DROP INDEX UNIQ_CBE5A331E6E82E7 ON book');
        $this->addSql('ALTER TABLE book DROP betaalid_id');
        $this->addSql('ALTER TABLE fos_user CHANGE last_activity_at last_activity_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE betaal (id INT AUTO_INCREMENT NOT NULL, soort VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, rekening VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, betaaldate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE book ADD betaalid_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331E6E82E7 FOREIGN KEY (betaalid_id) REFERENCES betaal (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CBE5A331E6E82E7 ON book (betaalid_id)');
        $this->addSql('ALTER TABLE fos_user CHANGE last_activity_at last_activity_at DATETIME DEFAULT NULL');
    }
}
