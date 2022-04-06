# TRIS

## Descrizione 
Ho realizzato questo progetto utilizzando una GridView in cui è inserita una lista di 9 elementi momentaneamente vuota.<br>
Questa lista viene utilizzata per memorizzare i simboli del tris.<br>
Ogni quadrato può essere cliccato e comparirà rispettivamente il simbolo O che è il simbolo dell'umano mentre X del computer <br>

## Metodo _tapped
Questo è il metodo che gestisce il click dell'utente, quando viene premuto inserisce 'O' nella casella.<br>
Ogni volta che l'utente clicca, il computer inserisce randomicamnte 'X' in una casella<br>
Ogni volta che viene chiamato il metodo si controlla il metodo _vittoria.
Quando qualcuno vince non si può più cliccare nelle caselle

## Metodo _vittoria
Semplicemente controlla ad ogni pressione se qualcuno ha vinto controllando tutte le righe, colonne e le due diagonali.<br>

## Metodo _stampa
Stampa a schermo il vincitore

## Metodo _ricarica
Viene chiamato quando viene premuto il bottone in basso a destra.<br>
Semplicemnte cancella la partita giocata.

