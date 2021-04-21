# Projekt 2
Funkade det ok?
## SQL Databas (Uppgift 1)
Min databas består av två tabeller: users och comments (OBS Relations diagram i slutet på rapporten). Vi kan börja med users.
## Tabell: users
Före jag ens började med mitt projekt hade jag redan en ideé om att jag ville ha tabell med user info där så mycket som möjligt om användaren finns. Den enda kolumnen som inte fanns i början var likes. Jag TRODDE först att jag skulle lägga likes i comments tabellen för det är samma kategori av information. Men när jag började skapa min comments tabell så hade visade sig allt för mycket mer komplicerat att ha likes i en separat tabell, varför??? Teorin bakom comments tabellen är att var och en comment är en unik bit som kan få sina egna comments. Sedan för att veta om en comment tillhör en profil ID eller en comment ID så använder jag en tinyint för att checka 0 eller 1 för en eller den andre. (Mera om comments senare)
### users ROW: ID (INT)
Automatiskt designerad Heltals nummer. Inga ID's är samma och är primära cellen för att identifiera en user
### users ROW: username (varchar)
Användaren får välja själv ett användarnamn när man skapar kontot. Används för att logga in med och kan inte ändras av usern efter kontot skapats. Max 20 characters.
### users ROW: realname (varchar)
Användaren får skriva in sitt namn
### users ROW: password (varchar)
En hashad variant av lösenordet sparas i databasen (tillräckligt med symboler behöver rymmas)
### users ROW: email (varchar)
Spara email
### users ROW: zipcode (varchar)
Spara postkod
### users ROW: bio (varchar)
En lång text med användarens självbeskrivning sparas.
### users ROW: salary (INT)
Bara siffror skrivs in som mängd, då vi fetchar information kan vi välja att sortera i storleks ordning denna column
### users ROW: preference (INT)
Minst information sparas i preference, inga strängar sparas bara siffror. I sidans header så skapas en array med ordningen på preference som korresponderar med siffran i databasen.
### users ROW: likes (INT)
Då en profil skapas så skapas den med 0 som default. Om man har otur får kan man bli nedröstad till ett negativt tal

## Tabell: Comments
Comments har en unik ID som identifierar den. Page ID är där för att peka vart kommentaren hör, den kan höra till en profil eller till en annan kommentar, en enkel bool gör det lättare för profiler att söka endast profil kommentarer och kommentarer att endast hämta kommentarer som hör till kommentarer.
### comments ROW: commentid (INT)
Varje kommentar som sparas får en unik ID automatiskt (Unik för denna kolumn inte för databasen)
### comments ROW: pageid (INT)
Pageid är den ID dit kommentaren hör. Jag ville göra det möjligt att kommentera på kommentarer. Så en profil skulle hämta comments med pageid som matchar profil id (Relation) MEN om reply är 1 så refererar pageid till en commentid. Då skulle comments ha sina egna fetchers som kollar genom comments tabellen, endast drar rader som har reply: 1 (profiler hämtar bara komments med reply: 0 såklart). Varje comment.php skulle ha en egen liten reply ruta och reply rutor i comment rutor skulle skriva till databasen reply: 1 då man kommenterar.
### comments ROW: tstamp (timestamp)
För att kunna skriva tiden då kommenten gjordes och sortera enligt nyaste.
### comments ROW: comment (varchar)
Själva kommentaren
### comments ROW: posterid (INT)
Här kommer IDn till den som skickar kommentaren. Då skulle man sluppit skriva in namnet i denna tabell, istället skulle man bara hämta realname där posterID från "comments" är samma som "users" ID. När jag krånglade runt med att kunna svara på kommentarer så gjorde jag det lätt för php sidan att bara kunna skriva ut från samma $row som redan hämtats:
### comments ROW: postername (varchar)
$row['postername']
### comments ROW: reply (tinyint)
0 eller 1, funkar som en bool för att avgöra ifall pageid (eller VART hör denna comment, till vilken "page"), hör till en userid (comment rakt på profilsidan) eller en annan commentid (comment svar på en annan comment).

## Va betyder detta då??
Användare och användar data i en tabell, alla kommentarer till allt i en och samma tabell.

## Användarhantering (Uppgift 2)
Då man öppnar hemsidan så kollar servern om en user Session variabel existerar. Ifall den inte gör det så presenteras man med länkar till Login eller Registrering. Då man registerar sig kan man fylla i all information i users tabellen förutom ID. (databasen har gåtts igenom ovanför).
Lösenordet man väljer checkas för cross site scripting och sedan hashas lösenordet med sha256. Samma då man vill logga in så hashas lösenordet innan det kollas med databasen.

