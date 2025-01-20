/*

ALTER TABLE usuarios MODIFY email VARCHAR(100) COLLATE utf8_bin;

Foi descartado esse comando, pois estava apenas aceitando caracteres minusculos no e-mail e acaba dificutando a experiencia de acesso do usuário.
Então foi voltado para a versão comum do MySQL


ALTER TABLE usuarios MODIFY email VARCHAR(100) COLLATE utf8mb4_0900_ai_ci;

*/