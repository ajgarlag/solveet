#language: es
Característica: Imprime un árbol de asteriscos
  Imprimir un arbol de Navidad hecho de asteriscos con una altura dada

  Escenario: Imprimir un árbol de altura 1
    Dado que planto un arbol de altura "1"
    Cuando convierto el arbol en una cadena
    Entonces obtengo:
      """
      *

      """

  Escenario: Imprimir un árbol de altura 5
    Dado que planto un arbol de altura "5"
    Cuando convierto el arbol en una cadena
    Entonces obtengo:
      """
          *
         ***
        *****
       *******
      *********

      """
