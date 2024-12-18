# Changelog
Dit is de changelog van Hidde Scheringa over de eindopdracht van PRG05

## Zondag 13-10-2024
Ik heb userstories geschreven voor mijn project om een idee te kunnen krijgen wat mijn product nodig heeft aan het einde van 
de cursus.

Mijn userstories zijn:
- als gebruiker wil ik een lijst kunnen maken van favoriete games.
- ik wil als gebruiker een filter hebben op basis van speeltijd van mijn games, zodat ik kan zien wat ik meer moet spelen.
- ik wil voor dat ik ingelogged ben zien wat de meest gespeelde spellen zijn van de gebruikers van de app
- ik wil ook als gebruiker kunnen kiezen tussen genre's, los van het filter systeem.
- ik wil als admin eerst goedkeuring geven voordat een post geplaatst word, zodat er geen misbruik wordt gemaakt van het platform.
- ik wil als admin een duidelijk overzicht hebben van de functionaliteiten.

## ERD
### 1e iteratie
[first version ERD](images/erd-prg05.png)

#### Feedback 1e versie
- Geen gebruik van hoofdletters.
- Gebruik een tool voor die speciaal is voor het maken van ERDs (DrawSQL bijvoorbeeld)
- Admin tabel is niet nodig die kan je aan de hand van rollen al meegeven in de users tabel.
- En er mist een tabel waar je posts kan koppelen aan filtereisen.

### 2e iteratie
[second version ERD](images/ERD2prg05.png)

### 3e iteratie
[third version ERD](images/3e-versie-erd.png)

Dit is mijn laatste versie van mijn ERD.

## Maandag 14-10-2024
Ik heb 2 verschillende pagina's gemaakt. 1 landingpage waar je terecht komt als je de
de site opent. En de 2e pagina is na het inloggen. Als je bent ingelogged krijg je meerdere functies tot je beschikking.
Je kan een game toevoegen, dat kan niet als je geen account hebt.

## dinsdag 15-10-2024
Er is een database gemaakt, waarin de games gezet kunnen worden door de ingelogde gebruikers.
De games worden dan toegevoegd op zowel de landing page als de ingelogde page. De mensen zonder account kunnen alsnog de games zien.
Ook heb ik een details pagina gemaakt deze is ook te zien voor zowel ingelogde als niet ingelogde gebruikers.
Als laatst ook een beetje styling gedaan met tailwind.

## woensdag 16-10-2024
Er is een create pagina gemaakt. Ik heb mijn ERD volledig op de schop gegooid. Mijn ERD zou wel werken maar het was te makkelijk.
Ik heb de database results ook in de home pagina weer gegeven, je kan hier alleen niks behalve de details pagina zien.
Ik heb ook mijn database aangepast, ik heb wat kolommen weg gehaald en vervangen. Bijvoorbeeld user_id zodat ik deze kan koppelen aan de users database.
Maar ik ook een total playtime kolom gemaakt. Als een niet ingelogde gebruiker de homepage ziet kan hij/zij zien welke spellen veel gespeeld worden.

## Vrijdag 18-10-2024
Migrations gemaakt voor alle databases uit de ERD. Hieruit moeten alleen nog connecties gemaakt worden tussen elke database.
Deze verbindingen worden gedaan aan de hand van de ERD.

## Zondag 20-10-2024
Ik heb een review pagina gemaakt. Je kan reviews maken en deze worden opgslagen in de reviews database. 
Ik heb de users database gelinkt met de reviews database met een 1 op veel relatie.
Elke gebruiker kan dus meerdere reviews geven, en deze worden opgeslagen onder de user_id kolom. Je kan alleen een review schrijven als je bent ingelogged.
Ik moet nu alleen nog de reviews op de show pagina laten zien

## Maandag 21-10-2024
Ik heb de reviews toonbaar gemaakt in de show van de webpagina. als er een review wordt geschreven wordt deze daar opgeslagen.
Ook krijg je de naam van de auteur van de review te zien. Ik heb geprobeerd de middleware werkend te krijgen voor de gebruiker.
Maar dit kreeg ik niet werkend, en dit is voor morgen een vraag tijdens de les,

## Dinsdag 22-10-2024
Ik heb aan antwan gevraagd waarom mijn middleware niet werkte, en hij zei dat mijn use Illuminate\Routing\Controllers\Middleware; niet klopte. 
tijdens het aanmaken van mijn middleware kreeg ik een gele lijn onder middleware te zien en door ctrl klik te gebruiken werd er standaard een implementation gemaakt. dit was dus alleen de verkeerde.
Ook heb ik validatie gemaakt voor de forms, zodat een gebruiker niet vergeet een invoerveld of select in te vullen. Ik heb ook een admin dasboard gemaakt.
dit heb ik gedaan door een kolom admin in users toe tevoegen met een boolean die standaard op false staat. 
Ik heb bij het admin account deze false op true gezet (hardcoded), zodat dit account de rechten heeft deze pagina te bezoeken.
Ook heb ik toegevoegd dat een admin reviews kan verwijderen. om ervoor te zorgen dat alleen admins op de betreffende pagina's mogen komen heb ik een middleware gemaakt en die aan de routes toegevoegd die admin zaken betreffen.
Zo kan er niet gedeeplinkt worden.

