#language: es
Característica: Mina de diamantes
  Dada una mina de diamantes, representada mediante una cadena de caracteres '<'
  y '>' de cualquier longitud y orden, devolver el número de diamantes que
  existen en la mina.
  Un diamante está formado por el símbolo '<' seguido de '>', esto es "<>". Hay
  que tener en cuenta que cada vez que se extrae un diamante podría formarse
  otro.

  Escenario: Extraer de una veta vacía
    Dado que tengo una mina
    Cuando encuentro una veta ""
    Entonces obtengo "0" diamantes

  Escenario: Extraer de una veta de un diamante
    Dado que tengo una mina
    Cuando encuentro una veta "<>"
    Entonces obtengo "1" diamantes

  Escenario: Extraer de una veta de dos diamantes
    Dado que tengo una mina
    Cuando encuentro una veta "<<>>"
    Entonces obtengo "2" diamantes

  Escenario: Extraer de una veta de tres diamantes
    Dado que tengo una mina
    Cuando encuentro una veta "<><<>><<"
    Entonces obtengo "3" diamantes