 DELIMITER //
create procedure Sp_GetBlog()
    begin
		select ID, NombreAutor,PathImg,Cuerpo,Fecha,Titulo  from Blog
        where Activo = 1 ;
			
    end
     //
 DELIMITER ;
 
 
