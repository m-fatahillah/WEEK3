NAMA : Muhammad Fatahillah Athabrani 
Kelas : TI 2F
NIM : 244107020121 

# Laporan Jobsheet 04 - Model dan Eloquent ORM
[cite_start]**Mata Kuliah:** Pemrograman Web Lanjut (PWL) [cite: 6]
[cite_start]**Materi:** Model dan Eloquent ORM [cite: 17]

---

## Praktikum 1 - `$fillable`
[cite_start]Pada praktikum ini, dipelajari penggunaan properti `$fillable` yang berguna untuk mendaftarkan atribut (nama kolom) yang diizinkan untuk diisi saat melakukan *insert* atau *update* melalui fitur *mass assignment*[cite: 38, 39].

* [cite_start]**Hasil Langkah 3:** Data user baru ('Manager 2') berhasil ditambahkan ke database dan ditampilkan di *browser*[cite: 80, 81]. [cite_start]Hal ini terjadi karena kolom `level_id`, `username`, `nama`, dan `password` telah didaftarkan dengan benar di dalam array `$fillable`[cite: 51].
![hasil langkah 3](img/langkah%203.png)
* [cite_start]**Hasil Langkah 6:** Terjadi *error* saat mencoba menyimpan data 'Manager 3'[cite: 96, 97]. [cite_start]Penyebabnya adalah atribut `password` dihapus dari `$fillable`[cite: 83]. Akibatnya, data *password* diabaikan oleh Eloquent ORM saat *mass assignment*, sehingga melanggar aturan database yang mewajibkan kolom *password* untuk diisi (*Not Null Violation*).
![hasil langkah 6](img/langkah%206.png)
---

## Praktikum 2.1 - Retrieving Single Models
[cite_start]Bagian ini mempraktikkan cara mengambil satu rekaman tunggal menggunakan metode `find`, `first`, atau `firstWhere`[cite: 104, 105].

* [cite_start]**Hasil Langkah 3 (`find`):** Penggunaan `UserModel::find(1)` berhasil mengambil dan menampilkan satu baris data pengguna yang memiliki *Primary Key* (`user_id`) bernilai 1[cite: 120, 143].
![hasil langkah 3 2.1](img/langkah%203%202.1.png)
* [cite_start]**Hasil Langkah 5 (`first`):** Penggunaan `UserModel::where('level_id', 1)->first()` berhasil mengambil model data **pertama** yang cocok dengan kriteria kondisi `level_id = 1`[cite: 149, 151].
![hasil langkah 5 2.1](img/langkah%205%202.1.png)
* [cite_start]**Hasil Langkah 7 (`firstWhere`):** `UserModel::firstWhere('level_id', 1)` memberikan hasil yang sama persis dengan metode sebelumnya, namun dengan penulisan sintaks yang lebih singkat[cite: 158, 159].
![hasil langkah 7 2.1](img/langkah%207%202.1.png)
* **Hasil Langkah 9 (`findOr` Sukses):** Mencari data ID 1 dan hanya mengambil kolom `username` serta `nama`. [cite_start]Karena data ada, nilai dikembalikan secara normal tanpa memicu *exception*[cite: 171, 173].
![hasil langkah 9 2.1](img/langkah%209%202.1.png)
* [cite_start]**Hasil Langkah 11 (`findOr` Gagal):** Mencari data dengan ID fiktif (misal 20)[cite: 180, 185]. [cite_start]Karena data tidak ditemukan, sistem mengeksekusi fungsi *closure* di dalamnya yang berisi `abort(404)`, sehingga *browser* menampilkan halaman *404 Not Found*[cite: 161, 182].
![hasil langkah 11 2.1](img/langkah%2011%202.1.png)


---

## Praktikum 2.2 - Not Found Exceptions
[cite_start]Mempraktikkan cara memberikan pengecualian secara otomatis jika model tidak ditemukan (melempar `ModelNotFoundException`)[cite: 188, 190].

* [cite_start]**Hasil Langkah 2 (`findOrFail`):** Data dengan ID 1 berhasil ditampilkan karena rekaman tersebut memang tersedia di database[cite: 197, 198].
![hasil langkah 2 2.2](img/langkah%202%202.2.png)
* [cite_start]**Hasil Langkah 4 (`firstOrFail`):** Mencari data dengan username fiktif ('manager9')[cite: 203, 206]. [cite_start]Karena data tidak ada, metode `firstOrFail()` gagal mengambil hasil pertama dan otomatis melempar `ModelNotFoundException`, yang dirender Laravel menjadi halaman *404 Not Found*[cite: 189, 190].
![hasil langkah 4 2.2](img/langkah%204%202.2.png)
---

## Praktikum 2.3 - Retrieving Aggregates
[cite_start]Menggunakan metode agregat yang disediakan pembuat kueri Laravel, seperti `count`, `sum`, `max`, dll[cite: 209].

