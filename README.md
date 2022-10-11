ATENÇÃO: Caso tenha interesse em explorar este projeto, por favor leia este texto antes. Aqui apresentamos o enunciado do problema. Após ler este arquivo com o enunciado, leia o arquivo INSTRUCOES.md

1. PROBLEMA: Será realizado um sistema para gerenciar um concurso para preenchimento de vagas em 12 cargos, para até 9999 (nove mil novecentos e noventa e nove) candidatos, conforme especificação a seguir:

      CÓDIGO  DO CARGO        DESCRIÇÃO DO CARGO         NÚMERO DE VAGAS

             1                Enganador de chefe                 20

             2                Enrolador de trabalho              15

             3                Pensador                           17

             4                Analista de sistemas               18

             5                Degustador de cerveja              15

             6                Técnico em redes                   20

             7                Contador de estórias               14

             8                Sai da aula antes                  12

             9                Açougueiro limpinho                17

             10               Segurança de banheiro              18

             11               Gestor de borboletas               17

             12               Agente leva e traz                 20      


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

4. O cadastro inicial (formulário) deverá conter:

      - Número de inscrição (4 dígitos) -------- VALIDAR (1 até 9999)
      - 