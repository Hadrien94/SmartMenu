<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408084241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, institution_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_64C19C110405986 (institution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE format (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_DEBA72DF12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, size INT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img_blob LONGBLOB NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE institution (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, route VARCHAR(255) NOT NULL, qrcode VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zipcode INT NOT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, INDEX IDX_3A9F98E5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, format_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_CAC822D94584665A (product_id), INDEX IDX_CAC822D9D629F605 (format_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, label VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C110405986 FOREIGN KEY (institution_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE format ADD CONSTRAINT FK_DEBA72DF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D94584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9D629F605 FOREIGN KEY (format_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE format DROP FOREIGN KEY FK_DEBA72DF12469DE2');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9D629F605');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C110405986');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D94584665A');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E5A76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE format');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE institution');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