## Woensdag 23-10-2024
Ik heb een toggle gamaakt waar een admin elke post die gemaakt is moet goedkeuren.
Ook hier heb ik gebruik gemaakt van een boolean, onder de kolom verified.
standaard staat elke post op false, deze posts zijn te zien op de postmanager op de admin dashboard.
hier is een toggleknop aan toegevoegd, publish en upublish, waaraan een boolean waarde vast zit true en false.
door een query te gebruiken waar geselecteerd wordt op games die verified true zijn krijg je deze games te zien in de view.
Ook heb ik een search optie gemaakt waar je een game kan zoeken op zowel de naam van de game als de publisher.
Ik had wat issues met het koppelen van de verified query en de where orwhere. Ik had het probleem uitgelegd aan Bob, en hij zei dat ik in de Laravel documentatie whereAny moest opzoeken.
dit heb ik vervolgens gebruikt om het werkend te krijgen.

## Donderdag 24-10-2024
Connecties gemaakt tussen de games, games_genre en genres database via een veel op veel. ik voegde de genre select toe aan de create game pagina.
dit werd door de verbindingen in de koppel database gezet via de game id en de genre id. dit heb ik gedaan door in de game controller DB::table()->insert te gebruiken.
dit is een query die de informatie uit de from in de koppel tabel invoerde.
Ik heb genre ook toegevoegd aan de validatie. dit is de opzet voor het kunnen filteren op basis van genre.

## Zondag 27-10-2024
Ik heb op de loggedin view knoppen gemaakt voor alle genres met behulp van een for each, dat was een stuk chiller dan 6 losse knoppen maken.
Ik had in mijn hoofd een soort opzet voor de query, Select from Game where genre_id (getal x is)
Maar ik ben in de documentatie gaan zoeken naar de manier die voor mij zou werken. maar omdat ik wist dat het in de query moest gebeuren hoefde ik niet lang te zoeken.
toen ik hierop uitkwam Querying Relationship Existence.
hier kan je resultaten limiteren op basis van relaties tussen tabellen.
Ik had wereHas nodig omdat ik meerdere genre_id's had. en has werkt alleen als je wilt zoeken op games die minstens 1 genre hadden, en dat heeft elke game dus dat zou niet gewerkt hebben.
Dit werkte als een gegoten en na het maken van de functie heb ik de styling aangepast zodat het er wat fijner uitziet.

## Maandag 28-10-2024

Een edit page gemaakt waar de eigenaar van de post deze zou kunnen aanpassen als dat nodig is.
Ik heb dit gedaan door een check te maken met een if statement. Deze if checkt of de post bij de user hoort via de user_id.
De form wordt gevuld met de oude data, zodat de gebruiker deze makkelijk kan bijwerken.
Ik heb validatie in deze form gebruikt zodat er geen veld overgeslagen kan worden.
na het versturen van de form is er een redirect die je terug stuurt naar de /dashboard.
door middel van een if in de loggedin view ziet alleen de user die de post heeft gemaakt de knop om de game te kunnen wijzigen.
Een gebruiker ziet deze knop niet in de dashboard staan.
Naast een edit pagina heb ik een unfilter knop gemaakt die alle games weer terug haalt als de gebruiker klaar is met het gekozen filter. Deze knop werkt zowel voor 
de searchbar als de genre knoppen.

## Dinsdag 29-10-2024
Ik heb diepere validatie gemaakt voor het editen van een game. Een gebruiker kan nu niet gelijk na het maken van een game deze wijzigen.
De gebruiker moet eerst 5 games hebben gemaakt die zijn goedgekeurd door de admin voordat de edit knop verschijnt.
Dit heb ik gedaan door middel van een query, die count hoeveel posts er zijn onder die query heb ik een if gezet dat alles onder 5 geen edit kan maken.
Ik heb in de index een if functie gemaakt die zegt dat als de count hoger is dan 5 de knop verschijnt.
deze variable userCanEdit heb ik door middel van && in de if gezet van de loggedin view.
Ik heb buiten diepere validatie knoppen gemaakt zodat de navigatie voor de gebruiker en admin beter is. 

## Donderdag 31-10-2024
Ik Dacht dat ik klaar was met de opdracht, maar na een testrun van alle onderdelen, kwam ik erachter dat ik nog wat minor buggs had.
het grootste probleem was dat ik nog best veel gebruik kon maken van deeplinken. Als admin kon je makkelijk deeplinken naar pagina's van een gewone ingelogde gebruiker.
Dus ik heb een middleware gemaakt waarin dit niet meer kan. Deze middleware checkt of een gebruiker een admin is, en als het een admin is wordt het terug gestuurd naar de /admin/dashboard.
Deze middleware heb ik toegepast op routes die alleen gebruikt mogen worden door ingelogde niet admins.
Ik maak gebruik van de resource route, maar ik had ook een index route. Die was compleet overbodig aangezien die standaard in de reource route zit. Dus die route heb ik verwijderd.
Ook kon je nog deeplinken naar de edit pagina, wat niet mag, dus daar heb ik ook een losse middleware gemaakt, waar wordt gecheckt of een user meer dan 5 posts heeft gemaakt.
Zoniet dat wordt je terug gestuurd naar de /games pagina. En deze middleware heb ik toegepast op de resource route.
En als laatst waren er nog wat kleine buggs die gefixt zijn.

## Vrijdag 1-11-2024
Wederom heb ik deeplinken verbetert maar nu in de zin van layout in de web.php.
Het was wat chaotisch en minder leesbaar, ik heb het beter leesbaar gemaakt.
Ik heb de searchbar in een component gezet aangezien ik deze op meerdere pagina's gebruik, zodat als er veranderingen aan moeten gebeuren dit op 1 plek kan.

