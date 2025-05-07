Database: depositi di dati che sono alla bas di molte tecnologie del mondo moderno, danno accesso a molte informazioni

Possono essere: testo, numeri, immagini, audio, video...

Database non relazionali: categoria progettata per la gestione di dati non strutturati o semi strutturati. NoSQL-> non sono limitati all'interrogazione SQL ma rappresentano approcci diversi alla gestione dati

Database relazionali: sono i più comuni e ci permettono di organizzare e gestire i dati in tabelle, righe chiamate record, colonne aka campi.

Una tabella deve avere un nome, deve essere parlante, nelle colonne definiamo i dati simili, nelle righe inseriamo le definizioni stessa logica di chiave e attributo.

id sono fondamentali nei database relazionali-> chiave primaria che ci permette di identificare un singolo studente in maniera unica. Ci permette di creare relazioni di varie tabelle. ogni id ha un ordine incrementale per avere un database pulito e ordinato.

Chiave secondaria: permette di relazione delle definizioni da unn'altra tabella

comandi da lanciare per mysql winpty mysql -u root -p 

mysql> show databases; se ne voglio usare uno specifico inserisco mysql> use nome;

mysql> show tables;-> mostra tutte le tabelle

mysql> SELECT * FROM 'nome tabella'; se si cancella un id non si sostituisce l'id cone il prodotto.

mysql> create database progetto_db_h164; il - è un carattere non ricnosciuto nella definizione.

php artisan migrate-> va nella cartella database, poi in migration e ci mette a disposizione le tre tabelle di default.

Per creare un db in mysql: winpty mysql - u root -p, inserire la password definita in fase di installazione, creare il db con il comando create database 'nome_db', uscire da mysql con quit o exit

Passaggi aghgiuntivi: andare nel .env e assicurarsi che in DB_DATABASE ci sia il nome assegnato in myspl

alla chiave password inserite la password di mysql

lanciare il comando php artisan migrate

per creare una tabella nel db devo fare: php artisan make:migration create_movies_table

creo una colonna che i chioami id, accetta un tipo di dato numerico, incrementale. 

per creare una colonna che si chiama table, senza una stringa, prima che ti tolgono il cliente

timestamps: crea due colonne che accettano come tipo di dato una data, e si chiamano created_at e updated_at