* **Hasil Langkah 2:** Metode `UserModel::where('level_id', 2)->count()` berhasil menghitung jumlah baris data yang memiliki `level_id = 2`. [cite_start]Penggunaan fungsi `dd($user)` menghentikan proses eksekusi (*Dump and Die*) dan mencetak nilai skalar (misalnya angka 2) langsung ke layar[cite: 219, 220, 224].
![hasil langkah 2 2.3](img/langkah%202%202.3.png)
* [cite_start]**Hasil Langkah 3 & 4:** Setelah fungsi `dd()` dihapus dan file *view* disesuaikan, angka perhitungan agregat (jumlah pengguna) berhasil dirender ke dalam tabel HTML[cite: 225, 228].
![hasil langkah 4 2.3](img/langkah%204%202.3.png)


---

## Praktikum 2.4 - Retrieving or Creating Models
[cite_start]Mempelajari perbedaan metode pencarian dan pembuatan data menggunakan `firstOrCreate` dan `firstOrNew`[cite: 230, 233].

* **Hasil Langkah 5 (`firstOrCreate`):** Sistem mencari `username` 'manager22'. [cite_start]Karena belum ada, metode ini langsung melakukan operasi *insert* ke tabel `m_user` dengan atribut yang diberikan dan datanya langsung tersimpan secara permanen[cite: 288, 290].
![hasil langkah 5 2.4](img/langkah%205%202.4.png)
* [cite_start]**Hasil Langkah 11 (`firstOrNew` + `save`):** Setelah fungsi `$user->save()` dipanggil secara manual [cite: 332, 336][cite_start], barulah data 'manager33' secara resmi tersimpan ke dalam tabel `m_user`[cite: 235]. *(Catatan: Jika halaman ini di-refresh, akan muncul error Unique Constraint Violation (1062) karena Hash::make selalu menghasilkan nilai berbeda, memicu sistem untuk melakukan insert ulang username yang sama ke kolom yang bersifat unique).*
![hasil langkah 11 2.4](img/langkah%2011%202.4.png)

---

## Praktikum 2.5 - Attribute Changes
[cite_start]Memeriksa status dan perubahan atribut pada model[cite: 339].

* [cite_start]**Hasil Langkah 2 (`isDirty` & `isClean`):** Saat model diubah nilainya sebelum di-*save* (`$user->username = 'manager56'`), metode `isDirty()` mengembalikan *true* (data kotor/berubah) dan `isClean()` mengembalikan *false*[cite: 340, 342, 350, 352, 356]. [cite_start]Setelah memanggil `$user->save()`, status diperbarui ke dalam database sehingga data menjadi "bersih" kembali (`isDirty` = *false*, `isClean` = *true*)[cite: 360, 361, 362].
![hasil langkah 2 2.5](img/langkah%202%202.5.png)
* [cite_start]**Hasil Langkah 4 (`wasChanged`):** Menggunakan `wasChanged()` setelah proses *save*[cite: 388, 396, 398]. [cite_start]Metode ini akan mengembalikan nilai *true* pada atribut tertentu (seperti `username`) yang terdeteksi mengalami pembaruan saat operasi penyimpanan terakhir pada siklus permintaan saat ini[cite: 388, 389, 417].
![hasil langkah 4 2.5](img/langkah%204%202.5.png)

---

## Praktikum 2.6 - Create, Read, Update, Delete (CRUD)
[cite_start]Implementasi proses pengolahan data CRUD secara utuh[cite: 420, 421].

* [cite_start]**Read (Langkah 3):** Penggunaan `UserModel::all()` di *controller* dan *looping* `@foreach` di *view* berhasil merender seluruh data pengguna ke dalam tabel HTML[cite: 433, 440, 450, 451].
![hasil langkah 3 2.6](img/langkah%203%202.6.png)
* **Create (Langkah 10):** Form tambah data berhasil mengeksekusi metode POST. [cite_start]Metode `tambah_simpan` menerima *Request* dan memanggil `UserModel::create()` untuk menyimpan data baru, lalu me-*redirect* kembali ke halaman daftar user [cite: 455, 484, 486-492, 493].
![hasil langkah 10 2.6](img/langkah%2010%202.6.png)
* [cite_start]**Update (Langkah 14 & 17):** Tautan ubah mengarahkan ke form yang menampilkan nilai data lama berdasarkan ID[cite: 521]. [cite_start]Saat disubmit, metode PUT memicu pembaruan pada database menggunakan `$user->save()`[cite: 502, 532].
![hasil langkah 17 2.6](img/langkah%2017%202.6.png)
* [cite_start]**Delete (Langkah 20):** * Mengklik "Hapus" pada data baru mengeksekusi `$user->delete()` dan data berhasil dihapus dari sistem[cite: 539, 541]. 
    * **Analisis Tambahan:** Apabila menghapus user dengan ID 1 (Admin), akan muncul *Error Integrity constraint violation (1451)*. Hal ini terjadi karena database memiliki relasi *Foreign Key* ke tabel `t_stok`, sehingga data *parent* (User) tidak dapat dihapus jika data *child* (Stok) masih menggunakannya.
![hasil langkah 20 2.6](img/langkah%2020%202.6.png)

---

## Praktikum 2.7 - Relationships
[cite_start]Mengelola relasi antar model (*One to One* dan *One to Many*)[cite: 546, 578].

![hasil 2.7](img/hasil%202.7.png)
