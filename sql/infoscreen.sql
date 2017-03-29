-- MySQL Script generated by MySQL Workbench
-- Wed Mar 29 11:17:03 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema infoscreen
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema infoscreen
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `infoscreen` DEFAULT CHARACTER SET utf8 ;
USE `infoscreen` ;

-- -----------------------------------------------------
-- Table `infoscreen`.`scheduler`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infoscreen`.`scheduler` ;

CREATE TABLE IF NOT EXISTS `infoscreen`.`scheduler` (
  `idScheduler` INT NOT NULL AUTO_INCREMENT,
  `frequency` DATETIME NOT NULL,
  `duration` DATETIME NOT NULL,
  `startDate` DATETIME NOT NULL,
  `endDate` DATETIME NULL,
  PRIMARY KEY (`idScheduler`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infoscreen`.`Template`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infoscreen`.`Template` ;

CREATE TABLE IF NOT EXISTS `infoscreen`.`Template` (
  `idTemplate` INT NOT NULL AUTO_INCREMENT,
  `HTML` VARCHAR(1000) NULL,
  PRIMARY KEY (`idTemplate`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infoscreen`.`Page`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infoscreen`.`Page` ;

CREATE TABLE IF NOT EXISTS `infoscreen`.`Page` (
  `idPage` INT NOT NULL AUTO_INCREMENT,
  `schedulerFK` INT NOT NULL,
  `templateFK` INT NOT NULL,
  PRIMARY KEY (`idPage`),
  INDEX `skedulerFK_idx` (`schedulerFK` ASC),
  INDEX `templateFK_idx` (`templateFK` ASC),
  CONSTRAINT `skedulerFK`
  FOREIGN KEY (`schedulerFK`)
  REFERENCES `infoscreen`.`scheduler` (`idScheduler`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `templateFK`
  FOREIGN KEY (`templateFK`)
  REFERENCES `infoscreen`.`Template` (`idTemplate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infoscreen`.`Placeholder`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infoscreen`.`Placeholder` ;

CREATE TABLE IF NOT EXISTS `infoscreen`.`Placeholder` (
  `idPlaceholder` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `img` VARCHAR(250) NULL,
  `text` VARCHAR(500) NULL,
  PRIMARY KEY (`idPlaceholder`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infoscreen`.`PageContent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `infoscreen`.`PageContent` ;

CREATE TABLE IF NOT EXISTS `infoscreen`.`PageContent` (
  `idPageContent` INT NOT NULL AUTO_INCREMENT,
  `placeholderFK` INT NULL,
  `pageFK` INT NOT NULL,
  PRIMARY KEY (`idPageContent`),
  INDEX `pageFK_idx` (`pageFK` ASC),
  INDEX `placeholderFK_idx` (`placeholderFK` ASC),
  CONSTRAINT `pageFK`
  FOREIGN KEY (`pageFK`)
  REFERENCES `infoscreen`.`Page` (`idPage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `placeholderFK`
  FOREIGN KEY (`placeholderFK`)
  REFERENCES `infoscreen`.`Placeholder` (`idPlaceholder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
