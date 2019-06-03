# Controllers

In deze directory komen al je controllers te staan
Elke controller handelt een bepaald onderdeel van je website af en bevat functions die alle acties afhandelen

Een article_controller.php bevat bijvoorbeeld de functies:

- **index()** = haalt alle artikelen op via het model en laadt de articles view in om alle artikelen te tonene
- **show($id)** = haalt het artikel met id = $id op uit de database en geeft dit aan de artikel weergave view