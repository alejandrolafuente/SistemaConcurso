**Antes de ler estas instruções, leia a especificação do projeto no arquivo README.md

Optamos por dividir a explicação deste projeto em duas partes: Na primeira, explicaremos brevemente o formulário do sistema, e na segunda, faremos uma simulação para 1473 candidatos inscritos, utilizando para tal manipulação de arquivos.

1. Abra a pasta "formulario" com seu navegador. Nesta pasta, pode ser encontrado o próprio formulário do sistema, para tal execute o arquivo "formulario.php". Aqui, conforme especificado, será feito o cadastro inicial, onde o candidato deverá digitar os seguintes campos:

- Numero: O número de inscrição do candidato. Por enquanto, estamos assumindo que o usuário poderá "escolher" seu número de inscrição (um número entre 1 e 9999). Porém, num sistema real, é mais apropriado gerar este número automaticamente utilizando uma tabela de Banco de Dados (usaremos a abreviação BD para simplificar) via campo definido na criação da tabela. Este campo é validado.

- Nome: Nome completo do candidato. No momento, optamos por não exigir a validação.

- CPF: CPF que será validado também.

- Dia: Dia de nascimento (validado)

- Mês: Mês de nascimento (validado)

- Ano: Ano de nascimento (validado)

- Cargo: O select "Escolha seu cargo" permite o candidato selecionar sua opção para o concurso.

Os outros arquivos dentro da pasta "formulario", "validacoes.php", "auxiliar.php", e "auxiliar2.php", fazem as validações dos dados digitados pelo usuário.

**Atenção: TODAS as validações são próprias, não foi copiado código pronto da internet!

2. Evidentemente, não temos como simular este projeto sem a ajuda de arquivos. O que faremos agora, é simular o sistema para 1473 candidatos inscritos, utilizando arquivos e criando antes o BD com sua respectiva tabela. Siga as instruções a seguir:

2.1 Antes de qualquer coisa, criaremos o Banco de Dados. Para isto, execute o arquivo "criaBD.php". Este código cria o BD "Concurso". Não esqueça de preencher a variável $password no arquivo credentials.php com sua senha!

2.2 Rode o arquivo "criaTabelas.php". Este código cria as tabelas "Candidato" e "Notas" dentro do BD "Concurso". Optamos por utilizar duas tabelas para ete projeto.

2.3 Agora, vamos inserir os dados dos 1473 candidatos no BD. Rode o arquivo "insere_registros.php". Este código conecta ao BD, abre o arquivo texto "cand.txt", extrai os dados que o candidato digitaria no formulário, faz a conversão para os tipos especificados na tabela caso seja necessário, e grava no BD. Vejamos um exemplo utilizando o primeiro registro do arquivo cand.txt, e prestemos atenção a seu formato:

             5000PRIMEIRAO DA SILVA                 111111111110202200001

Cada registro tem um total de 28 caracteres. "Abriremos" o registro para ficar mais claro:

 num. inscrição   nome(completa com espaços)       CPF       dia   mes   ano cod.cargo
    5000             PRIMEIRAO DA SILVA         11111111111   02   02   2000   01

2.4 Agora que os registros estão no BD, podemos vê-los no navegador. Os arquivos a seguir conectam ao BD, e mostram os registros (candidatos inscritos) de acordo com as seguintes opções:

- "ordemAlfabetica.php" : Este arquivo, ao ser rodado, mostra TODOS os inscritos em ordem ALFABÉTICA.
- "ordemCPF.php": rode este arquivo com o navegador para ver TODOS  os inscritos em ordem de CPF
- "ordemCargoEalfabeticaNoCargo.php": mostra TODOS os inscritos em ordem de cargo, e dentro de cada cargo, em ordem alfabética
- "ordemInscricao.php": rode este arquivo para ver TODOS os inscritos em ordem de número de inscrição

