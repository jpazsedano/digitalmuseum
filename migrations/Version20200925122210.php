<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200925122210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE gallery_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE game_list_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE launch_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE platform_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE screenshot_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE videogame_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE company (id INT NOT NULL, parent_company_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, foundation_date DATE NOT NULL, close_date DATE DEFAULT NULL, country VARCHAR(255) NOT NULL, logo_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4FBF094FD0D89E86 ON company (parent_company_id)');
        $this->addSql('CREATE TABLE gallery (id INT NOT NULL, videogame_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_472B783A25EB9E4B ON gallery (videogame_id)');
        $this->addSql('CREATE TABLE game_list (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE game_list_videogame (game_list_id INT NOT NULL, videogame_id INT NOT NULL, PRIMARY KEY(game_list_id, videogame_id))');
        $this->addSql('CREATE INDEX IDX_3DFBD55A86C69A4 ON game_list_videogame (game_list_id)');
        $this->addSql('CREATE INDEX IDX_3DFBD5525EB9E4B ON game_list_videogame (videogame_id)');
        $this->addSql('CREATE TABLE launch (id INT NOT NULL, videogame_id INT NOT NULL, platform_id INT NOT NULL, date DATE NOT NULL, front_picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_79B757F525EB9E4B ON launch (videogame_id)');
        $this->addSql('CREATE INDEX IDX_79B757F5FFE6496F ON launch (platform_id)');
        $this->addSql('CREATE TABLE platform (id INT NOT NULL, company_id INT NOT NULL, name VARCHAR(255) NOT NULL, launch DATE NOT NULL, generation VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3952D0CB979B1AD6 ON platform (company_id)');
        $this->addSql('CREATE TABLE screenshot (id INT NOT NULL, gallery_id INT NOT NULL, picture_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_58991E414E7AF8F ON screenshot (gallery_id)');
        $this->addSql('CREATE TABLE videogame (id INT NOT NULL, developer_id INT NOT NULL, distributor_id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, genre VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_94D9ED7264DD9267 ON videogame (developer_id)');
        $this->addSql('CREATE INDEX IDX_94D9ED722D863A58 ON videogame (distributor_id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FD0D89E86 FOREIGN KEY (parent_company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A25EB9E4B FOREIGN KEY (videogame_id) REFERENCES videogame (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_list_videogame ADD CONSTRAINT FK_3DFBD55A86C69A4 FOREIGN KEY (game_list_id) REFERENCES game_list (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_list_videogame ADD CONSTRAINT FK_3DFBD5525EB9E4B FOREIGN KEY (videogame_id) REFERENCES videogame (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE launch ADD CONSTRAINT FK_79B757F525EB9E4B FOREIGN KEY (videogame_id) REFERENCES videogame (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE launch ADD CONSTRAINT FK_79B757F5FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE platform ADD CONSTRAINT FK_3952D0CB979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screenshot ADD CONSTRAINT FK_58991E414E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE videogame ADD CONSTRAINT FK_94D9ED7264DD9267 FOREIGN KEY (developer_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE videogame ADD CONSTRAINT FK_94D9ED722D863A58 FOREIGN KEY (distributor_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE company DROP CONSTRAINT FK_4FBF094FD0D89E86');
        $this->addSql('ALTER TABLE platform DROP CONSTRAINT FK_3952D0CB979B1AD6');
        $this->addSql('ALTER TABLE videogame DROP CONSTRAINT FK_94D9ED7264DD9267');
        $this->addSql('ALTER TABLE videogame DROP CONSTRAINT FK_94D9ED722D863A58');
        $this->addSql('ALTER TABLE screenshot DROP CONSTRAINT FK_58991E414E7AF8F');
        $this->addSql('ALTER TABLE game_list_videogame DROP CONSTRAINT FK_3DFBD55A86C69A4');
        $this->addSql('ALTER TABLE launch DROP CONSTRAINT FK_79B757F5FFE6496F');
        $this->addSql('ALTER TABLE gallery DROP CONSTRAINT FK_472B783A25EB9E4B');
        $this->addSql('ALTER TABLE game_list_videogame DROP CONSTRAINT FK_3DFBD5525EB9E4B');
        $this->addSql('ALTER TABLE launch DROP CONSTRAINT FK_79B757F525EB9E4B');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE gallery_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE game_list_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE launch_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE platform_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE screenshot_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE videogame_id_seq CASCADE');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE game_list');
        $this->addSql('DROP TABLE game_list_videogame');
        $this->addSql('DROP TABLE launch');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE screenshot');
        $this->addSql('DROP TABLE videogame');
    }
}
