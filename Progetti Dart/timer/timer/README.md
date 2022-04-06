# Timer
## Funzionamento
In generale il cronometro funziona tramite gli stream con async e await.<br>
Ho riscontrato un problema nel reset mentre era in corsa, l'ho risolto togliendo il bottone mentre il cronometro sta andando.

## _incrementCounter
Qua creo lo stream, successivamente controlla se è in pausa o reset, poi aggiorna con un setState il valore l'output del cronometro.<br>
Con la funzione padLeft() imposto che ci devono essere due cifre al per ore, minuti e secondi.<br>

## start
Faccio un controllo se non è in pausa faccio partire il cronometro.

## pause
Metto in pausa il cronometro salvando il valore alla quale ho stoppato.

## reset
Metto il valore del cronometro a 0 e metto in pausa il cronometro.

### Info
Ho consegnato il programma dopo le 2 ore di laboratorio poichè ho avuto un problema al PC di casa