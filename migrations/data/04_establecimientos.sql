--
-- Volcado de datos para la tabla `estado_ciclo_lectivo`
--
INSERT INTO estado_ciclo_lectivo (descripcion, nombre_interno) VALUES 
('Generado', 'generado'),
('Activo', 'activo'),
('Finalizado', 'finalizado'),
('Cerrado', 'cerrado');

--
-- Volcado de datos para la tabla `ciclos_lectivos`
--
-- INSERT INTO ciclos_lectivos (anio, fecha_inicio, descripcion, estado_id, activo) VALUES 
-- (YEAR(NOW()), NOW(), CONCAT('Ciclo Lectivo ', YEAR(NOW())), 1, true);

--
-- Volcado de datos para la tabla `ciclos_lectivos_estados`
--
-- INSERT INTO ciclos_lectivos_estados (ciclo_lectivo_id, estado_id, fecha) VALUES (1, 1, NOW());
-- INSERT INTO ciclos_lectivos_estados (ciclo_lectivo_id, estado_id, fecha) VALUES (1, 2, NOW());

