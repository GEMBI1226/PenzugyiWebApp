# Gemini AI Beállítási Útmutató

## 1. Navigálj az Alkalmazás Könyvtárába
A Laravel alkalmazás a `PenzugyiWebApp` alkönyvtárban található.
```bash
cd PenzugyiWebApp
```

## 2. Függőségek Telepítése
Telepítsd a szükséges PHP csomagokat, beleértve a Google Gemini klienst is.
```bash
composer install
```

## 3. Környezet Konfigurálása
Másold le a példa környezeti fájlt, ha még nem tetted meg.
```bash
cp .env.example .env
```

## 4. Gemini API Kulcs Beszerzése
1. Látogass el a [Google AI Studio](https://aistudio.google.com/) oldalra.
2. Jelentkezz be a Google fiókoddal.
3. Kattints a **"Get API key"** gombra, és hozz létre egy új kulcsot.

## 5. Alkalmazás Konfigurálása
Nyisd meg a `.env` fájlt, és add hozzá az API kulcsodat a `GEMINI_API_KEY` változóhoz:

```ini
GEMINI_API_KEY=ide_masold_az_api_kulcsodat
```

## 6. Beállítás Véglegesítése
Töröld a konfigurációs gyorsítótárat, hogy a Laravel biztosan érzékelje az új környezeti változót.
```bash
php artisan config:clear
```
