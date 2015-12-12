delimiter $$
DROP PROCEDURE IF EXISTS certificados$$
create procedure certificados(usuario int)
    begin
        select 
            s.logotipo_sponsor,
            s.logo_tipo_certificado,
            concat(u.firstname, concat(' ', u.lastname)) as nombre, 
            u.idnumber, 
            s.nombre as servicio, 
            s.porcentaje_horas_curso as horas, 
            GROUP_CONCAT(m.nombre) as modulos, 
            s.sucursal,
            s.fecha_final,
            s.firma_convenio
        from tbl_servicios as s
        left join tbl_modulosxservicio as ms
            on ms.servicio_id = s.id
        left join tbl_modulos as m
            on ms.modulo = m.id
        join tbl_usuarios_matriculados as um
            on um.id_servicio = s.id
        join icntc_user as u
            on um.id_user = u.id and u.id = usuario
        ;
    end$$
delimiter ;

call certificados(1);
