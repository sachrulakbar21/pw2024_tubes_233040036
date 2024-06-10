-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jun 2024 pada 05.30
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicfy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artis`
--

CREATE TABLE `artis` (
  `id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artis`
--

INSERT INTO `artis` (`id`, `kategori_id`, `nama`, `foto`, `detail`) VALUES
(7, 1, 'Tulus', 'TwHobeaWhWEdR5FCqx8v.jpg', '                    Tulus dikenal dengan suaranya yang khas dan lirik lagu yang mendalam. Memulai kariernya pada tahun 2011, Tulus cepat meraih popularitas dengan lagu-lagu yang menyentuh hati dan telah meraih berbagai penghargaan musik di Indonesia.                                                            '),
(8, 1, 'Raisa Andriana', 'md3vUYC0gSS6153VhAFM.jpg', '                    Raisa adalah penyanyi pop Indonesia yang terkenal dengan suara lembutnya dan lagu-lagu romantisnya. Dia memulai karier solonya pada tahun 2010 dan telah merilis beberapa album sukses serta mendapatkan banyak penghargaan.                '),
(9, 6, 'Isyana Sarasvati', 'hlcg3aFnB0b3fgVVc1Oh.jpg', '                    Isyana adalah penyanyi dan penulis lagu yang juga merupakan musisi klasik terlatih. Dia terkenal dengan kemampuan vokalnya yang luar biasa dan kecakapannya bermain berbagai alat musik.                '),
(10, 2, 'Nadin Amizah', '4hOyZQnyYOWsTPYPcrlr.jpg', '                    Nadin dikenal dengan suara yang lembut dan lirik-lirik puitisnya. Debut albumnya yang berjudul &quot;Selamat Ulang Tahun&quot; menerima banyak pujian dan memperkuat posisinya sebagai penyanyi indie yang berbakat.                '),
(11, 7, 'Afgan Syahreza', 'gwBdGf93jurbmBCcljPi.jpg', '                    Afgan adalah penyanyi pop dan R&amp;B yang terkenal dengan vokal kuat dan teknik menyanyi yang mumpuni. Sejak debutnya pada tahun 2008, Afgan telah merilis banyak lagu hits dan album yang sukses.                '),
(12, 2, 'Pamungkas', 'bh3AwQWdOyXTWRY2vGD2.jpg', '                    Pamungkas adalah penyanyi dan penulis lagu yang dikenal melalui lagu-lagu indie pop-nya. Dia meraih popularitas dengan album &quot;Walk the Talk&quot; yang sukses besar di kalangan penikmat musik indie.                '),
(13, 6, 'Yura Yunita', 'LcMlOXAzwjKgb9lGXMiM.png', '                    Yura adalah penyanyi yang memadukan elemen pop dan jazz dalam musiknya. Dia dikenal dengan penampilan panggung yang energik dan suara yang kuat serta khas.                '),
(14, 1, 'Maudy Ayunda', '8tYAOOGOSEnTHODBVJMl.png', '                                        Selain sebagai penyanyi, Maudy juga dikenal sebagai aktris dan aktivis. Lagu-lagunya yang catchy dan lirik yang inspiratif membuatnya menjadi salah satu artis muda yang berpengaruh di Indonesia.                                '),
(15, 1, 'Arsy Widianto', 'l79cCdbWnkRJZzEEypSW.jpg', '                    Arsy adalah penyanyi muda yang mengikuti jejak ayahnya, Yovie Widianto, dalam industri musik. Dia telah merilis beberapa single hits yang diterima baik oleh penikmat musik.                '),
(16, 2, 'Sal Priadi', 'XP4npdfi2eguor2Me5DX.png', '                    Sal Priadi adalah penyanyi dan penulis lagu yang dikenal dengan gaya musiknya yang unik dan lirik-lirik yang mendalam. Debut albumnya &quot;Berhati&quot; mendapat banyak pujian dan menjadikannya salah satu artis indie yang diperhitungkan.\r\n                ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'POP'),
(2, 'INDIE'),
(6, 'JAZZ'),
(7, 'RNB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(2, 'nisa2', '$2y$10$R7.pu3pxlzxWb4xmRmdDieP7sl3shZlv8R2vWnFaiRPuw9G8EnCoG', 'admin'),
(5, 'z', '$2y$10$Lwhq5p/ilROoZbFoUgGGUeX9w0zpwPNhIbFby1HioFtaTjjtwbxri', 'user'),
(17, 'admin', '$2y$10$XafabJt.Ft4Bf32F/D3P1u4m9M0V0iPh4UKjS4DjBNobT2pqkzhAu', 'admin'),
(38, 'a', '$2y$10$9JTQiXU0465cx.5FIGWvGu7FhY7Kf26brauYrb7XE6ozK7nEPU79i', 'admin'),
(39, 'masjo', '$2y$10$B0vD5aE.3Op/9nW/PFnH9utFzuQ8wUIq7iMv.cKRG3pTnKliKPANm', 'user'),
(40, 'dezikse', '$2y$10$0cOW8zXKG3cdvA6H.X3a7eD29rJJW8NMt69wTR3IGzxt/hDACeYUO', 'user'),
(41, 'tes', '$2y$10$aVCYXX54EHFxIwqbwVXIJ.FsUuHxFg7jjbBKKB6YKs4kkEp8geeAW', 'user'),
(42, 'ff', '$2y$10$llcfe/NzgsVQgbgtXXEUmelOx7IHv829xGGSVDtxRuG48VRmK5s9q', 'user'),
(43, 'user', '$2y$10$GymYPMJ2ZnrAiJAQZ6QkZOqwEi75PMp7R.L2joCLdlR68er0APlS6', 'user'),
(44, 'd', '$2y$10$oqFwx.XvyEDhyfqiq/M7xO5MuzVMoXIPU21vpun4mXKzVluq.wq0i', 'user'),
(45, 'p', '$2y$10$QwI7q5asnzTnCKyX3a0Iu.29MlSQwU.mD6QoI8ITNHGVRggJ36YDG', 'user'),
(46, 'f', '$2y$10$hWSLwkFz5eqmyoxSskMMTef7s/ekiEozxf6gP6YzPcKVhgXQQxkEa', 'user'),
(47, 'ada', '$2y$10$Awd/Lvcp0jyw0Cylt53TCuIyRTVhNgaTboJQ4rpjMMlRVxxtcBpkm', 'user'),
(48, 'dzikri', '$2y$10$UFBvS48eBmByaeexn.wzYuzW0j5exys3zL4YYx.CPUX0vg0dQop7S', 'user'),
(49, 't', '$2y$10$G.jIr/Anghyr9Tla4tj6aeE7X0MIfIsEKForSEEC34N2gycvhgXUC', 'admin'),
(50, '4', '$2y$10$7LD6QyoyBIJObD7zy1iliOLMR5fFn1HdqxYl4hhFyJx4qx6wfNtmu', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artis`
--
ALTER TABLE `artis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artis`
--
ALTER TABLE `artis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artis`
--
ALTER TABLE `artis`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
