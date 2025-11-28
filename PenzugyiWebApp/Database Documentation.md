# Database Documentation - Pénzügyi Alkalmazás


## 1. Users (Felhasználók)

A felhasználók adatai.

| Mező              | Típus                      | Leírás                                    |
| ----------------- | -------------------------- | ----------------------------------------- |
| id                | BIGINT (PK, AUTO_INCREMENT)| Egyedi azonosító                          |
| name              | STRING(255)                | Felhasználó neve                          |
| email             | STRING(255, UNIQUE)        | Email-cím                                 |
| email_verified_at | TIMESTAMP                  | Megerősítés dátuma                        |
| password          | STRING(255)                | Jelszó titkosítva                         |
| account_name      | STRING(100)                | Számla neve (Nullable)                    |
| account_type      | STRING(50)                 | Számla típusa (Nullable)                  |
| balance           | DECIMAL(15,2)              | Aktuális egyenleg (Default: 0)            |
| currency          | STRING(10)                 | Pénznem (Default: HUF)                    |
| remember_token    | STRING(100)                | "Remember me" token                       |
| created_at        | TIMESTAMP                  | Létrehozás ideje                          |
| updated_at        | TIMESTAMP                  | Módosítás ideje                           |

---

## 2. Categories (Kategóriák)

Segít a kiadások és bevételek csoportosításában.

| Mező        | Típus                      | Leírás               |
| ----------- | -------------------------- | -------------------- |
| category_id | BIGINT (PK, AUTO_INCREMENT)| Kategória azonosító  |
| name        | STRING(255)                | Kategória neve       |
| type        | ENUM('income','expense')   | Bevétel vagy kiadás  |
| created_at  | TIMESTAMP                  | Létrehozás ideje     |
| updated_at  | TIMESTAMP                  | Módosítás ideje      |

---

## 3. Transactions (Tranzakciók)

Bevételek, kiadások.

| Mező           | Típus                             | Leírás               |
| -------------- | --------------------------------- | -------------------- |
| transaction_id | BIGINT (PK, AUTO_INCREMENT)       | Tranzakció azonosító |
| user_id        | BIGINT (FK → Users.id)            | Felhasználó          |
| category_id    | BIGINT (FK → Categories.category_id)| Kategória (Nullable)|
| amount         | DECIMAL(10,2)                     | Összeg               |
| type           | ENUM('income','expense')          | Tranzakció típusa    |
| description    | TEXT                              | Megjegyzés           |
| date           | DATE                              | Tranzakció dátuma    |
| created_at     | TIMESTAMP                         | Létrehozás ideje     |
| updated_at     | TIMESTAMP                         | Módosítás ideje      |

---

## 4. Category Limits (Kategória Limitek)

Felhasználónkénti költési limitek kategóriánként.

| Mező        | Típus                             | Leírás               |
| ----------- | --------------------------------- | -------------------- |
| id          | BIGINT (PK, AUTO_INCREMENT)       | Rekord azonosító     |
| user_id     | BIGINT (FK → Users.id)            | Felhasználó          |
| category_id | BIGINT (FK → Categories.category_id)| Kategória          |
| amount      | DECIMAL(10,2)                     | Limit összege        |
| created_at  | TIMESTAMP                         | Létrehozás ideje     |
| updated_at  | TIMESTAMP                         | Módosítás ideje      |

---

## 5. Notifications (Értesítések)

Rendszerértesítések (pl. limit túllépés).

| Mező        | Típus                             | Leírás               |
| ----------- | --------------------------------- | -------------------- |
| id          | UUID (PK)                         | Egyedi azonosító     |
| type        | STRING(255)                       | Értesítés típusa     |
| notifiable  | MORPH (type, id)                  | Értesített entitás   |
| data        | TEXT                              | Értesítés tartalma   |
| read_at     | TIMESTAMP                         | Olvasás ideje        |
| created_at  | TIMESTAMP                         | Létrehozás ideje     |
| updated_at  | TIMESTAMP                         | Módosítás ideje      |





