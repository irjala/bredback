<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jonas.I Back end kurs sida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
      <?php include "navbar.php"?>

<?php
if ($_SESSION['feedbackkey'] == "match") {
echo(
    "<article><h2>Feedback för projekt 1</h2>
    <p>Det här projektet har varit som en frisk vind att leka och experimentera med. Jag vet inte om det är för att vi jysst bär på mer erfarenhet från dina tidigare projekt eller om det bara är lättare kod att skriva men jag har faktiskt gillat detta projekt.</p>
    <p>Att hämta all information från olika ställen har varit lättare änn normalt, jag är van från tidigare projekt att extra poängerna kräver blod svett och tårar men flera av dessa uppgifter (tror jag) är relativt simpla att utföra.</p><br>
    <p>Ju mer jag lär mig php desto mera kanske jag skulle ha sammanfogat många olika uppgifter för att skapa en bättre helhet istället för point by point presentation, jag försökte ialla fall bevisa att jag kunde sammanfoga det att man skapar ett user log in och får ett genererat lösenord leder till att den informationen sparas. Däremot ser jag fram emot om vi får lära oss mera säkerhet i framtiden eftersom jag för tillfället antar att jag har världens svagast skyddade sajt.</p><br>
    <p>Det som jag ville få gjort som jag hade svårast med var:<br>Få en fil att laddas upp, jag har ändrat alla rättigheter men fick servern att acceptera filen.</p>
    <p>Sedan måst jag ju säga, jag har int en aning om hur jag alltid lyckas skapa spök buggar. Jag är mycket nöjd över hur jag kodat min datum räknare förutom att den för någon orsak är en dag fel... Jag hittade inte felet och har experimenterat med mktime för att lösa det men ack jag fann inte felet.<p>
    <p>Projekt 1 var ett bra, rättvist och roligt projekt som du gav mer änn väl med tid och resurser att lösa. Att jag inte har fulla poäng känns som helt mitt fel, jag kunde ha grejjat det om jag lade mera tid på det. Jag kommer dedikera mera ansträngning till nästa projekt.<p>
    <br>
    <p>Tack för mig</p> <br></article>"

);
}
else {
    print("<h2>Gå tillbaka</h2>");
    print("<a href='index.php'>index</a>");
}
exit();
?>

</body>
</html>