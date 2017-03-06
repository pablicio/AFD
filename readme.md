Instruções:

as entradas para o autômato devem seguir estes formatos, separadas pelas "," e ":" como segue

$estados = q0,q1,q2

$transicoes = q0:a:q0,q0:b:q1,q1:a:q1,q1:b:q2,q2:a:q2,q2:b:q2

$estado_inicial = q0

$estado_final = q3

alfabeto = a,b


depois de criar o autômato, crie caixas de texto que receberão as palavras, que após clicar no botão
será mostrado o caminho seguido e se foram ou não reconhecidas

pode-se criar autômatos de tamanhos variados, desde que se sigam as regras de formação dos autômato
informando todas as possibilidades de traansições