### Uppgift 3
Information från databasen hämtas på flera tillfällen i sidan. Då man loggar in så skrivs SESSION variabler med information rakt från databasen. Om man är inloggad så skrivs en egen profil information ut i index. Till sist så hämtas information enligt filtrerad önskan i annons sidan och om man klickar på en annons så skrivs endast information enligt tre olika situationer: Ej inloggad, inloggad och ser annans profil, inloggad och ser sin egen profil. Det var relativt enkelt att hämta information. Ja undrar om jag gjort det på ett fuskis sätt när jag ofta hämtar en hel row med information bara för jag tyckte det var lätt. Borde man oftare endast ta specifik data? Let me know ifall det finns något jag borde veta.

### Uppgift 4
Registrerings formuläret var relativt lätt om man vet hur php formulär fungerar. Viktiga detaljer är method="" action="" name="" och if isset. Om man förstår dessa saker så är SQL sedan lätt om man kör enligt recept. MEN det fanns något som var svårare. Jag hade problem med dubblering av rows. En ny row skrevs in när man efter kollat att allt är ok executar inskrivningen, men då gjorde en if sats baserat på execute så skrevs en till row in fastän den existerade innuti if satsen. Spenderade god tid på att hitta omvägar runt detta problem.

### Uppgift 5
Detta kunde ha varit en väldigt enkel uppgift men jag bestämde mig för att göra det svårt för mig själv i stiliseringen. Jag ville att det skulle kännas mera krångligt att ta bort ett konto så först är det en liten ruta man måste pricka med muspekaren och sedan måste man skriva in sitt konto password och trycka delete knappen. Denna uppgift handlade ju om att deletea en row i SQL men jag är ändå rätt stolt över själva user experience som jag skapat i denna uppgift.

### Uppgift 6 och allmänt om PHP/SQL
Ännu en uppgift som gick lätt och smärtfritt. Objekt orienterade SQL delen av koden känns till det mesta väldigt samma. Att hämta, skriva, ändra och ta bort så var SQL det lätta och PHP var det svåra. Vad jag menar med det är att då jag läst mera om SQL så ser jag mycket mera komplicerade industri standarder över hur man skriver ren SQL och vad vi gjorde var att skriva kod i PHP som kommunicerar med en SQL databas.

### Sortera och filtrera (Uppgift 7)
Grunden till denna uppgift blev given av dig Dennis till den milda grad att det fanns inte så mycket mera att göra. Liten modifiering så får man alla specifikationer gjorda. Inget vidare svårt här inte.

## BONUS SAKER
#### Gilla ogilla
users databasen har en likes column. Varje profil har en knapp som increasar likes med ett eller en knapp som decreasar. I det här fallet gjorde jag en if sats som byter ut knapparna med en display över en display av profilens like. På det sättet så driver det fler att rösta på users. Jag såg ingen vits med att skapa like session variabler för min sida är inte byggd på ett sånt sätt att det vore praktiskt eller vettigt. Istället skrivs likes rakt in i databasen.
#### Kommentarer
Man kan kommentera på varje profil vare sig man är inloggad eller ej (OBS man kan INTE kommentera på egen profil).
Jag ville också göra det möjligt att kommentera på andras kommentarer men det var för mycket som kunde gå sönder i processen. Jag har tagit extra kurser detta läsår så det var för mycket värdefull tid som skulle gått åt. ISTÄLLET så nöjjer jag mig med att ha teoriserat över hur det skulle gjorts och det vetande att jag nog med det jag lärt mig genom back-end kurs(er) kan klara av att grejja det.
En liten extra detalj är att jag skapade en user som heter ANONYM som är otillgänglig för site användare. Om man inte är inloggad så blir den kommentaren tilldelad till detta konto. Detta gjorde det lätt att koda så att alla icke inloggade heter Anonym och får en timestamp på kommentaren.

## Elefanten i rummet
Mycket av min rapport är kort och konsis för det är hur min åsyn på projektet är efter all denna tid som jag lagt på PHP och SQL. Jag känner att jag har fast grepp över allt vi rört i denna kurs och kan använda det till "riktiga" projekt. Det var ändå en lång väg dit med flera fallgropar. Inte minst av allt var att jag inte kunnat ana hur många misstag man får ha i en chrome browser. Det här gav mig ett falkst lugn. Koden körde när jag testade den, men den var bruten när den öppnades i firefox. När jag börjat om projekt 2 så har det varit en stor mängd förändringar. Många element togs bort för att ens ha en grund att börja troubleshoota ifrån.

## KURS FEEDBACK
Kurs materialet har gåtts igenom bra och med en mindre klass märker man att det finns mera chans och rum att prata om problem, vad som är svårt och allmänt engagera sig i kursen. Den verkar vara rätt kort och hastig men för mig som nu har färdiga grundkunskaper i php innan kursen började så är det svårt att avgöra eller uttala mig om.