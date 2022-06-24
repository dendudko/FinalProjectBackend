<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623143220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_part (car_id INT NOT NULL, part_id INT NOT NULL, INDEX IDX_8265646AC3C6F69F (car_id), INDEX IDX_8265646A4CE34BEC (part_id), PRIMARY KEY(car_id, part_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_part ADD CONSTRAINT FK_8265646AC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_part ADD CONSTRAINT FK_8265646A4CE34BEC FOREIGN KEY (part_id) REFERENCES part (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car ADD model_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D1184F527 FOREIGN KEY (model_name_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_773DE69D1184F527 ON car (model_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE car_part');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D1184F527');
        $this->addSql('DROP INDEX IDX_773DE69D1184F527 ON car');
        $this->addSql('ALTER TABLE car DROP model_name_id');
    }
}
