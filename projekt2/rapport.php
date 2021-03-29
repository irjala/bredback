<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <img src="../projekt2/images/fighter.jpg" width="450px" height="200px" id="love">
    <h3>Jonas Projekt 2, this time it's personal!</h1>
    <img src="../projekt2/images/users.png"><br>
    <img src="../projekt2/images/comments.png">
    <h2>SQL struktur</h2>
        <p>Jag har allt som bara praktiskt kan sparas till en user i users databasen. Preference är sparas siffra 1-5 för att sedan i php converteras till korrekt sträng.
        Resten av databasen är väldigt rakt på sak. Varje user får ett automatiskt ID nummer.
        Däremot Comments databasen behöver lite förklaring. Varje kommentar får en ID som INTE är relaterad till users id.<br><br>
        <b>Pageid</b> : ID som kommentaren är assigned till<br>
        <b>tstamp</b> : För att kunna sortera enligt kommentaren som är nyast<br>
        <b>posterid</b> : Den som kommenterat (används för att få postarens username<br>
        <b>postername</b> : MEN av praktiska skäl så sparar jag också namnet på den som skrev kommentaren<br>
        <b>reply</b> : För att kunna välja om pageid refererar till en users id eller comments id
    <br><br>
    Jag lämnar kvar en del av Niklas rapport för han försökte faktiskt hjälpa.</p>
    <h3>Men det fanns en tredje i vår grupp...</h3>
    <p>Han låtsades som att han var på samma spår, han var med på lektionerna, men då crunch time kom och vi hade en och en halv vecka så var han tystlåten.
    Jag försökte dra med gossarna och organisera. Postade på gruppchat vad som behövdes göras och hur det skulle göras. Frågade vem som kunde göra vad.
    Han gick med på att ta registrerings formuläret... vilket, om det inte görs, bottle neckar flera viktiga saker. I flera dagar så säger han att han försöker.
    Att det är svårt men han försöker.<br>Till slut börjar jag se på min egen tids schema att om jag skall ha någon chans att kryssa av poäng så MÅSTE
    registrerings formuläret vara klart direkt. Han säger att han inte lyckats ännu och när jag säger att han skall uploade det han gjort ialla fall så vägrar.
    (Vad kan man dra för slutsatser från det) Visade sig att han bokat sportlov med familjen och för han var det värt att ha skojj istället för att anstränga sig i skolan.<br>
    Fair enough, om man är vuxen gör man val. Men de dagar jag lät honom försöka på register formulär skulle jag kunna använt för att komma längre själv. Väldigt besviket moment...<br>
    Niklas är däremot bra typ som fastän i han var överansträngd under backend från att ta andra kurser på samma gång så gjorde han sitt bästa för att bidra.
    <br><br>
    <h2>Infopaket om SQL kommandon</h2>
    <br>
    <li>SELECT används för att välja data från en databas. Data som returneras lagras i en resultattabel.</li>
    <li>INSERT INTO används för att infoga nya poster i en tabell.</li>
    <li>UPDATE används för att modifiera befintliga poster i en tabell.</li>
    <li>DELETE används för att ta bort befintliga poster i en tabell.</li>
    <li>WHERE används för att filtrera poster. WHERE används för att extrahera endast de poster som uppfyller ett angivet villkor.</li>
    <li>LIKE används i en WHERE-sats för att söka efter ett angivet mönster i en kolumn.</li>
    <li>ORDER BY används för att sortera resultatuppsättningen i stigande ordning som standard.
    <li>För att sortera posterna i fallande ordning använder du nyckelordet ORDER BY | DESC.</li></li> 
        
<br><br>
    
<h2>Niklas kommentar sektion</h2>
Php har varit för mig kanske det roligaste kod språket hittills och jag kommer säkerligen att fördjupa mig i det ordentligt efter att kursen är slut.
<br> <br>
Vi hade korona skräck i pojkens skola så jag tappade mycket aktivt deltagande från min del i det här projektet, som jag är ledsen över, men mina arbetskompisar har varit väldigt symppisar så massor tackar åt dem, specielt Jonas. 
<br><br>
Det här var första gången som vi kodade tillsammans med någon annan och det känns nog intimiderande men roligt. Om vi började med det här redan tidigare så kunde jag tänka mig att det skulle gå smidigare. 
<br><br>Jag tyckte speciellt om idén att koda i par vart ena är drivern och andra är navigatorn och det stöder sig ganska långt på det som man lärt sig i psykologin och annanstans. 
<br><br>
<?php include "jonas.php"?>
<br><br><br>
<marquee direction="left" height="100px" scrollamount="6"><i>
SQL is designed for a specific purpose: to query data contained in a relational database. SQL is a set-based, declarative programming language, not an imperative programming language like C or BASIC.

</i>
</marquee>

</article>


<?php include "footer.php" ?>