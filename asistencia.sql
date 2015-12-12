
delimiter $$
DROP PROCEDURE IF EXISTS asistencia$$
create procedure asistencia(usuario int)
    begin
        select u.id_user, u.id_servicio, count(a.id) asistencia, ms.id, count(s.id) as clases, (count(a.id)*100/count(s.id)) as porcentaje
            from tbl_usuarios_matriculados as u 
        join tbl_modulosxservicio as ms on ms.servicio_id = u.id_servicio and u.id_user = usuario
        left join tbl_sesiones as s on s.moduloxservicio = ms.id
        left join tbl_asistencia_servicio as a on a.usuario = u.id_user and a.moduloxservicio = ms.id 
        group by u.id_user, ms.servicio_id
        ;
    end$$
delimiter ;

call asistencia(176);