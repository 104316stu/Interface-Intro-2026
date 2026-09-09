# Interface Intro 2026

## Overzicht
Ik werk alleen aan deze opdracht.

## Plan dag 1 - 7 september 2026

Achteraf opgeschreven vanuit Git. Ik maak een blog met tekst en foto's van het museum.

- Wireframes maken voor home, blogs en een post plaatsen.
- README en databaseontwerp maken.
- Mappen en PHP-bestanden klaarzetten.

Daarna de homepage bouwen en verbinden met SQLite.

## Museumbezoek - 8 september 2026

De drie foto's staan in [photos](photos/). Je ziet een oude telefooncentrale met veel bedrading en onderdelen. Rechts staan twee telefoons met een draaischijf. Bovenaan hangt een schema van de verbinding. De laatste foto is van wat dichterbij. Deze foto's kan ik gebruiken voor een blogpost over het bezoek.

We waren ongeveer 90% van de tijd met de gids aan het praten, vooral waar de foto's zijn genomen. Hij vertelde hoe hij bij het museum terecht was gekomen en dat hij een keer naar Dublin was geweest voor een van die telefoons. Daar had hij een aardig stel ontmoet dat steeds voor eten zorgde. We bleven zo lang doorpraten dat de opdracht een beetje naar de achtergrond ging en ik eigenlijk vergat om meer foto's te maken. Daarom heb ik maar drie foto's van dezelfde plek.

## GeoCaching = 9 setember 2026

Ik woon in leiden dus heb ik dichtbij een geocache gepakt met de naam: "Indiana Jones and the Temple of the Perilous Cache"
De cache was een filmrolletje met een nepschorpioen waar wat nepgras eeran vast
ik zat een tijde in de verkerde plek te zoeken omdat de cache verplaatst was en mij niet opgevallen was


## Fundering

Ik gebruik PHP, CSS en SQLite. De homepage haalt posts uit de database en laat tekst, een foto en de auteur zien. Het formulier voor een nieuwe post staat er ook al. Opslaan, het blogoverzicht en de losse blogpagina moeten nog af.

## Logboek

Alles zelf gedaan

8 september 2026:

- Homepage met CSS en SQLite-database toegevoegd.
- Posts ophalen uit de database aan de homepage gekoppeld.
- Verder: eerste postformulier en museumfoto's staan in de werkmap.
- Plan, Nog de postpage afmaken 

## Wireframes

### Blog Home
![Blog Home wireframe](Wireframes/Blog%20Home.png)

### Blogs Page
![Blogs Page wireframe](Wireframes/Blogs%20Page.png)

### Post Page
![Post Page wireframe](Wireframes/post%20page.png)

## Ondersteunde content
- Tekst
- Foto's
- Tijdstip (timestamp)

## Database

Dit is het eerste databaseontwerp.

- **Author**: naam (verplicht)
- **PostIds**: ids (verplicht)

```
Users:                                  
    12345:                              
        Author: John Johnathan          
        PostIds: [12345, 12346, 12347]  
    12346:                              
        Author: Paul Martinez           
        PostIds: [12341, 12342, 12343]  
```

## Posts: database ontwerp

Voorbeeld van de database:

```
PostId12345:
    PostId: [id]                # automatisch gegenereerd, verplicht
    Timestamp: [timestamp]      # automatisch gegenereerd, verplicht
    Title: [text]               # verplicht                         
    Content: [text]             # verplicht                         
    image: [imgurl]             # verplicht                         
```
