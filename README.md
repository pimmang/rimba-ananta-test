# 📘 User API Laravel - Dokumentasi Sistem

## 📌 Deskripsi

Proyek ini adalah RESTful API yang dibangun menggunakan **Laravel 12** untuk mengelola data User dengan fitur berikut:

- Mendapatkan daftar semua User
- Mendapatkan User berdasarkan ID
- Menambahkan User baru
- Memperbarui User
- Menghapus User

API ini juga dilengkapi dengan middleware validasi dan pencatatan log request, dokumentasi API dengan swagger, serta pengujian unit berbasis **Jest** yang ditulis dalam proyek terpisah.

---

## 🚀 Menjalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/pimmang/rimba-ananta-test.git
cd rimba-ananta-test
```

### 2. Install Dependency

```bash
composer install
```

### 3. Copy File Environment

```bash
cp .env.example .env
```

### 4. Generate Key

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 6. Jalankan Server

```bash
php artisan serve
```

API akan tersedia di: `http://localhost:8000/api`

---

## 🧪 Testing dengan Jest (di Repo Terpisah)

Untuk pengujian API, digunakan **Jest** pada project JavaScript terpisah.

### 1. Clone Repo Testing

```bash
git clone https://github.com/pimmang/jest-test-laravel-user-api.git
cd jest-test-laravel-user-api
```

### 2. Install Dependency

```bash
npm install
```

Pastikan server Laravel berjalan di http://127.0.0.1:8000.

### 3. Jalankan Test

```bash
npm test
```

---

## 🛡️ Middleware

- **LoggingRequest** – mencatat setiap request API
- **ValidateRequest** – validasi global untuk input tertentu
- Middleware diterapkan langsung dalam route atau controller.

---

## 📂 API Endpoint

| Method | Endpoint          | Deskripsi                       |
| ------ | ----------------- | ------------------------------- |
| GET    | `/api/users`      | Mendapatkan semua User          |
| GET    | `/api/users/{id}` | Mendapatkan User berdasarkan ID |
| POST   | `/api/users`      | Menambahkan User baru           |
| PUT    | `/api/users/{id}` | Memperbarui User                |
| DELETE | `/api/users/{id}` | Menghapus User                  |

#🧾 Dokumentasi Swagger (OpenAPI)

### URL dokumentasi swagger

```bash
http://localhost:8000/api/documentation
```
