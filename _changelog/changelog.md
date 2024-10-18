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
