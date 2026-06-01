-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2026 pada 18.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erecruitment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cv_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `notes` text NOT NULL,
  `cv_file` varchar(255) NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `applications`
--

INSERT INTO `applications` (`id`, `applicant_id`, `job_id`, `status`, `notes`, `cv_file`, `apply_date`) VALUES
(1, 3, 1, 'accepted', 'selamat bekerja', 'CV_IBNU_ATTAR_TERBARU6.pdf', '2026-05-28 07:34:32'),
(2, 3, 3, 'rejected', 'ditolak ', 'CV_IBNU_ATTAR_TERBARU8.pdf', '2026-05-31 08:50:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `company`, `description`, `location`, `salary`, `created_at`) VALUES
(1, 'Operator Product', 'Pt. Cinta Lama Bersemi Kembali', 'silahkan apply', 'Rock Bottom', '6.000.000-10.000.000', '2026-05-27 14:49:11'),
(2, 'Manager Bank', 'Pt. Mencari Cinta Sejati', 'Silahkan Apply', 'Shalty Spytown', '10.000.000-15.000.000', '2026-05-27 15:07:32'),
(3, 'Marketing Executive', 'Pt. Innovex Sejahtera', 'Silahkan Apply', 'Spacetown', '8.000.000-12.000.000', '2026-05-28 12:08:31'),
(4, 'Sales Executive', 'Pt. Input Manual Abadi', 'Silahkan Apply', 'London', '13.000.000-17.000.000', '2026-05-28 12:09:18'),
(5, 'Operator Product', 'Pt. Yang Hyu Yahaha Hayuk', 'Silahkan Apply', 'Bikini Bottom', '6.000.000-10.000.000', '2026-05-28 12:10:10'),
(6, 'Front Line Admin', 'Pt. Abadi Lentera Hitam', 'Silahkan Apply', 'Ratatuli', '7.000.000-11.000.000', '2026-05-28 12:11:02'),
(7, 'Admin IT', 'Pt. Bingung Mencari Nama', 'Silahkan Appy', 'Kanada', '6.000.000-10.000.000', '2026-05-28 12:12:12'),
(8, 'Admin Cashier', 'Pt. BUMN Pemerintah ', 'Silahkan Apply', 'Garut', '8.000.000-12.000.000', '2026-05-28 12:13:05'),
(9, 'Supervisor IT', 'Pt. Ajitomo', 'Silahkan Apply', 'Area 55', '15.000.000', '2026-05-28 12:14:02'),
(10, 'Teller Bank', 'Pt. Dina Dima', 'Silahkan Apply', 'Ngawi', '10.000.000-15.000.000', '2026-05-28 12:14:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'applicant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `created_at`, `full_name`, `email`, `phone`, `photo`) VALUES
(1, 1, 'admin', '$2y$10$mawNqIykR9dDPsNV6ICg6OSi9/UifaDo.TaCLK0L50tcQmjYcWgBq', '2026-05-26 04:06:16', NULL, NULL, NULL, NULL),
(2, 2, 'pelamar', '$2y$10$gwwVinrG4ZEomkJ1oPCO4u0QUmmZOMdMX1s9lUxg1qRTWYK0FyjJW', '2026-05-26 04:20:18', 'ibnu Pratama', 'ibnu@gmail.com', '087967462813', NULL),
(3, 2, 'pelamar2', '$2y$10$Pv2z/yGqNOC9DZOtIQxAiehHFcQ0l3Pl6fMVfJvnGwEeTb2cONFee', '2026-05-27 15:13:12', 'Andi Pangestu abadi', 'andi@gmail.co.id', '08465729283', 'Gemini_Generated_Image_byk5iabyk5iabyk5.png'),
(4, 2, 'IBNU12', '$2y$10$4K9nDJgLtUVi5/7TdKEkK.SWdG5v8budUjcQTSKie7cVfoacOCCjq', '2026-05-31 04:54:54', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
