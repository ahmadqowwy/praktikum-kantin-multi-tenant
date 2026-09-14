# Architecture — Kantin Multi-Tenant

## 1. Arsitektur Aplikasi

Aplikasi menggunakan pendekatan **Modular Monolith**.  
Struktur aplikasi dipisahkan berdasarkan domain atau fitur ke dalam direktori
`app/Modules`.

Struktur utama aplikasi:

```text
app/
├── Http/
├── Models/
├── Modules/
│   ├── Admin/
│   ├── Catalog/
│   ├── Kitchen/
│   ├── Ordering/
│   ├── Payment/
│   ├── Payments/
│   └── Reporting/
└── Providers/