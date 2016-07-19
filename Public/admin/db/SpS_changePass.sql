 DELIMITER //
create procedure Sp_GetEmail(
	in pUser varchar(200))
    begin
		select Correo from Usuarios where pUser = Usuario;
    end
     //
 DELIMITER ;
DELIMITER //
create procedure Sp_SetPass(
	in pUser varchar(200),
    in pPass varchar(2000))
    begin
		update Usuarios
         set Pass = pPass 
         where Usuario = pUser;
    end
     //
 DELIMITER ;
 DELIMITER //
create procedure Sp_InsertUser(
	in pUser varchar(200),
    in pPass varchar(2000),
    in pEmail varchar(2000))
    begin
		if ( not exists (select count(1) from Usuarios
					where Usuario = pUser 
					   or Correo = pEmail)) then
                       insert into Usuarios (Usuario,Pass,Correo)
                       values(pUser,pPass,pEmail);
                       select 1 as res;
		else
			select -1 as res;
		end if;
    end
     //
 DELIMITER ;
 