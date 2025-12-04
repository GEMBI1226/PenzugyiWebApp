# Adatbázis Dokumentáció

## Táblák

### 1. users (Felhasználók)
A felhasználók adatait és a hozzájuk kapcsolódó számlainformációkat tárolja.

| Mező | Típus | Leírás |
|---|---|---|
| `id` | `bigint` | Elsődleges kulcs (Primary Key). |
| `name` | `string(100)` | A felhasználó neve. |
| `email` | `string(150)` | A felhasználó email címe (egyedi). |
| `email_verified_at` | `timestamp` | Az email cím megerősítésének ideje (nullable). |
| `password` | `string(255)` | A jelszó hash-elt változata. |
| `account_name` | `string(100)` | A számla neve (nullable). |
| `account_type` | `string(50)` | A számla típusa (nullable). |
| `balance` | `decimal(15, 2)` | Aktuális egyenleg. Alapértelmezett: 0. |
| `currency` | `string(10)` | Pénznem. Alapértelmezett: 'HUF'. |
| `remember_token` | `string` | "Remember me" funkcióhoz token. |
| `created_at` | `timestamp` | Létrehozás ideje. |
| `updated_at` | `timestamp` | Utolsó módosítás ideje. |

### 2. categories (Kategóriák)
A tranzakciók kategorizálására szolgáló tábla.

| Mező | Típus | Leírás |
|---|---|---|
| `category_id` | `bigint` | Elsődleges kulcs (Primary Key). |
| `name` | `string(100)` | A kategória neve. |
| `type` | `enum` | A kategória típusa: `'income'` (bevétel) vagy `'expense'` (kiadás). |
| `created_at` | `timestamp` | Létrehozás ideje. |
| `updated_at` | `timestamp` | Utolsó módosítás ideje. |

### 3. transactions (Tranzakciók)
A bevételek és kiadások rögzítésére szolgáló tábla.

| Mező | Típus | Leírás |
|---|---|---|
| `transaction_id` | `bigint` | Elsődleges kulcs (Primary Key). |
| `user_id` | `bigint` | Külső kulcs (Foreign Key) a `users` táblához. Kaszkádolt törlés. |
| `category_id` | `bigint` | Külső kulcs (Foreign Key) a `categories` táblához (nullable). Kaszkádolt törlés. |
| `amount` | `decimal(15, 2)` | Az összeg. |
| `type` | `enum` | A tranzakció típusa: `'income'` (bevétel) vagy `'expense'` (kiadás). |
| `description` | `text` | Megjegyzés vagy leírás (nullable). |
| `date` | `date` | A tranzakció dátuma. |
| `created_at` | `timestamp` | Létrehozás ideje. |
| `updated_at` | `timestamp` | Utolsó módosítás ideje. |

### 4. category_limits (Kategória Limitek)
A felhasználók által beállított kiadási limitek kategóriánként.

| Mező | Típus | Leírás |
|---|---|---|
| `id` | `bigint` | Elsődleges kulcs (Primary Key). |
| `user_id` | `bigint` | Külső kulcs (Foreign Key) a `users` táblához. Kaszkádolt törlés. |
| `category_id` | `bigint` | Külső kulcs (Foreign Key) a `categories` táblához. Kaszkádolt törlés. |
| `amount` | `decimal(10, 2)` | A beállított limit összege (nullable). |
| `created_at` | `timestamp` | Létrehozás ideje. |
| `updated_at` | `timestamp` | Utolsó módosítás ideje. |

### 5. notifications (Értesítések)
Rendszerértesítések tárolása.

| Mező | Típus | Leírás |
|---|---|---|
| `id` | `uuid` | Elsődleges kulcs (Primary Key). |
| `type` | `string` | Az értesítés típusa. |
| `notifiable_type` | `string` | A kapcsolódó modell típusa (polimorfikus kapcsolat). |
| `notifiable_id` | `bigint` | A kapcsolódó modell azonosítója (polimorfikus kapcsolat). |
| `data` | `text` | Az értesítés adatai (JSON). |
| `read_at` | `timestamp` | Olvasás ideje (nullable). |
| `created_at` | `timestamp` | Létrehozás ideje. |
| `updated_at` | `timestamp` | Utolsó módosítás ideje. |

### Egyéb táblák
A Laravel keretrendszer alapértelmezett táblái:
- `failed_jobs`: Sikertelen háttérfolyamatok tárolása.
- `password_resets`: Jelszó-visszaállítási tokenek.
- `personal_access_tokens`: API hitelesítési tokenek (Sanctum).