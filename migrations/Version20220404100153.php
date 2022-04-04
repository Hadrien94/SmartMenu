<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404100153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C12D26E480');
        $this->addSql('DROP INDEX IDX_64C19C12D26E480 ON category');
        $this->addSql('ALTER TABLE category CHANGE id_institution_id institution_id INT NOT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C110405986 FOREIGN KEY (institution_id) REFERENCES institution (id)');
        $this->addSql('CREATE INDEX IDX_64C19C110405986 ON category (institution_id)');
        $this->addSql('ALTER TABLE format DROP FOREIGN KEY FK_DEBA72DFA545015');
        $this->addSql('DROP INDEX IDX_DEBA72DFA545015 ON format');
        $this->addSql('ALTER TABLE format CHANGE id_category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE format ADD CONSTRAINT FK_DEBA72DF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_DEBA72DF12469DE2 ON format (category_id)');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E52712BD3A');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E579F37AE5');
        $this->addSql('DROP INDEX IDX_3A9F98E52712BD3A ON institution');
        $this->addSql('DROP INDEX IDX_3A9F98E579F37AE5 ON institution');
        $this->addSql('ALTER TABLE institution CHANGE id_user_id user_id INT NOT NULL, CHANGE id_logo_id logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E5F98F144A FOREIGN KEY (logo_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_3A9F98E5A76ED395 ON institution (user_id)');
        $this->addSql('CREATE INDEX IDX_3A9F98E5F98F144A ON institution (logo_id)');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9561C4A22');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9E00EE68D');
        $this->addSql('DROP INDEX IDX_CAC822D9E00EE68D ON price');
        $this->addSql('DROP INDEX IDX_CAC822D9561C4A22 ON price');
        $this->addSql('ALTER TABLE price CHANGE id_format_id format_id INT DEFAULT NULL, CHANGE id_product_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9D629F605 FOREIGN KEY (format_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D94584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_CAC822D9D629F605 ON price (format_id)');
        $this->addSql('CREATE INDEX IDX_CAC822D94584665A ON price (product_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD6D7EC9F8');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA545015');
        $this->addSql('DROP INDEX IDX_D34A04ADA545015 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD6D7EC9F8 ON product');
        $this->addSql('ALTER TABLE product CHANGE id_image_id image_id INT DEFAULT NULL, CHANGE id_category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD3DA5256D ON product (image_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C110405986');
        $this->addSql('DROP INDEX IDX_64C19C110405986 ON category');
        $this->addSql('ALTER TABLE category CHANGE institution_id id_institution_id INT NOT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C12D26E480 FOREIGN KEY (id_institution_id) REFERENCES institution (id)');
        $this->addSql('CREATE INDEX IDX_64C19C12D26E480 ON category (id_institution_id)');
        $this->addSql('ALTER TABLE format DROP FOREIGN KEY FK_DEBA72DF12469DE2');
        $this->addSql('DROP INDEX IDX_DEBA72DF12469DE2 ON format');
        $this->addSql('ALTER TABLE format CHANGE category_id id_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE format ADD CONSTRAINT FK_DEBA72DFA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_DEBA72DFA545015 ON format (id_category_id)');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E5A76ED395');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E5F98F144A');
        $this->addSql('DROP INDEX IDX_3A9F98E5A76ED395 ON institution');
        $this->addSql('DROP INDEX IDX_3A9F98E5F98F144A ON institution');
        $this->addSql('ALTER TABLE institution CHANGE user_id id_user_id INT NOT NULL, CHANGE logo_id id_logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E52712BD3A FOREIGN KEY (id_logo_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3A9F98E52712BD3A ON institution (id_logo_id)');
        $this->addSql('CREATE INDEX IDX_3A9F98E579F37AE5 ON institution (id_user_id)');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9D629F605');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D94584665A');
        $this->addSql('DROP INDEX IDX_CAC822D9D629F605 ON price');
        $this->addSql('DROP INDEX IDX_CAC822D94584665A ON price');
        $this->addSql('ALTER TABLE price CHANGE product_id id_product_id INT NOT NULL, CHANGE format_id id_format_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9561C4A22 FOREIGN KEY (id_format_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_CAC822D9E00EE68D ON price (id_product_id)');
        $this->addSql('CREATE INDEX IDX_CAC822D9561C4A22 ON price (id_format_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD3DA5256D');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD3DA5256D ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
        $this->addSql('ALTER TABLE product CHANGE image_id id_image_id INT DEFAULT NULL, CHANGE category_id id_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD6D7EC9F8 FOREIGN KEY (id_image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA545015 ON product (id_category_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD6D7EC9F8 ON product (id_image_id)');
    }
}
