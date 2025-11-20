# Database Documentation - Pénzügyi Alkalmazás

Vizuálisan:
![Uploading image.png…]()


## 1. Users (Felhasználók)

A felhasználók adatai és beállításai.

| Mező          | Típus                    | Leírás                                     |
| ------------- | ------------------------ | ------------------------------------------ |
| id            | INT (PK, AUTO_INCREMENT) | Egyedi azonosító                           |
| name          | STRING(100)             | Felhasználó neve                           |
| email         | STRING(150, UNIQUE)     | Email-cím                                  |
|email_verified_at|TIMESTAMP                |Megerősitettés dátuma                      |
| password      | STRING(255)             | Jelszó titkosított formában                |
| created_at    | TIMESTAMP                | Fiók létrehozásának ideje                  |


---

## 2. Accounts (Számlák / Pénztárcák)

Minden felhasználónak lehet több pénzügyi számlája.

| Mező       | Típus                    | Leírás                     |
| ---------- | ------------------------ | -------------------------- |
| account_id | INT (PK)                 | Számla azonosító           |
| id    | INT (FK → Users.user_id) | Tulajdonos                 |
| name       | STRING(100)             | Számla neve                |
| type       | STRING(50)              | Típus (pl. “savings”, “checking”) |
| balance    | INT(15,2)            | Aktuális egyenleg          |
| currency   | STRING(10)              | Pénznem                    |
| created_at | TIMESTAMP                | Létrehozás dátuma          |



---

## 3. Categories (Kategóriák)

Segít a kiadások és bevételek csoportosításában.

| Mező        | Típus                    | Leírás               |
| ----------- | ------------------------ | -------------------- |
| category_id | INT (PK)                 | Kategória azonosító  |
| id     | INT (FK → Users.user_id) | Felhasználóhoz kötve |
| name        | STRING(100)             | Kategória neve       |
| type        | STRING('income','expense') | Bevétel vagy kiadás  |






---

## 4. Transactions (Tranzakciók)

Bevételek, kiadások, átutalások.

| Mező           | Típus                               | Leírás               |
| -------------- | ----------------------------------- | -------------------- |
| transaction_id | INT (PK)                            | Tranzakció azonosító |
| account_id     | INT (FK → Accounts.account_id)      | Érintett számla      |
| category_id    | INT (FK → Categories.category_id)   | Kategória            |
| amount         | DECIMAL(15,2)                       | Összeg               |
| type           | ENUM('income','expense','transfer') | Tranzakció típusa    |
| description    | TEXT                                | Megjegyzés           |
| date           | DATE                                | Tranzakció dátuma    |
| created_at     | DATETIME                            | Létrehozás ideje     |





