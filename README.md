# Laravel Simple Project

Proyek Laravel sederhana ini mencakup penggunaan Laravel versi 10 untuk mengambil data dari [API Random User](https://randomuser.me/api/), mengolah data, menyimpannya dalam tabel `hasil_response`, dan menampilkan ringkasan data profesi. Berikut adalah langkah-langkahnya:

## Langkah 1: Membuat Project Laravel

1. Buat proyek Laravel versi 10.
2. Buat class `RandomUser` untuk mengambil data dari [API Random User](https://randomuser.me/api/).
3. Gunakan class `RandomUser` di dalam controller `HomeController`.

## Langkah 2: Menyimpan Data ke Tabel `hasil_response`

1. Buat tabel `hasil_response` dengan struktur kolom yang sesuai dengan ketentuan.
2. Buat tabel `jenis_kelamin` dengan relasi 1 dan 2 yang berelasi dengan tabel `hasil_response`.
3. Buat tabel `profesi` dengan kode dan nama profesi yang berelasi dengan tabel `hasil_response`.
4. Di dalam controller `HomeController`, buat fungsi `fetchRandomUserData` untuk mengambil, mengolah, dan menyimpan data ke tabel `hasil_response`.

## Langkah 3: Menampilkan Data

1. Buat tampilan untuk menampilkan data dalam tabel.
2. Di dalam controller `HomeController`, buat fungsi `showData` untuk menampilkan data dalam tabel sesuai dengan format yang diinginkan.

## Langkah 4: Ringkasan Data Profesi

1. Di dalam controller `HomeController`, buat fungsi `showProfessionSummary` untuk menghitung ringkasan data profesi dari tabel `hasil_response`.
2. Tampilkan ringkasan data profesi di halaman tampilan.

## Mengganti Default Landing Page

Untuk mengganti halaman landing page default Laravel, ubah rute dalam file `routes/web.php` menjadi fungsi yang diinginkan. Contoh:

```php
Route::get('/', [HomeController::class, 'showData']);