2.5 Ao todo, 1473 candidatos se inscreveram no concurso. Contudo, sempre haverão candidatos que NÂO compareceram na prova. Assim, foi disponibilizado um arquivo texto chamado "faltas.txt" contendo os números de inscrição (completados com zero à esquerda quando necessário) dos candidatos ausentes. Rode o arquivo "insere_faltas.php", que a partir do arquivo "faltas.txt", insere em nossa tabela, no campo "falta", o valor 1 (um) dos candidatos ausentes. Assim, isto evitará computos futuros desnecessários e erros. Como verificar? Simples, rode o arquivo "verifica_faltas.php", que, a partir do BD, imprime na tela do usuário os números de inscrição e o TOTAL de candidatos ausentes, são 102 ausentes no total. Ou seja, dos 1473 inscritos, o total de comparecimentos efetivos foi de 1371 candidatos.

2.6 Agora, precisamos que nosso sistema insira as NOTAS dos candidatos em nosso BD. Para isto, foi disponibilizado um arquivo texto "prova.txt", contendo os números de inscrição de cada candidato (completado com zeros à esquerda quando necessário), e suas respectivas respostas das 60 questões. Observe que estes registros estão ORDENADOS por ordem de inscrição. Vejamos o primeiro registro apenas com fim ilustrativo:

        0001AADCAACAECADDACAAAEAEEAADABCADEAACADDABDAADAACACDABCADBAEDAD

Para realizar este passo, vamos criar, a partir do arquivo "prova.txt", um outro arquivo chamado "notas.txt". Basta rodar o arquivo "cria_notas.php", mas ANTES, observe que neste código, na variável $gaba, carmazenamos a string com o gabarito que escolhemos, no caso do candidato Gabriel Mendes Tulio (ou seja, em nosso sistema este candidato irá "gabaritar" a prova, tirando 100 em todas as disciplinas), veja o arquivo "gabarito.txt" para mais detalhes. Você pode escolher qualquer outro candidato para verificar caso deseje(IMPORTANTE: está sendo criado um formulário para o usuário poder inserir o gabarito de uma maneira mais correta). Rode o "cria_notas.php", que criará o "notas.txt", cujos registros tem o seguinte formato:

                0001  60  40  40  50  50  40


Agora, com o "notas.txt" já criado, é só rodar o arquivo "t9_insere_notas.php", que, a partir do "notas.txt", INSERE em nossa tabela, os campos nota1, nota2, nota3, nota4, nota5, nota6 e soma (que é a soma total das notas).

2.7 Vamos agora, cuidar das classificações e critérios de desempate. Em nossa tabela, foram definidos 3 campos, clg, clc, e ccl:

- clg: é a classificação GERAL do candidato. Este campo será preenchido em TODOS os candidatos que compareceram na prova
- clc: é a classificação NO CARGO ESCOLHIDO. Este campo será preenchido em TODOS os candidatos que compareceram na prova
- ccl: é o CARGO DE CLASSIFICAÇÃO, ou seja, o cargo no qual o candidato foi classificado. Portanto, será preenchido APENAS nos candidatos que foram aprovados no concurso.

Para preencher estes 3 campos, basta rodar o arquivo "t10_1_classificacoes.php".
** IMPORTANTE!: Ao rodar este arquivo, a execução demora uns minutos para fazer os updates, nada demais, se necessário rode o arquivo mais de uma vez, até ele mostrar na tela a saída. Isto evidencia que a solução adotada não é a mais adequada, mas o programa funciona! **

Para verificar a lista de aprovados, basta rodar o "verifica_aprovados.php".

2.8 Finalmente, vamos aos relatórios, rode os seguintes arquivos:

- "t11_1_apro_ordAlf.php": Mostra APENAS os candidatos classificados, por cargo e ordem alfabética dentro do cargo
- "t11_2_todos_ordClas.php": Mostra TODOS os candidatos que compareceram na prova, por ordem de classificação. Marca os candidatos aprovados
- "t11_3_todos_clasGer.php": Mostra TODOS os candidatos que compareceram na prova EM ORDEM DE CLASSIFICAÇÃO GERAL. Marca os candidatos aprovados e imprime o cargo para o qual o mesmo foi aprovado.


3. Considerações a respeito deste projeto

A solução adotada evidentemente pode não ser a melhor, contudo a intenção deste projeto não é provar solução otimizada, e sim que o autor deste projeto possui pelo menos certa base em programação e tem condições de atuar como desenvolvedor iniciante. Se você chegou até aqui, muito obrigado pelo seu tempo!



