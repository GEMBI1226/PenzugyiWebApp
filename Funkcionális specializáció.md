# PenzugyiWebApp — Funkcionális Specializáció



## 1. Felhasználói szerepkörök

### 1.1 Regisztrált felhasználó
A rendszerben jelenleg egyetlen szerepkör létezik:
- **Felhasználó**: saját tranzakcióit és kategóriáit kezelheti, jelentéseket hozhat létre.


---

## 2. Funkcionális követelmények

### 2.1 Autentikációs funkciók  
A rendszer biztosítja:

#### 2.1.1 Regisztráció
- Új felhasználó létrehozhatja fiókját email-cím és jelszó alapján.
- A rendszer validálja a bemeneteket (jelszó hossza, email formátuma).
- A jelszó titkosítva kerül tárolásra (hash).

#### 2.1.2 Bejelentkezés
- A felhasználó email + jelszó kombinációval tud bejelentkezni.
- Sikertelen bejelentkezés esetén hibaüzenetet kap.

#### 2.1.3 Kijelentkezés
- A felhasználó a menüből kiléphet a rendszerből.
- A munkamenet megszűnik, session törlődik.

---

## 3. Tranzakciókezelés

### 3.1 Tranzakció létrehozása
A felhasználó új tranzakciót rögzíthet az alábbi mezőkkel:
- **Típus:** Bevétel / Kiadás  
- **Összeg**  
- **Dátum**  
- **Kategória**  
- **Megjegyzés** *(opcionális)*  

Működés:
- A rendszer validálja a mezőket.  
- Tranzakció mentése adatbázisba.

### 3.2 Tranzakciók listázása
- A felhasználó táblázatos formában látja saját tranzakcióit.
- Rendezés: dátum, összeg, típus, kategória szerint.
- Szűrési lehetőség:
  - időszak szerint (havi, éves),
  - kategória szerint,
  - tranzakció típusa szerint.

### 3.3 Tranzakció szerkesztése
- A felhasználó módosíthatja meglévő tranzakcióit.
- A rendszer előtölti a korábbi adatokat.
- Módosítás után a rekord frissül.

### 3.4 Tranzakció törlése
- A felhasználó törölheti bármelyik saját tranzakcióját.
- A rendszer megerősítést kér törlés előtt.

---

## 4. Kategóriakezelés

### 4.1 Kategória létrehozása
A felhasználó saját költség- és bevételkategóriákat hozhat létre, például:
- Étkezés
- Közlekedés
- Lakhatás
- Fizetés
- Üzleti bevétel

Működés:
- Kategórianév egyedi a felhasználón belül.
- Kategória mentése adatbázisba.

### 4.2 Kategória listázása
- Meglévő kategóriák megjelenítése listában.
- Kategóriák száma nincs korlátozva.

### 4.3 Kategória módosítása / törlése
- A felhasználó átnevezheti vagy törölheti kategóriáit.
- Ha egy kategóriához tartozik tranzakció:
  - törlés esetén a rendszer áthelyezést vagy törlést kérhet.

---

## 5. Jelentések és statisztikák

### 5.1 Időszakos kimutatások
A rendszer képes a felhasználó pénzügyi adatait különböző időszakokra bontva megjeleníteni:
- Havi összesítések  
- Éves összesítések  
- Heti trendek  
- Napi kimutatások  

### 5.2 Vizualizációk
A grafikonok és diagramok megjelenítik:
- Bevétel–kiadás arányt  
- Kategória szerint eloszlásokat  
- Havi változásokat  

### 5.3 Összegzések
A rendszer minden időszakhoz számolja:
- teljes bevétel,
- teljes kiadás,
- egyenleg.

---

## 6. Export funkciók 
A felhasználó le tudja tölteni pénzügyi jelentéseit PDF formátumban.

---

## 7. Felhasználói felület funkciói

### 7.1 Reszponzív kialakítás
- Mobilon és asztali gépen egyaránt működik.
- Az elrendezés igazodik a képernyő méretéhez.

### 7.2 Navigáció
- Főoldal áttekintés (dashboard)
- Tranzakciók
- Kategóriák
- Jelentések
- Fiók (auth)

### 7.3 Űrlap validáció
A rendszer elutasítja a hibás vagy hiányos adatokat:
- üres mezők,
- negatív vagy nullás összeg,
- hibás dátum,
- érvénytelen kategória.

---


## 8. Folyamatok összefoglalása

### Egy tranzakció rögzítésének folyamata:
1. Felhasználó → Tranzakció hozzáadása oldal.
2. Mezők kitöltése.
3. Validáció.
4. Mentés adatbázisba.
5. Visszajelzés: sikeres mentés.
6. Tranzakció megjelenik a listában és statisztikákban.