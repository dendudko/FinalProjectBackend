<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623141131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manufacturer ADD country_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE manufacturer ADD CONSTRAINT FK_3D0AE6DCB85BC4BB FOREIGN KEY (country_name_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_3D0AE6DCB85BC4BB ON manufacturer (country_name_id)');
        $this->addSql('ALTER TABLE model ADD brand_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9962C39AD FOREIGN KEY (brand_name_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_D79572D9962C39AD ON model (brand_name_id)');
        $this->addSql('ALTER TABLE part ADD manufacturer_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE part ADD CONSTRAINT FK_490F70C6CCB7D284 FOREIGN KEY (manufacturer_name_id) REFERENCES manufacturer (id)');
        $this->addSql('CREATE INDEX IDX_490F70C6CCB7D284 ON part (manufacturer_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manufacturer DROP FOREIGN KEY FK_3D0AE6DCB85BC4BB');
        $this->addSql('DROP INDEX IDX_3D0AE6DCB85BC4BB ON manufacturer');
        $this->addSql('ALTER TABLE manufacturer DROP country_name_id');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9962C39AD');
        $this->addSql('DROP INDEX IDX_D79572D9962C39AD ON model');
        $this->addSql('ALTER TABLE model DROP brand_name_id');
        $this->addSql('ALTER TABLE part DROP FOREIGN KEY FK_490F70C6CCB7D284');
        $this->addSql('DROP INDEX IDX_490F70C6CCB7D284 ON part');
        $this->addSql('ALTER TABLE part DROP manufacturer_name_id');
    }
}
