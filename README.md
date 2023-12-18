# Testowanie i Jakość Oprogramowania (Projekt) & Technologie aplikacji webowych II

**Autor:** Hubert Pochroń 34319

## Temat projektu

CatchCommune

###### Platforma cyfrowa dla wędkarzy i miłośników wędkarstwa

## Opis projektu

CatchCommune to platforma cyfrowa stworzona z myślą o pasjonatach wędkarstwa. Celem projektu jest zapewnienie wędkarzom
narzędzia do łatwego zarządzania ich łowiskami, dokumentowania udanych połowów oraz dzielenia się swoimi doświadczeniami
z rosnącą społecznością miłośników wędkarstwa. Wykorzystując interaktywną mapę, użytkownicy mogą wybierać łowiska,
sprawdzać aktualne warunki pogodowe i dzielić się zdjęciami swoich zdobyczy. Platforma oferuje również bogatą bazę
wiedzy, w której użytkownicy mogą znajdować i publikować artykuły, recenzje sprzętu i porady dotyczące wędkarstwa.

### Kluczowe funkcjonalności:

- Interaktywna Mapa Łowisk: Umożliwia użytkownikom wybór i oznaczanie ulubionych miejsc połowu, zapewniając szczegółowe
  informacje i opinie innych użytkowników.
- Moduł Pogodowy: Integruje prognozę pogody, pozwalając wędkarzom planować swoje wyprawy z większą pewnością.
- Dziennik Połowów: Pozwala na zapisywanie informacji o połowach, w tym gatunku ryb, wadze, długości oraz dołączaniu
  zdjęć.
- Społeczność: Forum społecznościowe, w którym wędkarze mogą wymieniać się doświadczeniami, poradami i dyskutować na
  tematy związane z wędkarstwem.
- Rankingi i Statystyki: Prezentuje najlepsze zdobycze oraz statystyki dotyczące różnych gatunków ryb i łowisk.

## Uruchomienie projektu

- `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`
- `sail composer install`
- `sail npm install`
- `sail up -d`
- `sail artisan migrate`
- `sail artisan db:seed`
- `sail npm run dev`

## Uruchomienie testów jednostkowych i integracyjnych

- `sail test`

[//]: # (## Dokumentacja API)

## Scenariusze testowe dla testera manualnego

| ID | **Nazwa testu**                 | **Cel testu**                                                 | **Kroki testowe**                                                | **Oczekiwany rezultat**                                                                                 |
|----|---------------------------------|---------------------------------------------------------------|------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------|
| 1  | Test Rejestracji Użytkownika    | Sprawdzić, czy użytkownik może się zarejestrować.             | 1. Otwórz stronę rejestracji w przeglądarce.<br/>2. Wypełnij formularz rejestracji wymaganymi danymi użytkownika.<br/>3. Kliknij przycisk "Zarejestruj się".| Oczekuj przekierowania na stronę powitalną lub wyświetlenia komunikatu o sukcesie rejestracji.|
| 2  | Test Logowania Użytkownika      | Zweryfikować, czy użytkownik może się zalogować.              | 1. Otwórz stronę logowania w przeglądarce.<br/>2. Wypełnij formularz logowania poprawnymi danymi użytkownika.<br/>3. Kliknij przycisk "Zaloguj się".<br/>| Oczekuj przekierowania na stronę powitalną lub wyświetlenia komunikatu o sukcesie logowania.|
| 3  | Przeglądanie wszystkich zdobyczy| Zweryfikować, czy użytkownik może zobaczyć wszystkie zdobycze. | 1. Otwórz stronę główną aplikacji.<br/>2. Przejdź do sekcji z listą zdobyczy.|Sprawdź, czy na stronie wyświetlają się wszystkie zdobycze.|
| 4  | Przeglądanie Listy Łowisk       | Zweryfikować, czy użytkownik może zobaczyć listę łowisk.      | 1. Otwórz stronę główną aplikacji.<br/>2. Przejdź do sekcji z listą dostępnych łowisk.|Sprawdź, czy na stronie wyświetlają się wszystkie dostępne łowiska.|
| 5  | Przeglądanie Profilu Użytkownika| Sprawdzić, czy użytkownik może zobaczyć swój profil.          | 1. Zaloguj się na swoje konto.<br/>2. Przejdź do sekcji z profilem użytkownika.|Sprawdź, czy na stronie wyświetlają się wszystkie dane użytkownika.|
| 6  | Pobieranie Listy Łowisk         | Zweryfikować, czy API zwraca pełną listę dostępnych łowisk.   | Wysłanie żądania GET do endpointu listy łowisk.                  | Sprawdzenie, czy odpowiedź zawiera listę łowisk i status 200 OK.                                        |
| 7  | Dodawanie wpisu do Łowiska      | Sprawdzić, czy użytkownicy mogą dodawać zdobycz do łowisk.    | Wysłanie żądania POST z wpisem do odpowiedniego endpointu.       | Sprawdzenie, czy odpowiedź zawiera dodany wpis i status 201 Created.                                    |
| 8  | Dodawanie Artykułu             | Sprawdzić, czy użytkownicy mogą dodawać artykuły.             | Zaloguj się na swoje konto i przejdź do strony dodania artykułu. | Sprawdzenie, czy artykuł został dodany.                                                                 |
| 9  | Dodawanie Komentarzy do Artykułu| Sprawdzić, czy użytkownicy mogą dodawać komentarze do artykułów. | Zaloguj się na swoje konto i przejdź do strony artykułu. | Sprawdzenie, czy komentarz został dodany.                                                               |
| 10 | Usuwanie artykułu              | Sprawdzić, czy użytkownicy mogą usuwać swoje artykuły.        | Zaloguj się na swoje konto i przejdź do strony artykułu.         | Sprawdzenie, czy artykuł został usunięty.                                                               |

## Technologie użyte w projekcie

- PHP 8.1
- Inertia.js 0.11
- Inertia Vue 3
- Laravel 10.32
- Laravel Sail 1.18
- Laravel Sanctum 3.3
- Laravel Breeze
- PHPUnit 10.1
- MYSQL 8.0
- Docker 24.0.6

## Licencja

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
