
# Nazwa kursu

**Autor:** Hubert Pochroń 34319

## Temat projektu

CatchCommune
###### Platforma cyfrowa dla wędkarzy - testowanie aplikacji webowej

## Opis projektu

CatchCommune to platforma cyfrowa stworzona z myślą o pasjonatach wędkarstwa. Celem projektu jest zapewnienie wędkarzom narzędzia do łatwego zarządzania ich łowiskami, dokumentowania udanych połowów oraz dzielenia się swoimi doświadczeniami z rosnącą społecznością miłośników wędkarstwa. Wykorzystując interaktywną mapę, użytkownicy mogą wybierać łowiska, sprawdzać aktualne warunki pogodowe i dzielić się zdjęciami swoich zdobyczy. Platforma oferuje również bogatą bazę wiedzy, w której użytkownicy mogą znajdować i publikować artykuły, recenzje sprzętu i porady dotyczące wędkarstwa.

### Kluczowe funkcjonalności:
- Interaktywna Mapa Łowisk: Umożliwia użytkownikom wybór i oznaczanie ulubionych miejsc połowu, zapewniając szczegółowe informacje i opinie innych użytkowników.
- Moduł Pogodowy: Integruje prognozę pogody, pozwalając wędkarzom planować swoje wyprawy z większą pewnością.
- Dziennik Połowów: Pozwala na zapisywanie informacji o połowach, w tym gatunku ryb, wadze, długości oraz dołączaniu zdjęć.
- Społeczność: Forum społecznościowe, w którym wędkarze mogą wymieniać się doświadczeniami, poradami i dyskutować na tematy związane z wędkarstwem.
- Rankingi i Statystyki: Prezentuje najlepsze zdobycze oraz statystyki dotyczące różnych gatunków ryb i łowisk.

## Uruchomienie projektu

-  `composer install`
-  `./vendor/bin/sail up -d`
-  `./vendor/bin/sail artisan migrate`

## Uruchomienie testów jednostkowych i integracyjnych

-  `./vendor/bin/sail test`

[//]: # (## Dokumentacja API)

## Scenariusze testowe dla testera manualnego

| ID | **Nazwa testu**            | **Cel testu**                                             | **Kroki testowe**                                                             | **Oczekiwany rezultat**                                                               |
|----|----------------------------|-----------------------------------------------------------|-------------------------------------------------------------------------------|---------------------------------------------------------------------------------------|
| 1  | Test Rejestracji Użytkownika | Sprawdzić, czy endpoint rejestracji tworzy nowego użytkownika. | Użycie metody POST do wysłania żądania do endpointu rejestracji z wymaganymi danymi. | Sprawdzenie, czy odpowiedź zawiera potwierdzenie utworzenia konta i odpowiedni status HTTP. |
| 2  | Test Logowania Użytkownika | Zweryfikować, czy endpoint logowania działa poprawnie.    | Wysłanie danych logowania do endpointu logowania przy użyciu metody POST.     | Sprawdzenie, czy w odpowiedzi otrzymano token uwierzytelniający.                      |
| 3  | Dodawanie Nowego Łowiska   | Testować, czy można dodać nowe łowisko przez API.         | Wysłanie żądania POST z danymi nowego łowiska do odpowiedniego endpointu.     | Sprawdzenie, czy odpowiedź serwera zawiera dane dodanego łowiska oraz status 201 Created. |
| 4  |Aktualizacja Informacji o Łowisku|Sprawdzić, czy API pozwala na aktualizację danych łowiska.|Użycie metody PUT/PATCH z nowymi danymi łowiska na odpowiednim endpoint.|Sprawdzenie, czy odpowiedź serwera potwierdza zmiany.|
| 5  |Usuwanie Łowiska|Sprawdzić, czy API pozwala na usunięcie łowiska.|Wysłanie żądania DELETE do endpointu odpowiedzialnego za usuwanie łowiska.|Sprawdzenie, czy odpowiedź serwera zawiera potwierdzenie usunięcia i status 200 OK lub 204 No Content.|
| 6  |Dodawanie Zdjęć Zdobyczy|Testowanie funkcjonalności dodawania zdjęć zdobyczy przez API.|Wysłanie żądania POST z obrazem i dodatkowymi danymi do odpowiedniego endpointu.|Sprawdzenie, czy odpowiedź serwera zawiera szczegóły dodanego zdjęcia i status 201 Created.|
| 7  |Pobieranie Listy Łowisk|Zweryfikować, czy API zwraca pełną listę dostępnych łowisk.|Wysłanie żądania GET do endpointu listy łowisk.|Sprawdzenie, czy odpowiedź zawiera listę łowisk i status 200 OK.|
| 8  |Wyszukiwanie Łowisk|Cel: Testowanie funkcjonalności wyszukiwania łowisk.|Wysłanie żądania GET z parametrami wyszukiwania do odpowiedniego endpointu.|Sprawdzenie, czy odpowiedź zawiera wyniki zgodne z kryteriami wyszukiwania.|
| 9  |Dodawanie Komentarzy do Łowiska|Sprawdzić, czy użytkownicy mogą dodawać komentarze do łowisk.|Wysłanie żądania POST z komentarzem do odpowiedniego endpointu.|Sprawdzenie, czy odpowiedź zawiera dodany komentarz i status 201 Created.|
| 10 |Zarządzanie Uprawnieniami Użytkownika|Sprawdzić, czy API pozwala na zmianę uprawnień użytkownika.|Wysłanie żądania PUT/PATCH do zmiany roli lub uprawnień użytkownika.|Sprawdzenie, czy odpowiedź potwierdza zmianę uprawnień.|


## Technologie użyte w projekcie

- PHP 8.1
- Laravel 10.32
- Laravel Sail 1.18
- Laravel Sanctum 3.3
- PHPUnit 10.1
- MYSQL 8.0
- Docker 24.0.6

## Licencja

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
