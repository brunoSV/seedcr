 DELIMITER //
create procedure Sp_GetBlog()
    begin
		select ID, NombreAutor,PathImg,ExtenImg,Cuerpo,Fecha,Titulo, Case when Activo = 1  then 'TRUE' else'FALSE'end as Activo from Blog ;
			
    end
     //
 DELIMITER ;
 
