# Host: localhost  (Version: 5.5.5-10.1.8-MariaDB)
# Date: 2016-05-29 00:18:59
# Generator: MySQL-Front 5.3  (Build 4.113)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "catalog"
#

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contend_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(55) NOT NULL DEFAULT '',
  `file` varchar(55) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "catalog"
#

INSERT INTO `catalog` VALUES (1,1,'GRANULADOS','granulados.pdf'),(2,1,'HIDROSOLUBLE','hidrosolubles.pdf'),(3,2,'DIVISIÓN INDUSTRIAL','folleto_industrial.pdf'),(4,3,'DIVISIÓN TRATAMIENTO DE AGUAS','folleto_industrial.pdf'),(5,1,'FOLIARES','foliares.pdf'),(6,1,'QUELATOS','quelatos.pdf');

#
# Structure for table "catalog_products"
#

DROP TABLE IF EXISTS `catalog_products`;
CREATE TABLE `catalog_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `price` double NOT NULL DEFAULT '0',
  `catalog_id` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `file_pdf` varchar(255) NOT NULL DEFAULT '',
  `file_image` varchar(255) NOT NULL DEFAULT '',
  `description_english` text NOT NULL,
  `price_english` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

#
# Data for table "catalog_products"
#

INSERT INTO `catalog_products` VALUES (1,'PROfer G-14','Combinación de hierro y magnesio de fácil solubilidad por ser sulfatados y de rápida asimilación por el contenido de PROactil.',50,1,'2016-05-11 19:57:07','2016-05-26 13:49:00',NULL,'','','Combination of iron and magnesium solubility easily be sulfated and rapidly assimilated by the content PROactil .',2),(2,'PROzinc G','Zinc granulado, sulfatado, por ende soluble, con vocación agrícola gracias a PROactil, para cultivos de alta demanda en zinc.',100,1,'2016-05-12 11:10:30','2016-05-28 20:02:58',NULL,'','','<p>granulado de zinc, sulfatado, por ende soluble, con Vocaci&oacute;n Agr&iacute;cola Gracias a PROactil, p&aacute;rrafo Cultivos de alta demanda f en zinc.</p>',1),(3,'PROsulman G','Fuente de manganeso de alta solubilidad por su composición en base a sulfatos, y de rápida asimilación por el acompañamiento de PROactil.',10,1,'2016-05-25 20:38:42','2016-05-28 20:03:18',NULL,'FT-15-PROulman G-024.pdf','','<p>Source of manganese high solubility in composition based on sulfates, and rapid assimilation by the accompaniment of PROactil.</p>',0),(4,'PROSIbor G-10','Previene y corrige, los requerimientos y deficiencias de boro.',10,1,'2016-05-25 20:40:13','2016-05-28 20:06:33',NULL,'FT-15-PROSIbor G-10-018.pdf','','It prevents and corrects deficiencies requirements and boron.',2),(5,'PROSImag G','Alta concentración de magnesio de fácil solubilidad por su composición en base a sulfatos.',10,1,'2016-05-25 20:41:11',NULL,NULL,'FT-15-PROSImag G-020.pdf','','High concentration of magnesium easy solubility in composition based on sulfates.',0),(7,'\r\nPROSImicros 484','Balance de micronutrientes para mejores resultados en suelos neutros o alcalinos, por su concentración y su costo.',10,1,'2016-05-25 20:43:01',NULL,NULL,'FT-15-PROSImicros 484-021.pdf','','Micronutrient balance for best results on neutral or alkaline soils, its concentration and its cost.',0),(8,'\r\nPROSImicros 515','Balance de micronutrientes diseñado para óptimo desempeño en suelos ácidos, también por su concentración y costo.',10,1,'2016-05-25 20:43:49',NULL,NULL,'FT-15-PROSImicros 515-022.pdf','','Balance of micronutrients designed for optimum performance in acidic soils, including its concentration and cost.',0),(9,'PROSImicros Z-37','Sulfato de zinc acompañado de hierro y magnesio, todo soluble por ser sulfatados, y de alta asimilación gracias a PROactil; la mejor relación costo beneficio.',10,1,'2016-05-25 20:45:04',NULL,NULL,'FT-15-PROSImicros Z-37-025.pdf','','Zinc sulfate and magnesium accompanied iron, all being soluble sulfated and high assimilation by PROactil; the best cost benefit.',0),(10,'ZiBor G','Proporción óptima entre zinc y boro, para crecimiento y floración; los 2 elementos de mayor demanda en la actualidad, juntos.',10,1,'2016-05-25 20:46:56',NULL,NULL,'FT-15-Zibor-023.pdf','','\noptimal ratio between zinc and boron, for growth and flowering; 2 items most in demand today, together.',0),(11,'PROSImicros FEM G','Balance de micronutrientes a la medida del cultivo.',10,1,'2016-05-25 20:47:32',NULL,NULL,'','','Micronutrient balance measurement crop.',0),(12,'PROfer I-19','Sulfato ferroso heptahidratado, de costo óptimo, altamente soluble',10,2,'2016-05-25 21:19:45',NULL,NULL,'FT-15-PROfer I-19-015.pdf','','highly soluble ferrous sulphate heptahydrate, optimum cost,',0),(13,'PROSImicro Fe L','Hierro complejado con ácidos orgánicos, efecto verde satisfactorio.',10,5,'2016-05-25 21:47:02',NULL,NULL,'FT-15-PROSImicro%20Fe L-004.pdf','','Iron complexed with organic acids, green satisfactory effect.',0),(14,'Ferrostrene','El mejor del mundo.',10,6,'2016-05-25 21:51:25',NULL,NULL,'','','The best in the world.',0),(15,'PROfer I-19','<p>Sulfato ferroso heptahidratado, de costo &oacute;ptimo, altamente soluble</p>',1,2,'2016-05-26 17:48:10','2016-05-28 20:11:20',NULL,'default.pdf','default.jpg','<p>highly soluble ferrous sulphate heptahydrate, optimum cost,</p>',0),(16,'PROfer II-21','<p>Sulfato ferroso heptahidratado, seco, multifuncional.</p>',1,2,'2016-05-26 17:49:49','2016-05-28 20:11:59',NULL,'default.pdf','default.jpg','<p>Sulfato ferroso heptahidratado, seco, multifuncional.</p>',0),(17,'PROzinc C','<p>Sulfato de zinc hexahidratado, altamente soluble, no emite polvo.</p>',1,2,'2016-05-26 17:50:09','2016-05-28 20:12:13',NULL,'default.pdf','default.jpg','<p>Zinc sulfate hexahydrate, highly soluble, it does not emit dust.</p>',0),(18,'PROsulman C','<p>Sulfato de manganeso monohidratado.</p>',1,2,'2016-05-26 17:50:30','2016-05-28 20:12:29',NULL,'default.pdf','default.jpg','<p>Manganese sulfate monohydrate.</p>',0),(19,' PROSImol 39','<p>Molibdeno de alta concentraci&oacute;n para la agricultura moderna.</p>',1,2,'2016-05-26 17:50:47','2016-05-28 20:12:42',NULL,'default.pdf','default.jpg','<p>Molibdeno de alta concentraci&oacute;n para la agricultura moderna.</p>',0),(20,'PROactil','<p>Activador org&aacute;nico que entrega m&uacute;ltiples beneficios al desarrollo nutricional del cultivo.</p>',1,2,'2016-05-26 17:51:03','2016-05-28 20:12:57',NULL,'default.pdf','default.jpg','<p>Organic activator delivering multiple benefits to nutritional crop development.</p>',0),(21,' PROSImicro Fe L','<p>Hierro complejado con ácidos orgánicos, efecto verde satisfactorio.</p>',1,5,'2016-05-26 18:01:29','2016-05-28 20:13:13',NULL,'default.pdf','default.jpg','<p>Iron complexed with organic acids, green satisfactory effect.</p>',0),(22,'PROSImicro Zn L','<p>Zinc complejado con &aacute;cidos org&aacute;nicos, los m&aacute;s adecuados para potenciar el efecto deseado.</p>',1,5,'2016-05-26 18:01:53','2016-05-28 20:13:32',NULL,'default.pdf','default.jpg','<p>Zinc complexed with organic acids, the most suitable for enhancing the desired effect.</p>',0),(23,'PROSImicro B L','<p>Boro de rapid&iacute;sima asimilaci&oacute;n para optimizar los procesos de polinizaci&oacute;n, floraci&oacute;n, cuajado de frutos, entre otros.</p>',1,5,'2016-05-26 18:02:18','2016-05-28 20:13:49',NULL,'default.pdf','default.jpg','<p>Buro of very rapid assimilation to optimize the processes of pollination, flowering, fruit set, among others.</p>',0),(24,'PROSImicro Mo L','<p>Molibdeno con la concentraci&oacute;n adecuada para un manejo pr&aacute;ctico.</p>',1,5,'2016-05-26 18:02:38','2016-05-28 20:14:05',NULL,'default.pdf','default.jpg','<p>Molybdenum with the appropriate concentration for practical use.</p>',0),(25,' PROSImicro Mix Mg L','<p>Balance de micronutrientes y magnesio para r&aacute;pida asimilaci&oacute;n y efecto verde en la planta.</p>',1,5,'2016-05-26 18:02:59','2016-05-28 20:14:21',NULL,'default.pdf','default.jpg','<p>Balance of micronutrients and magnesium for rapid assimilation and green effect on the plant.</p>',0),(26,'PROSIamin 20 L','<p>Bioestimulante para superar condiciones de estr&eacute;s. Amino&aacute;cidos que realmente funcionan.</p>',1,5,'2016-05-26 18:03:19','2016-05-28 20:14:42',NULL,'default.pdf','default.jpg','<p>Biostimulant to overcome stress conditions. Amino acids that actually work</p>',0),(27,'PROSIbrix L','<p>Soluci&oacute;n pot&aacute;sica ideal para cultivos que pagan dulzor.Su tecnolog&iacute;a permite al Potasio penetrar foliarmente sin riesgo de quedar atrapado en la soluci&oacute;n</p>',1,5,'2016-05-26 18:04:26','2016-05-26 18:04:26',NULL,'default.pdf','default.jpg','',0),(29,'PROSIquel Fe EDDHA','<p>Quelato de hierro EDDHA.</p>',1,6,'2016-05-26 18:09:24','2016-05-28 20:15:19',NULL,'default.pdf','default.jpg','<p>EDDHA iron chelate.</p>',0),(30,' PROSIquel Fe EDTA','<p>Quelato de hierro EDTA.</p>',1,6,'2016-05-26 18:09:42','2016-05-28 20:15:33',NULL,'default.pdf','default.jpg','<p>Chelated iron EDTA.</p>',0),(31,'PROSIquel Zn EDTA','<p>Quelato de zinc EDTA</p>',1,6,'2016-05-26 18:10:08','2016-05-28 20:15:47',NULL,'default.pdf','default.jpg','<p>EDTA zinc chelate</p>',0),(32,'PROSIquel Mn EDTA','<p>Quelato de manganeso EDTA.</p>',1,6,'2016-05-26 18:10:25','2016-05-28 20:16:12',NULL,'default.pdf','default.jpg','<p style=\"text-align: left;\">Manganese EDTA chelate.</p>',0),(33,'PROSIquel Mix EDTA','<p>Quelatos EDTA.</p>',1,6,'2016-05-26 18:10:42','2016-05-28 20:16:31',NULL,'default.pdf','default.jpg','<p>EDTA chelates.</p>',0),(34,'PROferic CFL-13','<p>&nbsp;</p>\r\n<ul>\r\n<li>Cloruro f&eacute;rrico l&iacute;quido.</li>\r\n<li>Fe Cl3 L&iacute;quido caf&eacute; obscuro con ligero olor a &aacute;cido clorh&iacute;drico.</li>\r\n<li>o Contenido 37 - 42 % Gravedad Espec&iacute;fica: 1.42 &ndash; 1.50.</li>\r\n<li',1,4,'2016-05-26 18:14:49','2016-05-28 20:17:04',NULL,'default.pdf','default.jpg','<ul>\r\n<li>ferric chloride liquid.</li>\r\n<li>FeCl3 dark brown liquid with a slight odor of hydrochloric acid.</li>\r\n<li>or Content 37-42% Specific Gravity: 1.42 - 1.50.<br /><br /></li>\r\n</ul>',0),(35,' PROferic SFL-13','<p>&nbsp;</p>\r\n<ul>\r\n<li>Sulfato f&eacute;rrico l&iacute;quido.</li>\r\n<li>Fe2 (SO4 )3 L&iacute;quido caf&eacute; obscuro.</li>\r\n<li>Contenido 45 % m&iacute;n. Gravedad Espec&iacute;fica: 1.50 &ndash; 1.55.</li>\r\n<li>Usos principales: Para tratamiento de a',1,4,'2016-05-26 18:15:07','2016-05-28 20:17:41',NULL,'default.pdf','default.jpg','<ul>\r\n<li>Sulfato f&eacute;rrico l&iacute;quido.</li>\r\n<li>Fe2 (SO4 )3 L&iacute;quido caf&eacute; obscuro.</li>\r\n<li>Contenido 45 % m&iacute;n. Gravedad Espec&iacute;fica: 1.50 &ndash; 1.55.</li>\r\n<li>Usos principales: Para tratamiento de a</li>\r\n</ul>',0),(36,'PROfer SFL-35','<p>&nbsp;</p>\r\n<ul>\r\n<li>Sulfato ferroso l&iacute;quido.</li>\r\n<li>Fe SO4 *7 H2O L&iacute;quido verde claro.</li>\r\n<li>Contenido 30 - 35 % Gravedad Espec&iacute;fica: 1.21 &ndash; 1.25.</li>\r\n<li>Usos principales: Para tratamiento de aguas y alcantarillad',1,4,'2016-05-26 18:15:26','2016-05-28 20:18:09',NULL,'default.pdf','default.jpg','<ul>\r\n<li>liquid ferrous sulfate.</li>\r\n<li>FeSO4 * 7H2O light green liquid.</li>\r\n<li>Content 30 - 35% Specific Gravity: 1.21 - 1.25.</li>\r\n<li>Main uses: For water treatment and alcantarillad</li>\r\n</ul>',0),(37,' PROferic FEM L','<ul>\r\n<li>F&oacute;rmulas especiales para tratamiento de aguas residuales, a la medida del cliente</li>\r\n</ul>',1,4,'2016-05-26 18:16:08','2016-05-28 20:18:30',NULL,'default.pdf','default.jpg','<ul>\r\n<li>Special formulas for wastewater treatment, tailored to the customer</li>\r\n</ul>',0),(38,'PROfer D-30','<p>&nbsp;</p>\r\n<ul>\r\n<li>Sulfato ferroso monohidratado.</li>\r\n<li>Fe SO4 H2O Polvo gris&aacute;ceo soluble en agua.</li>\r\n<li>Pureza 99.0 % Fierro como Fe 30% min.</li>\r\n<li>Usos principales:Elaboracion de alimentos balanceados en la alimentacion animal, ',1,3,'2016-05-26 18:16:33','2016-05-28 20:18:59',NULL,'default.pdf','default.jpg','<ul>\r\n<li>ferrous sulfate monohydrate.</li>\r\n<li>FeSO4 H2O grayish powder soluble in water.</li>\r\n<li>Purity 99.0% Iron as Fe 30% min.</li>\r\n<li>Main uses: elaboration of balanced foods in animal feed,</li>\r\n</ul>',0),(39,' PROman 30','<p>&nbsp;</p>\r\n<ul>\r\n<li>Sulfato de manganeso monohidratado.</li>\r\n<li>Mn SO4 H2O Polvo blanco o crema soluble en agua.</li>\r\n<li>Pureza 98.0 % Manganeso como Manganeso 29.5 % min.</li>\r\n<li>Usos principales: Elaboraci&oacute;n de alimentos balanceados en',1,3,'2016-05-26 18:16:52','2016-05-28 20:19:22',NULL,'default.pdf','default.jpg','<ul>\r\n<li>Manganese sulfate monohydrate.</li>\r\n<li>MnSO4 H2O White powder or water soluble cream.</li>\r\n<li>Purity 98.0% 29.5% manganese as manganese min.</li>\r\n<li>Main applications: Manufacture of balanced foods</li>\r\n</ul>',0),(40,' SFH-19','<p>&nbsp;</p>\r\n<ul>\r\n<li>Sulfato ferroso heptahidratado.</li>\r\n<li>Fe SO4*7H2O Cristales verdes solubles en agua.</li>\r\n<li>Pureza 97.0 % Fierro como Fe 19% min.</li>\r\n<li>Usos principales: Tratamiento de aguas y alcantarillados, eliminaci&oacute;n del ol',1,3,'2016-05-26 18:17:06','2016-05-28 20:19:45',NULL,'default.pdf','default.jpg','<ul>\r\n<li>Sulfato ferroso heptahidratado.</li>\r\n<li>Fe SO4*7H2O Cristales verdes solubles en agua.</li>\r\n<li>Pureza 97.0 % Fierro como Fe 19% min.</li>\r\n<li>Usos principales: Tratamiento de aguas y alcantarillados, eliminaci&oacute;n del ol</li>\r\n</ul>',0);

#
# Structure for table "catalog_products_composition"
#

DROP TABLE IF EXISTS `catalog_products_composition`;
CREATE TABLE `catalog_products_composition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemical` varchar(15) NOT NULL DEFAULT '',
  `porcent` double NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

#
# Data for table "catalog_products_composition"
#

INSERT INTO `catalog_products_composition` VALUES (1,'Fe',14,1),(2,'MgO',5,1),(3,'SO4',27,1),(4,'PROactil',2,1),(5,'Zinc',22,2),(6,'SO4',20,2),(7,'PROactil',2,2),(11,'Zn',12,10),(12,'B',2,10),(14,'PROactil',2,10),(15,'ZnSO4',36.6,9),(16,'Fe',5,9),(17,'MgO',3,9),(18,'SO4',22,9),(19,'PROactil',2,9),(20,'FeO',1,8),(21,'ZnO',5,8),(22,'MnO',2,8),(23,'B2O3',2,8),(24,'MgO',5,8),(25,'SO4',20,8),(26,'CaO',3,8),(27,'PROactil',2,8),(28,'FeO',8,7),(29,'ZnO',4,7),(30,'MnO',1,7),(31,'B2O3',2,7),(32,'MgO',4,7),(33,'SO4',13,7),(34,'CaO',3,7),(35,'PROactil',2,7),(36,'MgO',25,5),(37,'SO4',48,5),(38,'B',10,4),(39,'Mn',20,3),(40,'SO4',34,3),(41,'PROactil',2,3),(45,'Fe',14,15),(46,'SO4',34.5,15),(48,'Fe',20.5,16),(49,'SO4  ',36,16),(50,'Zn  ',20.5,17),(51,'SO4 ',36,17),(52,'Mn  ',30,18),(53,'SO4  ',56,18),(54,'Mo ',39,19),(55,'Ácidos fúlvicos',90.5,20),(56,'Fe  ',7,21),(57,'Zn  ',14,22),(58,'B',10,23),(59,'Mo  ',4.5,24),(60,'MgO  ',4,25),(61,'Cu  ',0.2,25),(62,'B  ',0.2,25),(63,'Fe  ',2.5,25),(64,'Mn ',1.5,25),(65,'Mo  ',0.3,25),(66,'Zn ',0.35,25),(67,'Aminoácidos lib',20,26),(69,'K2O',29,27),(70,'Fe  ',6,28),(71,'Fe  ',6,29),(72,'Fe  ',13,30),(73,'Zn  ',14,31),(74,'Mn  ',13,32),(75,'Fe  ',7.5,33),(76,'Mn',3.3,33),(77,'Zn  ',0.6,33),(78,'B  ',0.7,33),(79,'Mo  ',0.2,33),(80,'Cu  ',0.3,33),(81,'Fe',6,14);

#
# Structure for table "category"
#

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "category"
#

INSERT INTO `category` VALUES (1,'Estatica'),(2,'Seccion'),(3,'Catalogo');

#
# Structure for table "contend"
#

DROP TABLE IF EXISTS `contend`;
CREATE TABLE `contend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `file_image` varchar(55) NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name_english` varchar(255) NOT NULL DEFAULT '',
  `description_english` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "contend"
#

INSERT INTO `contend` VALUES (1,'ESPECIALIDADES DE NUTRICIÓN VEGETAL','<p>ENV es la línea de productos que PROSISA ha desarrollado para la agricultura inteligente, para los agricultores que sin miedo buscan la rentabilidad, independientemente del tipo de tecnología nutricional que usen. Productos para aplicación foliar, fertirriego, al suelo.</p>','banner5.png',3,'2016-05-21 15:12:04','2016-05-26 13:35:50',NULL,' PLANT NUTRITION SPECIALTIES','<p id=\"tw-target-text\" class=\"tw-data-text vk_txt tw-ta tw-text-small\" dir=\"ltr\" data-placeholder=\"Traducci&oacute;n\"><span lang=\"en\">ENV is the product line PROSISA developed for intelligent agriculture, for farmers who fearlessly seek profitability, regardless of the type of nutritional technology they use. Products for foliar application, fertigation , soil . </span></p>'),(2,'DIVISIÓN INDUSTRIAL','      <p>La dinámica manufacturera de PROSISA ha generado oportunidades de negocio en diferentes industrias, a partir de sus moléculas principales, como hierro, zinc y manganeso. De este modo, PROSISA participa en industrias tales como minería, nutrición pecuaria, agroindustria, tratamiento de residuos peligrosos, ferroaleaciones, industria textil, etc.</p>','banner4.png',3,'2016-05-21 15:12:04',NULL,NULL,'INDUSTRIAL DIVISION','<p>PROSISA manufacturing dynamics has generated business opportunities in different industries from its main molecules, such as iron, zinc and manganese. Thus, PROSISA involved in such industries as mining, livestock nutrition, agribusiness, hazardous waste treatment, ferroalloys, textiles, etc.</p>'),(3,'DIVISIÓN TRATAMIENTO DE AGUAS','        <p>A partir de nuestras sales de hierro, coadyuvamos con nuestros clientes en el diseño de productos químicos para optimizar el costo por metro cúbico de agua tratada, tanto residuales como potables, y los apoyamos en el cumplimiento de las normas a las que están sujetos. Somos profesionales en la producción, manejo y transporte de estos productos.</p>','banner3.png',3,'2016-05-21 15:12:04',NULL,NULL,'DIVISION WATER TREATMENT','<p>From our iron salts, we contribute with our customers in designing chemicals to optimize the cost per cubic meter of treated water, wastewater and drinking both, and support them in compliance with the standards to which they are subject. We are professional in production, handling and transport of these products.</p>'),(4,'CATALOGOS','','',2,'2016-05-21 15:12:04',NULL,NULL,'',''),(5,'QUIENES SOMOS',' <p>Somos una organización dedicada a generar valor y compartir riqueza. Estamos convencidos que el Ganar Ganar es el enfoque para la sustentabilidad en el largo plazo, y vaya que entendemos el largo plazo, habiendo iniciado nuestras operaciones en 1969. En este período, vivimos desde una economía cerrada hasta una economía totalmente globalizada; encontramos en este trayecto la oportunidad de ser innovadores y pioneros en algunos sectores; tuvimos tropezones, y aprendimos a levantarnos.</p>\r\n        <p>En el 2008 vivimos un momento decisivo, dejamos atrás viejos paradigmas, nos reinventamos, buscamos la internacionalización, evolucionamos entendiendo que el mercado evolucionaba, porque vivimos para generar valor en el mercado. Y aquí estamos.</p>\r\n        <p>Nuestro punto de partida en la generación de valor, radica en los elementos Magnesio, Hierro, Zinc y Manganeso, con los que desarrollamos y fabricamos productos para diferentes necesidades productivas, Nutrición Vegetal y Tratamiento de Aguas, entre otras industrias.</p>\r\n        <p>La trayectoria recorrida nos ha recompensado con el buen reconocimiento de parte de nuestros clientes, proveedores y colaboradores, siendo este buen prestigio un activo muy importante para nosotros.</p>\r\n        <p>Si te interesa el generar valor en el largo plazo, y nuestros productos y servicios van de la mano con tu operación, contáctanos, encontraremos la mejor manera de generar negocios juntos.</p>','20160526001312.png',1,'2016-05-21 15:12:04','2016-05-28 22:48:27',NULL,'ABOUT US','<p>We are an organization dedicated to creating value and wealth sharing. We are convinced that the Win Win is the approach to sustainability in the long term, will we understand the long term, having started our operations in 1969. In this period, we live from a closed economy to a fully globalized economy; we find in this way the opportunity to be innovative and pioneering in some sectors; We had stumbled, and learned to rise.</p>\r\n<p>In 2008 we live a decisive moment, we leave behind old paradigms, reinvent ourselves, we seek internationalization, evolved understanding that the market evolved, because we live to create value in the market. And here we are.</p>\r\n<p>Our starting point in generating value lies in magnesium, iron, zinc and manganese elements, which develop and manufacture products for different production needs, plant nutrition and water treatment, among other industries.</p>\r\n<p>The tour path has rewarded us with good recognition from our customers, suppliers and partners and this good prestige a very important asset for us.</p>\r\n<p>If you are interested in creating value in the long term, and our products and services go hand in hand with your operation, contact us, we will find the best way to generate business together.</p>');

#
# Structure for table "orders"
#

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_gross` double NOT NULL DEFAULT '0',
  `protection_eligibility` varchar(255) NOT NULL DEFAULT '',
  `address_status` varchar(255) NOT NULL DEFAULT '',
  `payer_id` varchar(255) NOT NULL DEFAULT '',
  `tax` double NOT NULL DEFAULT '0',
  `address_street` varchar(255) NOT NULL DEFAULT '',
  `payment_date` varchar(255) NOT NULL DEFAULT '',
  `payment_status` varchar(255) NOT NULL DEFAULT '',
  `charset` varchar(255) NOT NULL DEFAULT '',
  `address_zip` varchar(255) NOT NULL DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `address_country_code` varchar(255) NOT NULL DEFAULT '',
  `address_name` varchar(255) NOT NULL DEFAULT '',
  `notify_version` varchar(255) NOT NULL DEFAULT '',
  `custom` varchar(255) NOT NULL DEFAULT '',
  `payer_status` varchar(255) NOT NULL DEFAULT '',
  `business` varchar(255) NOT NULL DEFAULT '',
  `address_country` varchar(255) NOT NULL DEFAULT '',
  `address_city` varchar(255) NOT NULL DEFAULT '',
  `quantity` varchar(255) NOT NULL DEFAULT '',
  `payer_email` varchar(255) NOT NULL DEFAULT '',
  `verify_sign` text NOT NULL,
  `txn_id` varchar(255) NOT NULL DEFAULT '',
  `payment_type` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `address_state` varchar(255) NOT NULL DEFAULT '',
  `receiver_email` varchar(255) NOT NULL DEFAULT '',
  `payment_fee` varchar(255) NOT NULL DEFAULT '',
  `receiver_id` varchar(255) NOT NULL DEFAULT '',
  `pending_reason` varchar(255) NOT NULL DEFAULT '',
  `txn_type` varchar(255) NOT NULL DEFAULT '',
  `item_name` text NOT NULL,
  `mc_currency` varchar(255) NOT NULL DEFAULT '',
  `item_number` varchar(255) NOT NULL DEFAULT '',
  `residence_country` varchar(255) NOT NULL DEFAULT '',
  `test_ipn` varchar(255) NOT NULL DEFAULT '',
  `handling_amount` double NOT NULL DEFAULT '0',
  `transaction_subject` varchar(255) NOT NULL DEFAULT '',
  `payment_gross` varchar(255) NOT NULL DEFAULT '',
  `shipping` varchar(255) NOT NULL DEFAULT '',
  `merchant_return_link` varchar(255) NOT NULL DEFAULT '',
  `auth` text NOT NULL,
  `mc_fee` double NOT NULL DEFAULT '0',
  `dressed` enum('no','yes') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "orders"
