# PenzugyiWebApp — Rendszerspecializáció

### 1. Cél  
A PenzugyiWebApp célja, hogy egy modern, biztonságos és felhasználóbarát webes pénzügyi alkalmazást biztosítson, amely segít a felhasználóknak követni a kiadásaikat és bevételeiket, kezelni költségvetésüket, és pénzügyi tudatosságukat növelni. 

### 1.1 Célközönség  
- Magánszemélyek, akik nyomon szeretnék követni havi költségeiket és bevételeiket.  
- Felhasználók, akik szeretnének pénzügyi statisztikákat, kimutatásokat készíteni (napi, heti, havi, éves), költségvetést tervezni.  
- Olyan felhasználók, akik mobilon és asztali böngészőn is szeretnék használni az alkalmazást (reszponzív felület).

## 2. Funkcionális követelmények

### 2.1 Alapvető tranzakciókezelés  
- A felhasználó képes legyen bevételt és kiadást rögzíteni. 
- A tranzakcióknál szerepeljen legalább: összeg, dátum, típus (bevétel / kiadás), kategória. 

### 2.2 Költségvetés és kategorizálás  
- Lehetőség kategóriák definiálására (pl. élelmiszer, lakhatás, szórakozás, stb.).  
- Tranzakciók hozzárendelése kategóriákhoz, hogy később statisztikázható legyen, mire mennyi pénz megy el.  

### 2.3 Jelentések és statisztikák  
- Időszakos jelentések generálása: napi, heti, havi, éves kimutatások.   
- Diagramok / grafikonok készítése a költség- / bevételi adatok eloszlásáról, kategóriánkénti bontásban. 
- Lehetőség adat exportálásra: PDF.   

### 2.4 Felhasználói autentikáció és adatkezelés  
- Biztonságos bejelentkezés / regisztráció mechanizmus.  
- Felhasználói adatok mentése. 

### 2.5 Reszponzív felület / több platform támogatás  
- Az alkalmazás működjön asztali böngészőben és mobilon is. 
- Felhasználói interface legyen letisztult, könnyen használható.  

## 3. Nem-funkcionális követelmények

### 3.1 Biztonság  
- A bejelentkezés legyen biztonságos (jelszókezelés, adatvédelem).  
- A felhasználói adatok (tranzakciók, bevételek / kiadások) védve legyenek — csak az adott felhasználó férjen hozzá.  

### 3.2 Teljesítmény és skálázhatóság  
- Az alkalmazás gyors legyen — tranzakció rögzítése, lekérdezése, jelentés generálás ne legyen érzékelhetően lassú.  
- Skálázhatóság: ha sok felhasználó / sok adat, az adatbázis és backend terhelést bírja el.  

### 3.3 Megbízhatóság & adatmegőrzés  
- Az adatok tárolása adatbázisba.    

### 3.4 Használhatóság / UX  
- Felhasználóbarát, intuitív UI/UX.  
- Könnyű navigáció, világos kategorizálás, jól áttekinthető jelentések / statisztikák.  
- Reszponzív — mobil + desktop.  

### 3.5 Karbantarthatóság / bővíthetőség  
- Kód jól struktúrált, moduláris — hogy később új funkciók (pl. több valuta, részletes címkézés, bankszámla-összekötés, import/export, API-integráció stb.) hozzáadhatók legyenek.   

## 4. Architektúra

### 4.1 Technológiai stack  
- Frontend: JavaScript + CSS  
- Backend: PHP (javító keretrendszer: Laravel) 
- Styling: Tailwind CSS
- Adatbázis: adatbázis — tranzakciók, felhasználók, kategóriák tárolására  

### 4.2 Komponens-/modul struktúra  
- **Auth modul** — regisztráció, bejelentkezés, felhasználói jogosultságok kezelése  
- **Transaction modul** — tranzakciók CRUD (Create, Read, Update, Delete)   
- **Report / Statistics modul** — kimutatások generálása, adat aggregálás, statisztikák, grafikonok  
- **Export modul** — PDF export  
- **Frontend UI modul** — reszponzív interfész, mobil + desktop, űrlapok 

### 4.3 Adatfolyam és interfészek  
- Felhasználó → Frontend → Backend → Adatbázis  
- Backend biztosít REST-szerű API-kat a tranzakciók / kategóriák kezeléséhez.    

## 5. Use case-ek / felhasználói forgatókönyvek

| Use case | Leírás |
|---------|--------|
| Regisztráció és bejelentkezés | Új felhasználó regisztrál, bejelentkezik, saját profil jön létre. |
| Tranzakció rögzítése | Felhasználó bevételt vagy kiadást visz fel, kategóriát választ, menti. |
| Tranzakció szerkesztése / törlése | Hibás adat javítása vagy tévesen rögzített tranzakció eltávolítása. |
| Jelentés lekérése | Felhasználó generál egy havi kimutatást, látja kiadás/bevétel eloszlását kategóriánként. |
| Grafikus megjelenítés | Diagram, grafikon jeleníti meg a költési struktúrát. |
| Exportálás | Jelentés exportálása PDF formátumban. |


