<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213022221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, instit_id_id INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', name VARCHAR(100) NOT NULL, id_instit INT NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_64C19C1EF801D4A (instit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE format (id INT AUTO_INCREMENT NOT NULL, category_id_id INT NOT NULL, name VARCHAR(100) NOT NULL, id_category INT NOT NULL, INDEX IDX_DEBA72DF9777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, type VARCHAR(10) NOT NULL, size INT NOT NULL, description VARCHAR(255) NOT NULL, img_blob LONGBLOB NOT NULL, role VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE institution (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, logo_id_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, route VARCHAR(50) NOT NULL, qrcode VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(100) NOT NULL, phone VARCHAR(20) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, INDEX IDX_3A9F98E59D86650F (user_id_id), UNIQUE INDEX UNIQ_3A9F98E548E5843B (logo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, product_id_id INT NOT NULL, format_id_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_CAC822D9DE18E50B (product_id_id), UNIQUE INDEX UNIQ_CAC822D960DED95A (format_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, photo_id_id INT DEFAULT NULL, category_id_id INT NOT NULL, label VARCHAR(100) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status TINYINT(1) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D34A04ADC51599E0 (photo_id_id), INDEX IDX_D34A04AD9777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1EF801D4A FOREIGN KEY (instit_id_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE format ADD CONSTRAINT FK_DEBA72DF9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E59D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E548E5843B FOREIGN KEY (logo_id_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D960DED95A FOREIGN KEY (format_id_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC51599E0 FOREIGN KEY (photo_id_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE format DROP FOREIGN KEY FK_DEBA72DF9777D11E');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9777D11E');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D960DED95A');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E548E5843B');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC51599E0');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1EF801D4A');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9DE18E50B');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E59D86650F');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE format');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE institution');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
