<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190528150107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE betaal (id INT AUTO_INCREMENT NOT NULL, soort VARCHAR(255) NOT NULL, rekening VARCHAR(255) NOT NULL, betaaldate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extras (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, meerprijs INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extras_room (extras_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_A54FA46D955D4F3F (extras_id), INDEX IDX_A54FA46D54177093 (room_id), PRIMARY KEY(extras_id, room_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, imagefile VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_room (image_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_80A5BB053DA5256D (image_id), INDEX IDX_80A5BB0554177093 (room_id), PRIMARY KEY(image_id, room_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seizoen (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, begindatum DATETIME NOT NULL, einddatum DATETIME NOT NULL, korting INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE extras_room ADD CONSTRAINT FK_A54FA46D955D4F3F FOREIGN KEY (extras_id) REFERENCES extras (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE extras_room ADD CONSTRAINT FK_A54FA46D54177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_room ADD CONSTRAINT FK_80A5BB053DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_room ADD CONSTRAINT FK_80A5BB0554177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book ADD betaalid_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331E6E82E7 FOREIGN KEY (betaalid_id) REFERENCES betaal (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CBE5A331E6E82E7 ON book (betaalid_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331E6E82E7');
        $this->addSql('ALTER TABLE extras_room DROP FOREIGN KEY FK_A54FA46D955D4F3F');
        $this->addSql('ALTER TABLE image_room DROP FOREIGN KEY FK_80A5BB053DA5256D');
        $this->addSql('DROP TABLE betaal');
        $this->addSql('DROP TABLE extras');
        $this->addSql('DROP TABLE extras_room');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_room');
        $this->addSql('DROP TABLE seizoen');
        $this->addSql('DROP INDEX UNIQ_CBE5A331E6E82E7 ON book');
        $this->addSql('ALTER TABLE book DROP betaalid_id');
    }
}
