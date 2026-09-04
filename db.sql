CREATE  absenGuru;


use absenGuru;

 create table guru (
	id int auto_increment primary key,
	nama_guru varchar(50),
	mata_pelajaran varchar(50),
	no_hp varchar(15)
);

SELECT * from guru;

create table kelas (
	id int auto_increment primary key,
	nama_kelas varchar(10),
	id_wali_kelas int UNIQUE,
	jumlah_siswa int,
	foreign key (id_wali_kelas) 
	references guru(id) on delete CASCADE
);

select * from kelas;

create table jurnal(
	id int auto_increment primary key,
	id_guru int not null,
	id_kelas int not null,
	tanggal DATE,
	jam_ke int,
	materi varchar(75),
	jumlah_hadir int,
	jumlah_tidak_hadir int,
	status_kehadiran enum('hadir','izin','sakit','tanpa keterangan'),
	catatan text,
	foreign key (id_guru) references guru(id) on delete cascade,
	foreign key (id_kelas) references kelas(id) on delete cascade
)

select * from jurnal;

INSERT INTO guru (nama_guru, mata_pelajaran, no_hp) VALUES
('Budi Santoso', 'Matematika', '081234567890'),
('Siti Rahmawati', 'Bahasa Indonesia', '085712345678'),
('Ahmad Dahlan', 'Informatika', '082198765432'),
('Dewi Lestari', 'agama', '083811223344'),
('Eko Prasetyo', 'Bahasa Inggris', '089655443322'),
('Badrus Sulaiman','jurusan RPL','098987878987'),
('Hendra Gunawan', 'Kimia', '081377889900'),
('Rina Pratama', 'ipas', '085233445566'),
('Agus Setiawan', 'Sejarah', '087812341234'),
('Nur Hidayah', 'Seni Budaya', '082266778899');

INSERT INTO kelas (nama_kelas, id_wali_kelas, jumlah_siswa) VALUES
('X RPL 1', 1, 32),
('X RPL 2', 2, 30),
('XI RPL 1', 3, 34),
('XI RPL 2', 6, 31),
('XII RPL 1', 5, 33),
('XII RPL 2', 4, 35),
('X DKV 1', 7, 28),
('X DKV 2', 8, 29),
('XI DKV 1', 9, 30),
('XII DKV 1', 10, 31);


INSERT INTO jurnal (id_guru, id_kelas, tanggal, jam_ke, materi, jumlah_hadir, jumlah_tidak_hadir, status_kehadiran, catatan) VALUES
(1, 1, '2026-07-20', 1, 'Matriks dan Vektor', 30, 2, 'hadir', 'Siswa kondusif, tugas hal 15'),
(2, 2, '2026-07-20', 3, 'Teks Laporan Hasil Observasi', 28, 2, 'hadir', 'Praktik menulis laporan di lab'),
(3, 3, '2026-07-21', 1, 'Algoritma Pemrograman Java', 33, 1, 'hadir', 'Praktik koding berjalan lancar'),
(4, 6, '2026-07-21', 4, 'Toleransi Antar Umat Beragama', 32, 3, 'hadir', 'Diskusi interaktif kelompok'),
(5, 5, '2026-07-22', 2, 'Application Letter & CV', 31, 2, 'hadir', 'Latihan membuat CV bahasa Inggris'),
(6, 4, '2026-07-22', 5, 'Database Design & DDL SQL', 30, 1, 'hadir', 'Latihan membuat query database'),
(7, 7, '2026-07-23', 1, 'Struktur Atom dan Tabel Periodik', 27, 1, 'hadir', 'Penyampaian bab 2 selesai'),
(8, 8, '2026-07-23', 3, 'Ekosistem dan Penanganan Limbah', 28, 1, 'hadir', 'Observasi lingkungan sekolah'),
(9, 9, '2026-07-24', 2, 'Perlawanan Terhadap Kolonialisme', 29, 1, 'izin', 'Guru izin rapat, siswa diberi tugas mandiri'),
(10, 10, '2026-07-24', 4, 'Apresiasi Karya Seni Rupa 2D', 30, 1, 'hadir', 'Pameran karya mini di dalam kelas');

-- filter:D
-- A

SELECT 
    j.tanggal, 
    j.jam_ke, 
    g.nama_guru, 
    k.nama_kelas, 
    j.materi, 
    j.status_kehadiran
FROM jurnal j
JOIN guru g ON j.id_guru = g.id
JOIN kelas k ON j.id_kelas = k.id
WHERE j.tanggal = '2026-07-20'
ORDER BY j.jam_ke ASC
LIMIT 5;

-- B

SELECT 
    j.tanggal, 
    g.nama_guru, 
    g.mata_pelajaran, 
    k.nama_kelas, 
    j.status_kehadiran, 
    j.catatan
FROM jurnal j
JOIN guru g ON j.id_guru = g.id
JOIN kelas k ON j.id_kelas = k.id
WHERE j.status_kehadiran IN ('izin', 'sakit', 'tanpa keterangan')
ORDER BY j.tanggal DESC
LIMIT 5;

-- C

SELECT 
    j.tanggal, 
    j.jam_ke, 
    k.nama_kelas, 
    g.nama_guru, 
    j.materi
FROM jurnal j
JOIN kelas k ON j.id_kelas = k.id
JOIN guru g ON j.id_guru = g.id
ORDER BY j.tanggal DESC, j.jam_ke DESC
LIMIT 5;

-- D
SELECT 
    k.nama_kelas, 
    j.tanggal, 
    g.nama_guru, 
    j.materi, 
    j.jumlah_tidak_hadir
