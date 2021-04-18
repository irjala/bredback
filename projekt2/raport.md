# Projekt 2
Funkade det ok?
## SQL Databas
Min databas består av två tabeller: users och comments. Vi kan börja med users.
### Tabell: users
Före jag ens började med mitt projekt hade jag redan en ideé om att jag ville ha tabell med user info där så mycket som möjligt om användaren finns. Den enda kolumnen som inte fanns i början var likes. Jag TRODDE först att jag skulle lägga likes i comments tabellen för det är samma kategori av information. Men när jag började skapa min comments tabell så hade visade sig allt för mycket mer komplicerat att ha likes i en separat tabell, varför??? Teorin bakom comments tabellen är att var och en comment är en unik bit som kan få sina egna comments. Sedan för att veta om en comment tillhör en profil ID eller en comment ID så använder jag en tinyint för att checka 0 eller 1 för en eller den andre. (Mera om comments senare)
#### users ROW: ID (INT)
Automatiskt designerad Heltals nummer. Inga ID's är samma och är primära cellen för att identifiera en user
#### users ROW: username (varchar)
Användaren får välja själv ett användarnamn när man skapar kontot. Används för att logga in med och kan inte ändras av usern efter kontot skapats. Max 20 characters.
#### users ROW: realname (varchar)
Lirum
#### users ROW: password (varchar)
Larum
#### users ROW: email (varchar)
Lirum
#### users ROW: zipcode (varchar)
Larum
#### users ROW: bio (varchar)
Lirum
#### users ROW: salary (INT)
Larum
#### users ROW: preference (INT)
Lirum
#### users ROW: likes (INT)
Larum

## Tabell: Comments
Comments har en unik ID som identifierar den. Page ID är där för att peka vart kommentaren hör, den kan höra till en profil eller till en annan kommentar, en enkel bool gör det lättare för profiler att söka endast profil kommentarer och kommentarer att endast hämta kommentarer som hör till kommentarer.
#### comments ROW: commentid (INT)
Kokos
#### comments ROW: pageid (INT)
Boll
#### comments ROW: tstamp (timestamp)
kokos
#### comments ROW: comment (varchar)
boll
#### comments ROW: posterid (INT)
Åså ahr afsn
#### comments ROW: postername (varchar)
ksk
#### comments ROW: reply (tinyint)
boll

## Va betyder detta då??
Ehm


### Uppgift 1
Javisst
### Uppgift 2
Javisst
### Uppgift 3
Javisst
### Uppgift 4
Javisst
### Uppgift 5
Javisst
### Uppgift 6
Javisst
### Uppgift 7
Javisst
### Uppgift 8
Javisst
### Uppgift 9
Javisst
### Uppgift 10
Javisst

## KURS FEEDBACK