# Database Documentation - Pénzügyi Alkalmazás


## 1. Users (Felhasználók)

A felhasználók adatai.

| Mező              | Típus                    | Leírás                                    |
| ----------------- | ------------------------ | ----------------------------------------- |
| id                | INT (PK, AUTO_INCREMENT) | Egyedi azonosító                          |
| name              | STRING(100)              | Felhasználó neve                          |
| email             | STRING(150, UNIQUE)      | Email-cím                                 |
| email_verified_at | TIMESTAMP                | Megerősítés dátuma                        |
| password          | STRING(255)              | Jelszó titkosítva                         |
| **account_name**  | STRING(100)              | Számla neve                               |
| **account_type**  | STRING(50)               | Számla típusa (pl. “savings”, “checking”) |
| **balance**       | DECIMAL(15,2)            | Aktuális egyenleg                         |
| **currency**      | STRING(10)               | Pénznem                                   |
| created_at        | TIMESTAMP                | Fiók létrehozásának ideje                 |

---

## 3. Categories (Kategóriák)

Segít a kiadások és bevételek csoportosításában.

| Mező        | Típus                      | Leírás               |
| ----------- | -------------------------- | -------------------- |
| category_id | INT (PK)                   | Kategória azonosító  |
| id          | INT (FK → Users.id)        | Felhasználóhoz kötve |
| name        | STRING(100)                | Kategória neve       |
| type        | STRING('income','expense') | Bevétel vagy kiadás  |




---

## 3. Transactions (Tranzakciók)

Bevételek, kiadások, átutalások.

| Mező           | Típus                             | Leírás               |
| -------------- | --------------------------------- | -------------------- |
| transaction_id | INT (PK)                          | Tranzakció azonosító |
| id             | INT (FK → Users.id)               | Felhasználó          |
| category_id    | INT (FK → Categories.category_id) | Kategória            |
| amount         | DECIMAL(15,2)                     | Összeg               |
| type           | ENUM('income','expense')          | Tranzakció típusa    |
| description    | TEXT                              | Megjegyzés           |
| date           | DATE                              | Tranzakció dátuma    |
| created_at     | DATETIME                          | Létrehozás ideje     |





