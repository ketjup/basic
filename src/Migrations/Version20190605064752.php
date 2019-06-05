<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190605064752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331E6E82E7 FOREIGN KEY (betaalid_id) REFERENCES betaal (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CBE5A331E6E82E7 ON book (betaalid_id)');
        $this->addSql('ALTER TABLE fos_user ADD last_activity_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331E6E82E7');
        $this->addSql('DROP INDEX UNIQ_CBE5A331E6E82E7 ON book');
        $this->addSql('ALTER TABLE fos_user DROP last_activity_at');
    }
}