#

INSERT INTO `orders` VALUES (1,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(2,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(3,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(4,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(5,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(6,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(7,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(8,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(9,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(10,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no'),(11,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'yes'),(12,52,'Ineligible','unconfirmed','SD8GB2HNTUY68',0,'Calle Juarez 1','10:45:40 May 28, 2016 PDT','Pending','windows-1252','11580','test','MX','test buyer','3.8','52.00','verified','fersaavedra85-buyer-1@hotmail.com','Mexico','Miguel Hidalgo','1','fersaavedra85-buyer@hotmail.com','Ap6Y3IqOWtn0z4goj8LNIt1sobXAADdCLn5xZl.FZQ.S6xWKGASacAo8','2NW03390M3121784L','instant','buyer','Ciudad de Mexico','fersaavedra85-buyer-1@hotmail.com','','N3KCELP6QYGB2','paymentreview','web_accept','PRODUCTO PRUEBA PROfer G-14','MXN','Nombre del comprador','MX','1',0,'','','0.00','haga clic aqu?','ATJzpMyVgCLG2BEdSzDmCX7YTMG4osf-NKF6GeQXSIvibpmiErmv0XnMeIC2PzGR.Rke4tGyYqdrZAoU3hCNguA',7.02,'no');

#
# Structure for table "orders_product"
#

DROP TABLE IF EXISTS `orders_product`;
CREATE TABLE `orders_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "orders_product"
#

INSERT INTO `orders_product` VALUES (1,12,'1',5),(2,12,'15',6),(3,12,'38',1);

#
# Structure for table "sliders"
#

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_image` varchar(255) NOT NULL DEFAULT '',
  `contend_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "sliders"
#

INSERT INTO `sliders` VALUES (11,'20160522225933.png',1,'2016-05-22 22:59:33','2016-05-26 13:18:28',NULL),(12,'20160522230201.png',2,'2016-05-22 23:02:01','2016-05-28 15:02:27',NULL),(13,'20160522230328.png',3,'2016-05-22 23:03:28','2016-05-28 15:02:45',NULL),(14,'20160522230356.png',4,'2016-05-22 23:03:56','2016-05-28 15:04:30',NULL),(15,'20160522230434.png',5,'2016-05-22 23:04:34','2016-05-28 15:08:31',NULL);

#
# Structure for table "sliders_text"
#

DROP TABLE IF EXISTS `sliders_text`;
CREATE TABLE `sliders_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL DEFAULT '',
  `slider_id` int(11) NOT NULL DEFAULT '0',
  `text_english` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#
# Data for table "sliders_text"
#

INSERT INTO `sliders_text` VALUES (10,'Especialidades de Nutrición Vegetal',11,' Plant Nutrition Specialties'),(11,'División industrial',12,' Industrial division'),(12,'Fe',13,'Fe'),(13,' Zn',13,' Zn'),(14,' Mn',13,' Mn'),(15,' B',13,' B'),(16,' Mo',13,' Mo'),(17,' SO4',13,' SO4'),(18,' Cl',13,' Cl'),(19,'Tratamiento de aguas',14,'Water treatment'),(20,'¡Generamos valor para tu negocio!',15,'Create value for your business!');

#
# Structure for table "texts_english"
#

DROP TABLE IF EXISTS `texts_english`;
CREATE TABLE `texts_english` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `var` varchar(55) NOT NULL DEFAULT '',
  `text` varchar(255) NOT NULL DEFAULT '',
  `text_english` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#
# Data for table "texts_english"
#

INSERT INTO `texts_english` VALUES (1,'home','INICIO','HOME'),(2,'catalog','CATÁLOGO','CATALOG'),(3,'contact','CONTACTO ','CONTACT'),(4,'show_catalog','Ver Catálogo','Show catalog'),(5,'product','PRODUCTOS','PRODUCTS'),(6,'description','DESCRIPCIÓN','DESCRIPTION'),(7,'composition','COMPOSICIÓN','COMPOSITION'),(8,'add_cart','Agregar a tu compra','\r\nAdd to your cart'),(9,'download_catalog','DESCARGAR EL CATALOGO','\r\nDOWNLOAD THE CATALOG'),(10,'your_shopping','Tus compras','Your shopping'),(11,'btn_delete','Eliminar','Delete'),(12,'btn_submit','Enviar','Submit'),(13,'buy_success','<h4 class=\"text-center\">Su compra se a efectuado exitosamente.</h4>\r\n                     <h4 class=\"text-center\">Gracias por su visita.</h4>\r\n\r\n                    <h1 class=\"text-center\">Su numero de orden </h1>','<h4 class=\"text-center\"> Your purchase is to successfully effected . </h4>\r\n                     <h4 class=\"text-center\">  Thanks for visiting. </h4>\r\n\r\n                    <h1 class=\"text-center\"> your order number </h1>'),(14,'buy_errors','<h4 class=\"text-center\">Ocurrio un problema con con la compra</h4>\r\n    <h4 class=\"text-center\">Por favor pongase en contacto con nosotros</h4>','<h4 class=\"text-center\"> There was a problem with the purchase </h4>\r\n    <h4 class=\"text-center\"> please contact us </h4>'),(15,'contact_1','Contáctanos','Contact'),(16,'contact_2','Favor de llenar la siguiente forma','Please complete the following form'),(17,'contact_3','Ingrese su Correo Electrónico','Enter your Email'),(18,'contact_4','Mensaje','Menssage'),(19,'directory','DIRECTORIO','DIRECTORY'),(20,'go_catalog','Ir a catálogo','Go to catalog');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activate` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (7,'fersaavedra85@hotmail.com','fersaavedra85@hotmail.com','$2y$10$ZBeCU.Q3QZCIQ8tfbAfNe.BiLWPc6pyNjk6cxQUy9pqIn7PFlXBEy','GkCmLjnTEDs92EYbteetoFaH7XjPoXJNTYO8ytwGxi3NTQQyPQMDl6uPLnpj','2016-05-26 06:18:00','2016-05-26 13:50:18',0),(9,'prosisa','prosisa','$2y$10$nYxXl.3Mv/./B9Ub3pArq.1I2Fdfy5bOPM/vzckmyTsGJuX9ufYEa','qpvG1gox4NRTa7IBk6Za78TAfkFmJ9YRdtfXuFjh5U4dEELdE20mlGBiwICA','2016-05-26 14:03:21','2016-05-27 00:02:24',0);
