<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218084216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX ind_IMO ON navire (imo)');
        $this->addSql('CREATE INDEX ind_MMSI ON navire (mmsi)');
        $this->addSql('CREATE INDEX ind_indicatif ON pays (indicatif)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX ind_IMO ON navire');
        $this->addSql('DROP INDEX ind_MMSI ON navire');
        $this->addSql('DROP INDEX ind_indicatif ON pays');
    }
}