FROM jurnal j
JOIN kelas k ON j.id_kelas = k.id
JOIN guru g ON j.id_guru = g.id
WHERE j.jumlah_tidak_hadir > 0
ORDER BY j.jumlah_tidak_hadir DESC
LIMIT 5;

-- E
SELECT 
    k.nama_kelas, 
    j.tanggal, 
    j.jam_ke, 
    g.nama_guru, 
    j.materi, 
    j.jumlah_hadir
FROM jurnal j
JOIN kelas k ON j.id_kelas = k.id
JOIN guru g ON j.id_guru = g.id
WHERE k.nama_kelas LIKE '%RPL%' AND j.jam_ke <= 2
ORDER BY j.tanggal DESC, j.jam_ke ASC
LIMIT 5;


-- inih update:v
UPDATE jurnal 
SET 
    materi = 'matriks dan operasi matriks',
    catatan = 'Revisi: materi dilanjutkan ke operasi matriks dasar'
WHERE id = 1;

-- verivikasih
SELECT 
    j.id, 
    g.nama_guru, 
    k.nama_kelas, 
    j.materi, 
    j.catatan
FROM jurnal j
JOIN guru g ON j.id_guru = g.id
JOIN kelas k ON j.id_kelas = k.id
WHERE j.id = 1;

-- delete
DELETE FROM jurnal 
WHERE id = 10;

-- verifikasi lagi
SELECT * FROM jurnal WHERE id = 10;






-- tugas 2

-- user = kepala sekolah


CREATE USER 'kepala_sekolah'@'%' IDENTIFIED BY 'kepsek111';
GRANT SELECT ON absenGuru.* TO 'kepala_sekolah'@'%';

-- user = staf piker

CREATE USER 'staf_piket'@'%' IDENTIFIED BY 'staf_pik1';
GRANT SELECT, INSERT, UPDATE ON absenGuru.* TO 'staf_piket'@'%';

FLUSH PRIVILEGES;

-- cross check,aoakah udah ada pa belom


SELECT user,host FROM mysql.user;

-- LIAT HAK AKSES:O

SHOW GRANTS FOR 'kepala_sekolah'@'%';
SHOW GRANTS FOR 'staf_piket'@'%';


-- join lagi:D

-- inner join:v
SELECT 
    j.id AS id_jurnal,
    j.tanggal,
    j.jam_ke,
    g.nama_guru,
    g.mata_pelajaran,
    k.nama_kelas,
    j.materi,
    j.status_kehadiran
FROM jurnal j
INNER JOIN guru g ON j.id_guru = g.id
INNER JOIN kelas k ON j.id_kelas = k.id;
-- lefr join guru
SELECT 
    g.nama_guru,
    g.mata_pelajaran,
    j.tanggal,
    k.nama_kelas,
    j.materi
FROM guru g
LEFT JOIN jurnal j ON g.id = j.id_guru
LEFT JOIN kelas k ON j.id_kelas = k.id;
-- left join kelas
SELECT 
    k.nama_kelas,
    g_wali.nama_guru AS wali_kelas,
    j.tanggal,
    g_pengajar.nama_guru AS guru_pengajar,
    j.materi
FROM kelas k
LEFT JOIN guru g_wali ON k.id_wali_kelas = g_wali.id
LEFT JOIN jurnal j ON k.id = j.id_kelas
LEFT JOIN guru g_pengajar ON j.id_guru = g_pengajar.id;


-- 5. Buat minimal 2 query laporan menggunakan GROUP BY + HAVING, misalnya: 
-- (a) jumlah pertemuan yang diajar tiap guru, 
-- (b) guru dengan status tidak hadir (Izin/Sakit/Tanpa Keterangan) lebih dari 1 kali.

-- a
SELECT 
    g.nama_guru,
    COUNT(j.id) AS total_pertemuan
FROM guru g
JOIN jurnal j ON g.id = j.id_guru
GROUP BY g.id, g.nama_guru
HAVING COUNT(j.id) >= 1;
-- b
SELECT 
    g.nama_guru,
    COUNT(j.id) AS total_tidak_hadir
FROM guru g
JOIN jurnal j ON g.id = j.id_guru
WHERE j.status_kehadiran IN ('izin', 'sakit', 'tanpa keterangan')
GROUP BY g.id, g.nama_guru
HAVING COUNT(j.id) >= 1;

-- subquery kelas yang blom di ajar:v
SELECT 
    k.id,
    k.nama_kelas,
    k.jumlah_siswa
FROM kelas k
WHERE k.id NOT IN (
    SELECT DISTINCT id_kelas 
    FROM jurnal
);


-- union(panjanggg)
SELECT 
    j.tanggal,
    g.nama_guru,
    k.nama_kelas,
    j.status_kehadiran,
    j.catatan
FROM jurnal j
JOIN guru g ON j.id_guru = g.id
JOIN kelas k ON j.id_kelas = k.id
WHERE j.status_kehadiran = 'izin'

UNION

SELECT 
    j.tanggal,
    g.nama_guru,
    k.nama_kelas,
    j.status_kehadiran,
    j.catatan
FROM jurnal j
JOIN guru g ON j.id_guru = g.id
JOIN kelas k ON j.id_kelas = k.id
WHERE j.status_kehadiran = 'sakit';



-- testing hapus:v
DROP USER IF EXISTS 'kepala_sekolah'@'%';
DROP USER IF EXISTS 'staf_piket'@'%';

