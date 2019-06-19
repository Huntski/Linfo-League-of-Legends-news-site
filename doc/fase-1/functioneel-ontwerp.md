# Functioneel ontwerp

Linfo, een lol (league of legends) nieuws site waar je artikelen kunt lezen van lol en de lolesports.

Doelgroep: Mensen die geinteresseerd zijn in lol of lolesports.


### Doel

Linfo's doel is om voor mensen die lol spelen of kijken het makkelijker te maken om zoveel mogelijk te weten komen over waar zij geinteresseerd in zijn.

### Structuur

- Header
  - Logo
  - Navigation for home, news & events
  - If loggedin
    - account avatar
  - Else 
    - Login button

- Main
  - Home page
    - active article (most recent)
    - a few smaller other articles
    
  - Register / Login
    - Login form
      - Email
      - Password
    - Register form
      - Username
      - Email
      - Password
      
  - News page
    - Search bar
    - Limited amount of smaller articles to click on
    - Pagination
  
  - View article page
    - Article title
    - Article image
    - Article's paragraths
    - Save article button
    - Comment section
    
  - Events page
    - Navigation for specific event region
    - A list of the tournement matches
      - Location
      - Date
      - The 2 teams name's and teams logo's
  
  - View account page
    - Personal avatar
    - Name 
    - Settings button (to navigate to account settings)
    - A list with saved aritcles's
    
  - Account settings page
    - A way to change
      - Avatar
      - Username
      - Email
      - Password
      
- Footer
  - Linfo's name
  - Contact email
  
### Uitwerking

Het uitwerking voor de header, main en footer wordt eerst gedaan voor mobile. Hierdoor is het wat makkelijker om uiteindelijk de desktop versie te maken. Elke pagina komt grootendeels op hetzelfde desgin structuur uit met header, main & footer dus elke pagina kan een groot deel van de code van andere pagina's overnemen.

### Functionaliteiten

- Home
  - Een paar meest recente artikelen waar je naar kan navigeren worden laten zien
  
- News
  - Er word een lijst met alle artikelen laten zien waar je uit kan kiezen om een artikel te bekijken
  - Pagination
  
- Artikel
  - Hier kan je een artikel compleet bekijken
  - Je kan ook comments achter laten.

- Events
  - Er word een lijst met alle opkomende events laten zien.
  - De lijst kan gefilterd worden op region

- Login / Register
  - Je kan hier inloggen of registreren voor linfo om artikelen te kunnen bekijken.

- Account
  - Je kan je account bekijken en een lijst met opgeslagen artikelen bekijken

- Settings
  - Dingen die je van je account kan aanpassen:
      - Avatar
      - Username
      - Password
      - Email
  - Ook kan je uitloggen
  
  
     
      
     
