<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623135700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand ADD country_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE brand ADD CONSTRAINT FK_1C52F958B85BC4BB FOREIGN KEY (country_name_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_1C52F958B85BC4BB ON brand (country_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand DROP FOREIGN KEY FK_1C52F958B85BC4BB');
        $this->addSql('DROP INDEX IDX_1C52F958B85BC4BB ON brand');
        $this->addSql('ALTER TABLE brand DROP country_name_id');
    }
}
