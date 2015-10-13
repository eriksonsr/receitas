-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "tb_categorias" ----------------------------
CREATE TABLE `tb_categorias` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nome` VarChar( 100 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "tb_receitas" ------------------------------
CREATE TABLE `tb_receitas` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`id_usuario` Int( 11 ) NOT NULL,
	`nome` VarChar( 100 ) NOT NULL,
	`qtd_ing_principais` Int( 11 ) NOT NULL,
	`modo_preparo` LongText NOT NULL,
	PRIMARY KEY ( `id` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- ---------------------------------------------------------


-- CREATE TABLE "tb_receitas_tem_categorias" ---------------
CREATE TABLE `tb_receitas_tem_categorias` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`id_receita` Int( 11 ) NOT NULL,
	`id_categoria` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "tb_receitas_tem_ingredientes" -------------
CREATE TABLE `tb_receitas_tem_ingredientes` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`id_receita` Int( 11 ) NOT NULL,
	`ingrediente` VarChar( 200 ) NOT NULL,
	`principal` Int( 11 ) NOT NULL,
	`quantidade` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- ---------------------------------------------------------


-- CREATE TABLE "tb_usuarios" ------------------------------
CREATE TABLE `tb_usuarios` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nome` VarChar( 200 ) NOT NULL,
	`email` VarChar( 200 ) NOT NULL,
	`senha` VarChar( 45 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- Dump data of "tb_categorias" ----------------------------
-- ---------------------------------------------------------


-- Dump data of "tb_receitas" ------------------------------
INSERT INTO `tb_receitas`(`id`,`id_usuario`,`nome`,`qtd_ing_principais`,`modo_preparo`) VALUES ( '2', '1', 'Sanduiche', '2', 'Passe margarina no pão, adicione o queijo e o presunto, feche o sanduiche e leve a torradeira por 5 minutos' );
INSERT INTO `tb_receitas`(`id`,`id_usuario`,`nome`,`qtd_ing_principais`,`modo_preparo`) VALUES ( '4', '1', 'Enroladinho', '2', 'Enrole a salsicha na pastelina e frite' );
-- ---------------------------------------------------------


-- Dump data of "tb_receitas_tem_categorias" ---------------
-- ---------------------------------------------------------


-- Dump data of "tb_receitas_tem_ingredientes" -------------
INSERT INTO `tb_receitas_tem_ingredientes`(`id`,`id_receita`,`ingrediente`,`principal`,`quantidade`) VALUES ( '1', '2', 'pão', '1', '2' );
INSERT INTO `tb_receitas_tem_ingredientes`(`id`,`id_receita`,`ingrediente`,`principal`,`quantidade`) VALUES ( '2', '2', 'queijo', '1', '1' );
INSERT INTO `tb_receitas_tem_ingredientes`(`id`,`id_receita`,`ingrediente`,`principal`,`quantidade`) VALUES ( '3', '2', 'presunto', '0', '0' );
INSERT INTO `tb_receitas_tem_ingredientes`(`id`,`id_receita`,`ingrediente`,`principal`,`quantidade`) VALUES ( '4', '2', 'margarina', '0', '10' );
INSERT INTO `tb_receitas_tem_ingredientes`(`id`,`id_receita`,`ingrediente`,`principal`,`quantidade`) VALUES ( '6', '4', 'salsicha', '1', '1' );
INSERT INTO `tb_receitas_tem_ingredientes`(`id`,`id_receita`,`ingrediente`,`principal`,`quantidade`) VALUES ( '8', '4', 'pastelina', '1', '1' );
-- ---------------------------------------------------------


-- Dump data of "tb_usuarios" ------------------------------
INSERT INTO `tb_usuarios`(`id`,`nome`,`email`,`senha`) VALUES ( '1', 'Erikson Reppetto', 'erikson.souza@gmail.com', '123' );
-- ---------------------------------------------------------


-- CREATE INDEX "fk_tb_receitas_tb_usuarios1_idx" ----------
CREATE INDEX `fk_tb_receitas_tb_usuarios1_idx` USING BTREE ON `tb_receitas`( `id_usuario` );
-- ---------------------------------------------------------


-- CREATE INDEX "fk_tb_receitas_has_tb_categorias_tb_categorias1_idx" 
CREATE INDEX `fk_tb_receitas_has_tb_categorias_tb_categorias1_idx` USING BTREE ON `tb_receitas_tem_categorias`( `id_categoria` );
-- ---------------------------------------------------------


-- CREATE INDEX "fk_tb_receitas_has_tb_categorias_tb_receitas_idx" 
CREATE INDEX `fk_tb_receitas_has_tb_categorias_tb_receitas_idx` USING BTREE ON `tb_receitas_tem_categorias`( `id_receita` );
-- ---------------------------------------------------------


-- CREATE INDEX "fk_tb_receitas_has_tb_ingredientes_tb_receitas1_idx" 
CREATE INDEX `fk_tb_receitas_has_tb_ingredientes_tb_receitas1_idx` USING BTREE ON `tb_receitas_tem_ingredientes`( `id_receita` );
-- ---------------------------------------------------------


-- CREATE LINK "fk_tb_receitas_tb_usuarios1" ---------------
ALTER TABLE `tb_receitas`
	ADD CONSTRAINT `fk_tb_receitas_tb_usuarios1` FOREIGN KEY ( `id_usuario` )
	REFERENCES `tb_usuarios`( `id` )
	ON DELETE No Action
	ON UPDATE No Action;
-- ---------------------------------------------------------


-- CREATE LINK "fk_tb_receitas_has_tb_categorias_tb_categorias1" 
ALTER TABLE `tb_receitas_tem_categorias`
	ADD CONSTRAINT `fk_tb_receitas_has_tb_categorias_tb_categorias1` FOREIGN KEY ( `id_categoria` )
	REFERENCES `tb_categorias`( `id` )
	ON DELETE No Action
	ON UPDATE No Action;
-- ---------------------------------------------------------


-- CREATE LINK "fk_tb_receitas_has_tb_categorias_tb_receitas" 
ALTER TABLE `tb_receitas_tem_categorias`
	ADD CONSTRAINT `fk_tb_receitas_has_tb_categorias_tb_receitas` FOREIGN KEY ( `id_receita` )
	REFERENCES `tb_receitas`( `id` )
	ON DELETE No Action
	ON UPDATE No Action;
-- ---------------------------------------------------------


-- CREATE LINK "fk_tb_receitas_has_tb_ingredientes_tb_receitas1" 
ALTER TABLE `tb_receitas_tem_ingredientes`
	ADD CONSTRAINT `fk_tb_receitas_has_tb_ingredientes_tb_receitas1` FOREIGN KEY ( `id_receita` )
	REFERENCES `tb_receitas`( `id` )
	ON DELETE No Action
	ON UPDATE No Action;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


