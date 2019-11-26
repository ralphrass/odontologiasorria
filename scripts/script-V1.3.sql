-- Tabela Empresa

CREATE TABLE IF NOT EXISTS `empresa` (
  `cd_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nm_empresa` varchar(255) NOT NULL,
  PRIMARY KEY (`cd_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- Empresa no cliente
ALTER TABLE  `cliente` ADD  `cd_empresa` INT NOT NULL;

-- Empresa em despesas
ALTER TABLE  `despesa` ADD  `cd_empresa` INT NOT NULL;

-- Empresa em material_movimento
ALTER TABLE  `material_movimento` ADD  `cd_empresa` INT NOT NULL;

-- Empresa em tipo_material
ALTER TABLE  `tipo_material` ADD  `cd_empresa` INT NOT NULL;

-- Empresa em usuario
ALTER TABLE  `usuario` ADD  `cd_empresa` INT NOT NULL

-- Cria empresas
INSERT INTO  `odontologiasorria`.`empresa` (
`cd_empresa` ,
`nm_empresa`
)
VALUES (
1 ,  'Santo Ângelo'
), (
2 ,  'Empresa Dois'
);

--Seta empresa 1 em todos as dependências
update cliente set cd_empresa = 1;

update despesa set cd_empresa = 1;

update material_movimento set cd_empresa = 1;

update tipo_material set cd_empresa = 1;

update usuario set cd_empresa = 1;


--Adiciona o campo qt_minima no tipo de material
alter table tipo_material add qt_minima integer