ATENÇÃO: Caso tenha interesse em explorar este projeto, por favor leia este texto antes. Aqui apresentamos o enunciado do problema. Após ler este arquivo com o enunciado, leia o arquivo INSTRUCOES.md, onde explicamos como executar o projeto passo a passo. Este projeto foi inicialmente implementado
com a linguagem PHP e em sua maior parte utilizando o paradigma estruturado (procedural), e está sendo
reestruturado utilizando orientação a objetos. A estruturação do front-end com JavaScript, CSS e HTML
também está sendo elaborada.

1. PROBLEMA: Será realizado um sistema para gerenciar um concurso para preenchimento de vagas em 12 cargos, para até 9999 (nove mil novecentos e noventa e nove) candidatos, conforme especificação a seguir:

      CÓDIGO  DO CARGO ------- DESCRIÇÃO DO CARGO -------- NÚMERO DE VAGAS

             1                Programador PHP                    20

             2                Desenvolvedor Web Full Stack       15

             3                Programador Java                   17

             4                Programador Python                 18

             5                Programador C++                    15

             6                Desenvolvedor front-end            20

             7                Desenvolvedor back-end             14

             8                Analista de Infraestrutura         12

             9                Analista de Suporte                17

             10               Analista de redes                  18

             11               Analista de Cyber Security         17

             12               Engenheiro de Cloud Computing      20 

                                                      TOTAL VAGAS: 203     


2. O concurso será realizado num único dia, e será aplicada uma prova de múltipla escolha com um total de 60 questões, com as disciplinas distribuidas da seguinte maneira:


  5 questões de L.E.M **            (1) - Máximo de 100 pontos (20 por acerto)

  10 questões de matemática         (2) - Máximo de 100 pontos (10 por acerto)

  10 questões de lógica             (3) - Máximo de 100 pontos (10 por acerto)

  20 questões de C.E.C ***          (4) - Máximo de 100 pontos (05 por acerto)

  10 questões de informática        (5) - Máximo de 100 pontos (10 por acerto)

  5 questões de atualidades         (6) - Máximo de 100 pontos (20 por acerto)
      
     **  Língua estrangeira moderna
     *** Conhecimentos específicos do cargo

3. As vagas nos cargos serão preenchidas pela ordem DEECRESCENTE da SOMA das notas das seis disciplinas, sendo o critério de desempate de acordo com a ordem a seguir:


      - Maior nota em C.E.C             (4)
      - Maior nota em informática       (5)
      - Maior nota em lógica            (3)
      - Maior nota em matemática        (2)
      - Maior nota em atualidades       (6)
      - Maior nota em L.E.M             (1)
      - Maior IDADE

4. O cadastro inicial (via formulário) deverá conter:

      - Número de inscrição (4 dígitos)   -------------- VALIDAR (1 até 9999)
      - Nome do candidato (35 caracteres)
      - CPF (11 dígitos)-------------------------------- VALIDAR
      - Data de nascimento (8 dígitos) ----------------- VALIDAR
      - Cargo escolhido (código do cargo, 2 digitos)---- VALIDAR

5. Elabore um sistema WEB com Banco de Dados para administrar este concurso (leia o arquivo INSTRUCOES.md)