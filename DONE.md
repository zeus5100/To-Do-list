# Podsumowanie projektu - To-Do list

## Zrealizowane zadania

1. **CRUD zadań**  
   - Implementacja pełnych operacji: tworzenie, odczyt, edycja, usuwanie.  

2. **Filtrowanie listy zadań**  
   - Możliwość filtrowania po priorytecie, statusie oraz terminie wykonania.

3. **Walidacja danych**  
   - Formularze tworzenia i edycji zadań poprawnie walidują wymagane pola, format daty, ograniczenia długości tekstu.

4. **Obsługa wielu użytkowników**  
   - Implementacja rejestracji i logowania wykorzystując Laravel auth 

5. **Powiadomienia e-mail**  
   - Zaplanowane wysyłanie powiadomień mailowych 1 dzień przed terminem zadania przy pomocy Laravel Scheduler i kolejki (Queue).

6. **Udostępnianie zadań publicznym linkiem z tokenem**  
   - Zaimplementowano generowanie linków z tokenem dostępowym i czasowym ograniczeniem ważności (2 dni).
   - Umożliwiono udostępnianie swoich zadań

7. **Historia zmian zadań**  
   - Wprowadzono wersjonowanie zadań, zapisując historię zmian.  
   - Umożliwiono przeglądanie historii edycji.

8. **Integracja z Google Calendar**  
   - Dodano mechanizm dodawania zadań do Google Google przy pomocy pakietu spatie/laravel-google-calendar.
   - Przy pierwszej próbie wymagane jest autoryzowanie dostępu za pomocą konta Google użytkownika.
---

## Dodatkowo
   - Skonfigurowano środowisko Docker Compose z kontenerami dla aplikacji Laravel, bazy danych MySQL, phpMyAdmin oraz osobnym kontenerem dla workerów.
   - Worker uruchamia supervisor, dzięki temu kolejki i scheduler działają w tle po uruchomieniu kontenerów, bez konieczności ręcznego ich włączania.

## Przemyślenia

1. **Integracja z Google Calendar**  
   Uwierzytelnienie w Google Calendar odbywa się jednorazowo, a token jest przechowywany w lokalnym systemie plików (`storage`). Zastosowana paczka `spatie/laravel-google-calendar` umożliwia tylko globalną autoryzację — brak wsparcia dla wielu użytkowników z oddzielnymi tokenami. Gdyby projekt miał skalować się na wielu użytkowników, potrzebna byłaby własna implementacja zarządzania tokenami i autoryzacją z bazą danych.

2. **Zarządzanie stanem synchronizacji**  
   Dobrą praktyką byłoby zapisywanie informacji o tym, które zadania zostały zsynchronizowane z kalendarzem oraz ewentualnie umożliwienie ich odłączenia. Obecnie zadania po wysłaniu nie są dalej monitorowane ani aktualizowane w kalendarzu.

3. **Wrażenia z realizacji projektu**  
   Projekt okazał się bardzo ciekawy i rozwijający. Szczególnie doceniam konieczność zapoznania się z Dockerem, oraz mechanizmem harmonogramowania zadań (scheduler). Wiele się nauczyłem, zwłaszcza w zakresie konfiguracji środowiska i automatyzacji procesów w kontenerach.