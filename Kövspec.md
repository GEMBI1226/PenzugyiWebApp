# PenzugyiWebApp — Követelmény Specifikáció

## 1. Érintettek

- **Felhasználók:** a rendszer végfelhasználói, akik személyes pénzügyi adatokat kezelnek.
- **Fejlesztők:** a rendszer fejlesztését végző csapat.

---

## 2. Rendszer áttekintése

### 2.1 Fő funkciók összefoglalása
- Felhasználói regisztráció és belépés
- Tranzakciókezelés (bevétel, kiadás)
- Kategóriakezelés
- Időszakos statisztikák, diagramok
- Adat exportálása PDF formátumban
- Reszponzív felhasználói felület

### 2.2 Rendszer határai
A rendszer:
- Csak saját felhasználói adatokkal dolgozik, nincs közösségi vagy többfelhasználós együttműködés.
- Nem kapcsolódik banki rendszerekhez.
- Nem kezel valutaváltást.
- Csak webes felületen működik (asztali és mobil böngészőben).

---

## 3. Funkcionális követelmények

### 3.1 Felhasználói fiókkezelés

#### 3.1.1 Regisztráció
- A felhasználó email és jelszó megadásával regisztrálhat.
- A rendszer ellenőrzi: email formátuma helyes, jelszó megfelel a minimális követelményeknek.
- A jelszó titkosítva tárolódik.

#### 3.1.2 Bejelentkezés
- A felhasználó email + jelszó kombinációval tud bejelentkezni.
- Hibás adatok esetén hibaüzenetet kap.

#### 3.1.3 Kijelentkezés
- A felhasználó a felületen keresztül kijelentkezhet.
- A session lezárul.

---

### 3.2 Tranzakciókezelés

#### 3.2.1 Tranzakció létrehozása
A felhasználó rögzíthet:
- Bevételt
- Kiadást

Szükséges mezők:
- összeg
- dátum
- típus
- kategória
- megjegyzés (opcionális)

A rendszer validálja:
- összeg > 0
- dátum formailag helyes
- kategória létezik

#### 3.2.2 Tranzakciók listázása
A felhasználó megtekintheti tranzakcióit táblázatos nézetben.
Lehetőségek:
- szűrés időszak szerint
- szűrés kategória szerint
- rendezés (összeg, dátum stb.)

#### 3.2.3 Tranzakció szerkesztése
- A felhasználó módosíthatja korábban rögzített tranzakcióit.
- A rendszer előtölti a meglévő adatokat.

#### 3.2.4 Tranzakció törlése
- A felhasználó törölheti tranzakcióit.
- A rendszer megerősítést kér.

---

### 3.3 Kategóriakezelés

#### 3.3.1 Kategória létrehozása
- A felhasználó új kategóriát hozhat létre.
- A kategórialista egyediséget megkövetel (nem lehet két azonos nevű kategória).

#### 3.3.2 Kategóriák listázása
- A felhasználó megtekintheti korábban létrehozott kategóriáit.

#### 3.3.3 Kategória szerkesztése
- A felhasználó módosíthatja a kategória nevét.

---

### 3.4 Statisztikai funkciók

#### 3.4.1 Időszakos kimutatások
A rendszer képes:
- havi,
- éves,
- heti,
- napi statisztikákat készíteni.

#### 3.4.2 Diagramok
A rendszer grafikus megjelenítést biztosít:
- kategóriánkénti kiadás/bevétel eloszlásról,
- havi trendekről,
- összesített egyenlegről.

#### 3.4.3 Összegzések
A kimutatások tartalmazzák:
- összes bevétel,
- összes kiadás,
- egyenleg.

---

### 3.5 Export funkciók

#### 3.5.1 PDF export
A felhasználó PDF formátumban letöltheti a kimutatásokat.

---

### 3.6 Felhasználói felület

#### 3.6.1 Reszponzivitás
- A felület mobilon és asztali böngészőkben egyaránt használható.
- Az elemek automatikusan igazodnak a kijelző méretéhez.

#### 3.6.2 Navigáció
A rendszer biztosítja a következő nézeteket:
- Dashboard (áttekintés)
- Tranzakciók
- Kategóriák
- Jelentések
- Profil / autentikáció

---

## 4. Nem-funkcionális követelmények


### 4.1 Biztonság
- Jelszavak hash-elve kerülnek tárolásra.
- A felhasználó csak saját adatait láthatja.
- Szerveroldali validáció minden kritikus műveletnél.

### 4.2 Megbízhatóság
- Tranzakciók nem veszhetnek el adatbázis-hiba miatt.
- A rendszer hibák esetén érthető üzenetet jelenít meg.

### 4.3 Karbantarthatóság
- A kód moduláris szerkezetű.
- Elemek külön komponensekre bonthatók.
- Dokumentált funkciók és API-k.

### 4.4 Felhasználói élmény
- Tiszta, áttekinthető UI.
- Egységes stílus (Bootstrap/SCSS).
- Könnyű navigáció, logikus elrendezés.

---

## 5. Rendszerkorlátok

- Nincs banki API integráció.
- Nincs többvalutás támogatás.
- Offline működés nincs támogatva.
- A rendszer egyetlen felhasználói szerepkört tartalmaz.
- Automatizált adatimport nincs.

---

## 6. Függőségek

- PHP + Laravel backend
- HTML/CSS/JavaScript frontend
- Bootstrap / SCSS
- Relációs adatbázis

---

## 7. Elfogadási kritériumok

### 7.1 Alapfunkciók működése
- A felhasználó képes regisztrálni és belépni.
- Tranzakciók rögzíthetők, módosíthatók, törölhetők.
- Kategóriák kezelhetők.
- Statisztikák generálhatók.
- Exportálás működik.

### 7.2 Adatvédelem
- Egy felhasználó nem férhet hozzá más felhasználó adataihoz.

### 7.3 Hibaellenőrzés
- Hibás vagy hiányos adatok esetén a rendszer megfelelő üzenetet jelenít meg.

