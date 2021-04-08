# Projekt 1 raport

## Uppgift detaljer 
### Uppgift 1
Första uppgiften är väldigt simpel och lätt. Att se info på phpinfo och hämta den infon var som att välja saker ur en meny. Inget komplicerat här.

### Uppgift 2
Detta var bra repetition om web baserad tid och datum hantering. Att sedan skriva ut på svenska är så lätt som att skapa en array där man har svaren i korresponderande ordning som informationen tas emot.

### Uppgift 3
Formuläret var svåraste av första tre uppgifterna. Skulle det endast varit dagar så tror jag det inte varit lika problematiskt, men tiden gjorde det lite av en "curveball" och i tidigare versioner av formuläret så orsakade det felaktiga svar. Formuläret kräver ett giltigt datum och man kan endast fylla dagar som existerar. Man kan köra formuläret med 29 dagar i februari på skottår men inte normala år.
#### Tidsproblemet
Det svåra var ju att få jämförelser som faktiskt stämmer på sekunden. För det så behövde tiden ändras BEROENDE på om datumet var i framtiden eller bakåt i tiden, eftersom det skilje 24 timmar på gränserna till datumet. Detta hade jag inte fixat för och gått vidare ifrån, men nu då man känner större självförtroende för språket så gick det ganska smärtfritt faktiskt att implementera fixen.

### Uppgift 4
Uppgiften gjordes lätt när det finns enkla och tydliga tutorials på nätet. Slumpmässigt lösenord skapas genom att en array på alfabetets karaktärer och nummer symboler blir valda och appended nio gånger på raken.

### Uppgift 5
Cookies är simpla och lätta att skapa MEN jag hade inte förstått limiteringarna. Jag hade fått för mig att cookies hade ett namn, en array av information och sedan en deadline. Jag hade fel... bonuspoängerna säkrades först när jag fick hjälp att förstå på ett kodtillfälle. Då gjode jag istället så att info skrevs i en sträng med en symbol divider som sedan "explode"as för att skrivas ut enskillt. Tror att det finns en hel del tekniker att lära sig med cookies.
Fast rykten säger ju att cookies är på väg ut...

### Uppgift 6
Jag gillar väldigt mycket att bygga och leka med PHP-Sessions. Kanske fusk att ha arbetat extensivt på projekt 2 och sedan komma tillbaka till projekt 1 på det här sättet. Det blir ju svårt att tycka det var svårt den här gången. Jag minns att det inte var så svårt förra gången heller men vid det laget hade jag inte blivit tillräckligt bekväm med sessions. Jag utökade skakigt det du redan gjort på lektionen. Nu så känner jag att jag kan designa hela Session backend till alla möjliga sidor utan problem (har t.om experimenterat på egna projekt på sidan)

### Uppgift 7
Denna uppgift är lite av en copy pasta, men den funkade faktiskt inte till först. Filrättigheterna för att kunna ladda till folder fixades genom FileZilla. Det som inte funkade var att försöka limitta storleken på filen. Då jag flippade checken från IF störr till IF mindre så var båda statements true... Nu för att jag lider av paranoia syndrom så bestämade jag mig för att kommentera bort size checken å då funkar uploaden finfint.
För att users ska få se bilderna så bestämde jag mig för att det var fint att göra alla bilder mindre så att man lätt ser vilka bilder existerar.

### Uppgift 8
Denna uppgift är väldigt simpel om man delar den på tre. Samla information du vill spara i variabler, skriv de sedan till en rad i en fil och till sist, läs antalet rader. OBS eftersom jag skriver in ny rad i slutet på varje input så kommer radräknaren ha en visitor för mycket. Så innan siffran skrivs ut tar vi bort en för att inte bli anklagade för fake news. För extrema poängen på slutet med specifika besökare så krävs det lite extra effort.
#### Besökarens nr
Hade faktiskt en del problem med hur man skulle räkna current user på ett smidigt sätt. Problemena var att inte bara räkna ett resultat, att inte bara få ett true statement att stringen finns i texten, att få hela documentet i en string.
Slutliga lösningen kanske inte är det som gör dig mest glad att se men den funkar och är kort i kod.

### Uppgift 9
En av de krångligaste uppgifterna att få finslipat. Ganska många försök tills det blev någorlunda rätt.
Att skriva till gästboken var det lättaste med uppgiften men två stora saker gav problem.
#### 1 - Att skriva ut
Att få en loop med fopen fread visade sig vara så krånglig att jag gick runt problemet helt enkelt med splFileObject... om man söker problem med loopar i fread fopen så gav resultaten problem och svar som inte motsvarade de problem som uppstod för mig.
#### 2 - Kan inte få bort formen
När man refreshar sidan EFTER att ha submittat en gång kommer php att försöka köra koden igen... Jag försökte bygga en redirect som skulle temporärt skicka dig till redirect.php MEN hur jag änn försökte så hade min sida nu en bugg som gör att header inte fungerar. Detta gör att jag inte lyckades skapa en metod där form rensas ut och har nu dubbletterings buggen kvar...

### Uppgift 10
#### Ny stil på mina rapporter.
Jag ville ändra på hur jag skriver rapporter. Ganska klumpigt att i VScode skriva h2 och p slut taggar och manuella br.
Jag tyckte parsedown är praktiskt men om du tycker det är fuskigt så får du säga i feedbacken.
Kollade förstås rättigheterna för koden som används för att parsea readme format och det var fullt öppet och lagligt att använda nu och för all framtid i alla sammanhang.
#### Och med ett lättare format...
...så blir det roligare att göra rapporter om projekt. Det känns ibland som ett hinder att fundera ut formatering för projekt när det brinner i knutarna från många andra svåra bitar av olika projekt.
## Feedback för dig Dennis
För PHP kursen skulle jag säga åt elever att INTE använda chrome som testbrowser. Tydligt flera elever som är helt förvirrade varför deras deluppgift inte funkade när koden inte funkade i Firefox men gjorde det i Chrome. Jag fattar att för att bli färdiga till yrkes livet skall vi "cover all our bases", checka alla saker. Men eftersom Chrome är så förlåtande tror jag mycket MER tid sparas av att direkt testa i firefox och SEDAN testa i chrome också istället för tvärtom. (OBS DENNA FEEDBACK GÄLLER HELA KURSEN OCH INTE BARA PROJEKT 1)
#### Slutkommentar: Projekt 1 - Lagom stor, utmanande och rolig.

## NEXT TIME -> Projekt 2