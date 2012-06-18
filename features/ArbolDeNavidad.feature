#language: es
Característica: Imprime un árbol de asteriscos
  Imprimir un arbol de Navidad hecho de asteriscos con una altura dada

  Escenario: Imprimir un árbol de altura 1
    Dado tengo que plantar un arbol
    Cuando planto una semilla "1"
    Entonces crece el arbol:
      """
      *

      """

  Escenario: Imprimir un árbol de altura 5
    Dado tengo que plantar un arbol
    Cuando planto una semilla "5"
    Entonces crece el arbol:
      """
          *
         ***
        *****
       *******
      *********

      """

  Escenario: Imprimir un árbol de altura 0
    Dado tengo que plantar un arbol
    Cuando planto una semilla "0"
    Entonces crece el arbol:
      """


      """
