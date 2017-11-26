select * from usuarios;
select * from perfil;
CREATE TRIGGER TRInserID AFTER INSERT ON USUARIOS
  FOR EACH ROW
		INSERT INTO Perfil (iduser)
        VALUES (NEW.IDUser);
  
INSERT INTO Usuarios (Nome, Sobrenome, DataNascimento, Sexo, Telefone, Email, Senha)
values ('Teste', 'Testando', '1994-11-24', 'Outro', '1195847523', 'tste@teste.com', 'teste');  