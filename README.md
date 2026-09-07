# Interface Intro 2026

## Overzicht
Ik werk alleen aan deze opdracht.

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