--
-- Menampilkan data member yang berada pada provinsi sumatera utara dan dalam satu kabupaten
--

SELECT mst_member.nama, mst_member.email FROM mst_member
INNER JOIN mst_kabupaten ON mst_member.id_kabupaten = mst_kabupaten.id_kabupaten
INNER JOIN mst_provinsi ON mst_member.id_provinsi = mst_provinsi.id_propinsi
WHERE mst_provinsi.id_propinsi = '3' AND mst_kabupaten.nama_kabupaten = 'Kota Binjai';

-------------------------------------------------------------------------------

--
-- Menampilkan data provinsi yang tidak ada dalam data member
--

SELECT * FROM mst_provinsi WHERE id_propinsi NOT IN (
  SELECT DISTINCT id_provinsi
  FROM mst_member
);

-------------------------------------------------------------------------------

--
-- Menampilkan data kabupaten yang tidak ada dalam data member
--

SELECT * FROM mst_kabupaten WHERE id_kabupaten NOT IN (
  SELECT DISTINCT id_kabupaten
  FROM mst_member
);

-------------------------------------------------------------------------------

--
-- Menampilkan data kecamatan yang tidak ada dalam data member
--

SELECT * FROM mst_kecamatan WHERE id_kecamatan NOT IN (
  SELECT DISTINCT id_kecamatan
  FROM mst_member
);

-------------------------------------------------------------------------------

--
-- Menampilkan nama member yang terdapat di Kab. Simalungun
--

SELECT nama FROM mst_member
INNER JOIN mst_kabupaten ON mst_member.id_kabupaten = mst_kabupaten.id_kabupaten
WHERE mst_kabupaten.id_kabupaten = '354';

-------------------------------------------------------------------------------

--
-- Menampilkan jumlah data instansi pada Kab. Bireuen dan Kab. Bener Meriah
--

SELECT mst_kabupaten.id_kabupaten, mst_kabupaten.nama_kabupaten, COUNT(mst_instansi.id_instansi) AS jumlah_instansi
FROM mst_instansi
INNER JOIN mst_kabupaten ON mst_instansi.kode_kabupaten = mst_kabupaten.kode_kabupaten
WHERE mst_kabupaten.id_kabupaten IN ('302', '330')
GROUP BY mst_kabupaten.id_kabupaten;

-------------------------------------------------------------------------------

--
-- Menampilkan data member yang berawalan huruf “M”
--

SELECT * FROM mst_member WHERE nama LIKE 'M%';

-------------------------------------------------------------------------------

--
-- Menampilkan alamat email yang mempunyai karakter “no” dan terdapat di provinsi Sumatera Utara
--

SELECT email FROM mst_member
INNER JOIN mst_provinsi ON mst_member.id_provinsi = mst_provinsi.id_propinsi
WHERE mst_provinsi.id_propinsi = '2' AND email LIKE '%no%';

-------------------------------------------------------------------------------

--
-- Menampilkan data member yang mempunyai kode instansi “2004”
--
SELECT * FROM mst_member
INNER JOIN mst_instansi ON mst_member.id_instansi = mst_instansi.id_instansi
WHERE mst_instansi.kode_instansi = '2004';

-------------------------------------------------------------------------------

--
-- Menampilkan data member yang mempunyai karakter kode kecamatan “.08.”
--
SELECT *
FROM mst_member
INNER JOIN mst_kecamatan ON mst_member.id_kecamatan = mst_kecamatan.id_kecamatan
WHERE mst_kecamatan.kode_kecamatan LIKE '%.08.%';

-------------------------------------------------------------------------------
