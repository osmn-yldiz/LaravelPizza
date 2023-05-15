-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 15 May 2023, 09:59:13
-- Sunucu sürümü: 10.6.12-MariaDB-cll-lve
-- PHP Sürümü: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `u0422818_laravel-pizza`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'PİZZA KÜÇÜK BOY', 'pizza-kucuk-boy', '2023-02-14 07:14:03', '2023-02-14 14:22:48'),
(2, 'PİZZA ORTA BOY', 'pizza-orta-boy', '2023-02-14 08:35:41', '2023-02-14 08:35:41'),
(3, 'PİZZA BÜYÜK BOY', 'pizza-buyuk-boy', '2023-02-14 08:35:51', '2023-02-14 08:35:51'),
(6, 'PİZZA EN BÜYÜK BOY', 'pizza-en-buyuk-boy', '2023-02-17 10:10:43', '2023-02-17 11:35:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_03_055202_create_pizzas_table', 1),
(6, '2021_10_04_053847_create_orders_table', 1),
(7, '2021_10_05_015823_add_phone_to_orders', 1),
(8, '2023_02_14_085337_create_categories_table', 1),
(9, '2023_02_14_114756_create_sub_categories_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(191) NOT NULL,
  `time` varchar(191) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `pizza_quantity` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'sırada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `time`, `category_id`, `subcategory_id`, `pizza_id`, `pizza_quantity`, `body`, `status`, `created_at`, `updated_at`, `phone`) VALUES
(5, 2, '2023-02-21', '21:06', 6, 16, 17, '3', 'osman', 'tamamlandı', '2023-02-19 13:06:31', '2023-02-22 05:49:29', '1234567890'),
(6, 3, '2023-02-21', '18:49', 6, 14, 15, '1', 'Osman', 'tamamlandı', '2023-02-20 09:50:02', '2023-02-20 09:50:46', '1234567890');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('osman@hotmail.com', '$2y$10$XGRGc2m5HCZob19/1C9yv.27Mg.T3a7Js3cZpZv1sI3ANJTyBrLX2', '2023-02-21 13:13:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pizzas`
--

INSERT INTO `pizzas` (`id`, `subcategory_id`, `name`, `url`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'EGE KÜÇÜK', 'ege-kucuk', 'Özel pizza sosu, pizza peyniri, tulum peyniri, kırmızı şerit biber, yeşil-siyah zeytin, kekik', 129, '1676367548.jpg', '2023-02-14 06:39:08', '2023-02-17 10:08:10'),
(3, 1, 'AKDENİZ KÜÇÜK', 'akdeniz-kucuk', 'Özel pizza sosu, pizza peyniri, beyaz peynir, siyah zeytin, küp domates, maydanoz', 129, '1676404288.jpg', '2023-02-14 16:42:38', '2023-02-17 10:08:17'),
(5, 1, 'MARGARITA KÜÇÜK', 'margarita-kucuk', 'Özel pizza sosu, pizza peyniri, domates', 119, '1676404755.jpg', '2023-02-14 16:59:15', '2023-02-17 10:08:22'),
(6, 1, 'VEGETARIAN KÜÇÜK', 'vegetarian-kucuk', 'Özel pizza sosu, pizza peyniri, yeşil-siyah zeytin, mantar, mısır, soğan, domates, yeşil biber', 129, '1676404807.jpg', '2023-02-14 17:00:07', '2023-02-17 10:08:29'),
(7, 2, 'MIX KÜÇÜK', 'mix-kucuk', 'Özel pizza sosu, pizza peyniri, sucuk, salam, sosis, yeşil biber, mantar', 129, '1676457761.jpg', '2023-02-15 07:42:41', '2023-02-17 10:08:38'),
(8, 5, '4 PEYNİRLİ KÜÇÜK', '4-peynirli-kucuk', 'Özel pizza sosu, mozzarella peyniri, beyaz peynir, tulum peyniri, cheddar peyniri', 139, '1676457832.jpg', '2023-02-15 07:43:52', '2023-02-17 10:08:46'),
(9, 6, 'EGE ORTA', 'ege-orta', 'Özel pizza sosu, pizza peyniri, tulum peyniri, kırmızı şerit biber, yeşil-siyah zeytin, kekik', 159, '1676457913.jpg', '2023-02-15 07:45:13', '2023-02-17 10:08:56'),
(10, 7, 'MIX ORTA', 'mix-orta', 'Özel pizza sosu, pizza peyniri, sucuk, salam, sosis, yeşil biber, mantar', 159, '1676457962.jpg', '2023-02-15 07:46:02', '2023-02-17 10:09:12'),
(11, 8, '4 PEYNİRLİ ORTA', '4-peynirli-orta', 'Özel pizza sosu, mozzarella peyniri, beyaz peynir, tulum peyniri, cheddar peyniri', 199, '1676458020.jpg', '2023-02-15 07:47:00', '2023-02-17 10:09:21'),
(12, 9, 'EGE BÜYÜK', 'ege-buyuk', 'Özel pizza sosu, pizza peyniri, tulum peyniri, kırmızı şerit biber, yeşil-siyah zeytin, kekik', 179, '1676458078.jpg', '2023-02-15 07:47:58', '2023-02-17 10:09:37'),
(13, 10, 'MIX BÜYÜK', 'mix-buyuk', 'Özel pizza sosu, pizza peyniri, sucuk, salam, sosis, yeşil biber, mantar', 179, '1676458125.jpg', '2023-02-15 07:48:45', '2023-02-17 10:09:43'),
(14, 11, '4 PEYNİRLİ BÜYÜK', '4-peynirli-buyuk', 'Özel pizza sosu, mozzarella peyniri, beyaz peynir, tulum peyniri, cheddar peyniri', 239, '1676458168.jpg', '2023-02-15 07:49:28', '2023-02-17 10:09:52'),
(15, 14, 'EGE EN BÜYÜK', 'ege-en-buyuk', 'Özel pizza sosu, pizza peyniri, tulum peyniri, kırmızı şerit biber, yeşil-siyah zeytin, kekik', 269, '1676644314.jpg', '2023-02-17 11:31:54', '2023-02-17 11:36:11'),
(16, 15, 'MIX EN BÜYÜK', 'mix-en-buyuk', 'Özel pizza sosu, pizza peyniri, sucuk, salam, sosis, yeşil biber, mantar', 269, '1676644442.jpg', '2023-02-17 11:34:02', '2023-02-17 11:34:02'),
(17, 16, '4 PEYNİRLİ EN BÜYÜK', '4-peynirli-en-buyuk', 'Özel pizza sosu, mozzarella peyniri, beyaz peynir, tulum peyniri, cheddar peyniri', 289, '1676644492.jpg', '2023-02-17 11:34:52', '2023-02-17 11:34:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'YEŞİL LEZZETLER', 'yesil-lezzetler', '2023-02-14 11:05:56', '2023-04-26 06:58:29'),
(2, 1, 'KLASİK LEZZETLER', 'klasik-lezzetler', '2023-02-14 11:06:57', '2023-02-18 13:39:51'),
(5, 1, 'GURME LEZZETLER', 'gurme-lezzetler', '2023-02-14 11:58:12', '2023-02-14 11:58:12'),
(6, 2, 'YEŞİL LEZZETLER', 'yesil-lezzetler', '2023-02-14 12:20:46', '2023-02-14 12:20:46'),
(7, 2, 'KLASİK LEZZETLER', 'klasik-lezzetler', '2023-02-14 12:21:01', '2023-02-14 12:21:01'),
(8, 2, 'GURME LEZZETLER', 'gurme-lezzetler', '2023-02-14 12:21:14', '2023-02-14 12:21:14'),
(9, 3, 'YEŞİL LEZZETLER', 'yesil-lezzetler', '2023-02-14 12:21:46', '2023-02-14 12:21:46'),
(10, 3, 'KLASİK LEZZETLER', 'klasik-lezzetler', '2023-02-14 12:21:57', '2023-02-14 12:21:57'),
(11, 3, 'GURME LEZZETLER', 'gurme-lezzetler', '2023-02-14 12:22:18', '2023-02-14 12:22:18'),
(14, 6, 'YEŞİL LEZZETLER', 'yesil-lezzetler', '2023-02-17 11:30:07', '2023-02-17 11:35:54'),
(15, 6, 'KLASİK LEZZETLER', 'klasik-lezzetler', '2023-02-17 11:32:32', '2023-02-17 11:32:32'),
(16, 6, 'GURME LEZZETLER', 'gurme-lezzetler', '2023-02-17 11:32:44', '2023-02-17 11:32:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$7XtmMnqMbp6gOB6etngECu179tkqsBMSnaLNwhhn62rsD4ZxT83sq', 1, 'Hn33pQZLNQ6cvqa9j7y4MwaEoPGVLiUpdOkP9QRYwKH4X289IbalTUdETOG3', '2023-02-14 06:37:54', '2023-02-14 06:37:54'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$Nyrtw0ZN4A8YHGwib1d9FOiysiUjhG68w09hNE05Rp/WM1XunTMXK', 0, NULL, '2023-02-15 06:32:31', '2023-02-15 06:32:31'),
(3, 'Osman', 'osman@hotmail.com', NULL, '$2y$10$yy4gk04/icS4l6A/zVt1POyyllWnNqj3wMdlFXaE2URSeS9PD3QgS', 0, NULL, '2023-02-20 09:48:57', '2023-02-20 09:48:57');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
