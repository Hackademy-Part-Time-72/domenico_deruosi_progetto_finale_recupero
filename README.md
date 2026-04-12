# Mindspace - Blog di Psicologia e Mindfulness

Mindspace è un'applicazione web moderna dedicata alla divulgazione scientifica e alla riflessione sui temi della psicologia, del benessere mentale e della mindfulness. Il progetto è stato sviluppato come piattaforma di blogging completa, sicura e altamente performante.

## Funzionalità Principali

### Blog e Contenuti
- Esplorazione Articoli: Navigazione fluida tra gli ultimi approfondimenti pubblicati.
- Sistema di Ricerca: Motore di ricerca integrato per trovare contenuti tramite parole chiave nel titolo o nel corpo dell'articolo.
- Filtri per Tag: Classificazione degli articoli tramite tag cliccabili per una navigazione tematica.
- Tempo di Lettura: Calcolo automatico del tempo stimato di lettura per ogni post.

### Autenticazione e Area Riservata
- Gestione Utenti: Registrazione, Accesso e Logout gestiti tramite Laravel Fortify.
- Dashboard Autore: Un'area dedicata dove ogni utente può gestire i propri articoli.
- CRUD Completo: Creazione, modifica e cancellazione degli articoli con interfaccia intuitiva.
- Sicurezza: Protezione delle rotte tramite Middleware e autorizzazioni granulari tramite Laravel Policies.

### Design e UX
- Stile Zen: Design minimalista e pulito, ottimizzato per la lettura.
- Mobile First: Interfaccia completamente responsive, ottimizzata per smartphone, tablet e desktop.
- Effetti Visivi: Animazioni di fade-in e sfondi immersivi per un'esperienza utente rilassante.
- Form Contatti: Sistema di messaggistica integrato per contattare l'amministrazione.

## Stack Tecnologico

- Framework PHP: [Laravel 11](https://laravel.com/)
- Autenticazione: [Laravel Fortify](https://jetstream.laravel.com/fortify/introduction.html)
- Database: MySQL / SQLite
- Frontend: [Bootstrap 5](https://getbootstrap.com/), [Bootstrap Icons](https://icons.getbootstrap.com/)
- Fonts: Poppins (Google Fonts)

## Installazione

1. Clona il repository:
   ```bash
   git clone <repository-url>
   cd domenico_deruosi_progetto_finale_recupero
   ```

2. Installa le dipendenze:
   ```bash
   composer install
   npm install && npm run build
   ```

3. Configura l'ambiente:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Esegui le migration:
   ```bash
   php artisan migrate
   ```

5. Avvia il server:
   ```bash
   php artisan serve
   ```

## Ottimizzazioni Implementate
- Query Optimization: Risoluzione del problema N+1 tramite Eager Loading delle relazioni user e tags.
- Security Hardening: Validazione rigorosa degli URL, protezione XSS e accessi null-safe nelle viste.
- SEO Ready: Inserimento di Meta Tags dinamici e Open Graph per una condivisione social professionale.

---
Sviluppato per promuovere la consapevolezza e il benessere interiore.
