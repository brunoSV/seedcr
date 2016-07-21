 DELIMITER //
create procedure Sp_GetBlogAdmin()
    begin
		select ID, NombreAutor,PathImg,ExtenImg,Cuerpo,Fecha,Titulo, Case when Activo = 1  then 'TRUE' else'FALSE'end as Activo from Blog order by ID desc ;
			
    end
     //
 DELIMITER ;
 drop procedure Sp_GetBlog
 DELIMITER //
create procedure Sp_GetBlog(
    in pIdioma int)
    begin
		select ID, NombreAutor,PathImg,ExtenImg,Cuerpo,Fecha,Titulo, Case when Activo = 1  then 'TRUE' else'FALSE'end as Activo from Blog 
        where Activo + pIdioma order by ID desc ;
			
    end
     //
 DELIMITER ;
 
