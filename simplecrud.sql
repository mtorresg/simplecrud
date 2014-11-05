-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: simpleCrud
-- Source Schemata: simplecrud
-- Created: Tue Nov 04 14:56:08 2014
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;;

-- ----------------------------------------------------------------------------
-- Schema simpleCrud
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `simplecrud` ;
CREATE SCHEMA IF NOT EXISTS `simplecrud` ;

-- ----------------------------------------------------------------------------
-- Table simpleCrud.users
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simplecrud`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  `lastname` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  `email` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;
SET FOREIGN_KEY_CHECKS = 1;;
