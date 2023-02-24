-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2023 at 12:14 AM
-- Server version: 10.5.18-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eonnthni_india`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `adminname` varchar(100) DEFAULT NULL,
  `adminemail` varchar(100) DEFAULT NULL,
  `adminpass` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `adminname`, `adminemail`, `adminpass`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'sadsadsa', 'sadsad@dcssad.com', 'sdfsafdasd', '2022-01-25 23:34:30', '2022-01-25 23:34:30'),
(3, 'sadsad', 'kaushik_rohit05@yahoo.com', '$2y$10$AYbxwgW6VN.XQ8/v8Z9y3uXF0BEKXctTTCaDdmziv5Cj69lE44GoW', '2022-01-25 23:37:28', '2022-01-25 23:37:28'),
(4, 'sadsadsa', 'sasssasdsa@dsfdsfdsf.com', '$2y$10$X/vDT26F9POzN.TEFNWALe3WmhcP./KSFwmIIAIoOtDka.CnC7rpS', '2022-01-25 23:42:21', '2022-01-25 23:42:21'),
(5, 'sadsad', 'sadsasda@dsfsfsf.com', '$2y$10$ilLuuXr8QejkkbOV.uzHXebwgOO/qk720/p56zJ7HAibuSUDwcCv.', '2022-01-25 23:43:01', '2022-01-25 23:43:01'),
(6, 'dsfdssdf', 'ddddd@dsdd.com', '$2y$10$uh9Mo5qUYNzuE.Df3/aNFeIT6AotnlJyK4U3F.juEB06v52vJxcJu', '2022-01-25 23:44:59', '2022-01-25 23:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbladsgallery`
--

CREATE TABLE `tbladsgallery` (
  `id` int(11) NOT NULL,
  `adid` int(11) DEFAULT NULL,
  `ad_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `category_slug` varchar(100) DEFAULT NULL,
  `category_image` varchar(100) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `category_small_description` varchar(255) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `isActive` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category`, `category_slug`, `category_image`, `meta_title`, `meta_description`, `category_small_description`, `category_description`, `sort_id`, `isActive`, `created_at`, `updated_at`) VALUES
(14, 'Women Seeking Men', 'women-seeking-men', 'women-seeking-men.png', 'Find Women Seeking Men in India Ads for Free', 'Browse HuntLocals to find sexy Indian women seeking men ads for free. Find largest collection of women seeking men in India ads here for free!', 'Browse HuntLocals to find sexy Indian women seeking men ads for free. Find largest collection of women seeking men in India ads here for free!', NULL, 3, 1, '2022-04-04 16:07:33', '2022-09-19 22:27:36'),
(18, 'Massage', 'massage', 'massage.jpg', 'Erotic Massage Spa, Body Massage Parlour India', 'Browse HuntLocals to find the best erotic massage spa or full body massage parlour in India. Find largest collection of ads for massage spa near you.', 'Browse HuntLocals to find the best erotic massage spa or full body massage parlour in India. Find largest collection of ads for massage spa near you!', NULL, 5, 1, '2022-04-04 16:20:39', '2022-09-19 21:44:16'),
(19, 'Shemale', 'shemale', 'shemale.jpg', 'Shemale Escorts India, TS Dating & Trans Sex India', 'Shemale escorts India, ts dating, transsexuals & ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!', 'Browse for shemale escorts India, ts dating, transsexuals & ladyboys available on HuntLocals. Choose from largest collection of shemale ads!', NULL, 4, 1, '2022-04-04 16:22:54', '2022-09-19 21:44:13'),
(22, 'Call Girls', 'call-girls', 'call-girls.jpg', 'Indian Call Girls, India Escorts Services', 'If you are looking for call girls in India then browse HuntLocals for the largest collection of independent women offering escorts services in India to individuals.', 'Browse HuntLocals for hot independent Indian girls and escorts looking to fulfill your sexual fantasies. Enjoy the erotic services without any hesitation today!', NULL, 1, 1, '2022-04-19 12:49:06', '2022-09-19 21:19:36'),
(23, 'Male Escorts', 'male-escorts', 'male-escorts.jpg', 'Male Escorts India, Gigolo, Call Boys & Gay Dating', 'Browse HuntLocals for adult classified ads for male escorts India, gigolos, call boys & gay dating ads online. Find the best individuals here available for hire!', 'Browse HuntLocals for adult classified ads for male escorts India, gigolos, call boys & gay dating ads online. Find the best individuals here available for hire!', NULL, 2, 1, '2022-09-19 21:23:58', '2022-09-19 21:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblcatlocseo`
--

CREATE TABLE `tblcatlocseo` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcatlocseo`
--

INSERT INTO `tblcatlocseo` (`id`, `category_id`, `region_id`, `location_id`, `title`, `description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 22, NULL, 1, NULL, NULL, 'Call Girls in Uttar Pradesh, Escorts Services Uttar Pradesh', 'Browse huntlocals for erotic call girls in Uttar Pradesh offering escorts services in Uttar Pradesh for VIP individuals! Find largest collection of call girls classified ads to fulfill your sexual urge.!', '2022-09-19 18:19:33', '2022-09-19 22:19:33'),
(2, 23, NULL, 1, NULL, NULL, 'Male Escorts Uttar Pradesh, Gigolo, Call Boys & Gay Dating', 'Browse HuntLocals for adult classified ads for male escorts Uttar Pradesh, gigolos, call boys & gay dating ads online. Find the best individuals here available for hire!', '2022-09-19 18:25:43', '2022-09-19 22:25:43'),
(3, 14, NULL, 1, NULL, NULL, 'Find Women Seeking Men in Uttar Pradesh Ads for Free', 'Browse HuntLocals to find sexy women seeking men in Uttar Pradesh ads for free. Find largest collection of women seeking men ads here for free!', '2022-09-19 18:29:23', '2022-09-19 22:29:23'),
(4, 19, NULL, 1, NULL, NULL, 'Shemale Escorts Uttar Pradesh, TS Dating & Trans Sex', 'Shemale escorts Uttar Pradesh, ts dating, transsexuals & ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!', '2022-09-19 18:41:22', '2022-09-19 22:41:22'),
(5, 18, NULL, 1, NULL, NULL, 'Erotic Massage Spa, Body Massage Parlour Uttar Pradesh', 'Browse HuntLocals to find the best erotic massage spa or full body massage parlour in Uttar Pradesh. Find largest collection of ads for massage spa near you.', '2022-09-19 18:51:17', '2022-09-19 22:51:17'),
(6, 22, NULL, 2, NULL, NULL, 'Call Girls in Ghaziabad, Escorts Services Ghaziabad', 'Browse huntlocals for erotic call girls in Ghaziabad offering escorts services in Ghaziabad for VIP individuals! Find largest collection of call girls classified ads to fulfill your sexual urge.!', '2022-09-19 18:20:43', '2022-09-19 22:20:43'),
(7, 23, NULL, 2, NULL, NULL, 'Male Escorts Ghaziabad, Gigolo, Call Boys & Gay Dating', 'Browse HuntLocals for adult classified ads for male escorts Ghaziabad, gigolos, call boys & gay dating ads online. Find the best individuals here available for hire!', '2022-09-19 18:25:41', '2022-09-19 22:25:41'),
(8, 14, NULL, 2, NULL, NULL, 'Find Women Seeking Men in Ghaziabad Ads for Free', 'Browse HuntLocals to find sexy women seeking men in Ghaziabad ads for free. Find largest collection of women seeking men ads here for free!', '2022-09-19 18:29:19', '2022-09-19 22:29:19'),
(9, 19, NULL, 2, NULL, NULL, 'Shemale Escorts Ghaziabad, TS Dating & Trans Sex', 'Shemale escorts Ghaziabad, ts dating, transsexuals & ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!', '2022-09-19 18:41:20', '2022-09-19 22:41:20'),
(10, 18, NULL, 2, NULL, NULL, 'Erotic Massage Spa, Body Massage Parlour Ghaziabad', 'Browse HuntLocals to find the best erotic massage spa or full body massage parlour in Ghaziabad. Find largest collection of ads for massage spa near you.', '2022-09-19 18:51:19', '2022-09-19 22:51:19'),
(11, 22, NULL, 3, NULL, NULL, 'Call Girls in Indirapuram, Escorts Services Indirapuram', 'Browse huntlocals for erotic call girls in Indirapuram offering escorts services in Indirapuram for VIP individuals! Find largest collection of call girls classified ads to fulfill your sexual urge.!', '2022-09-20 17:52:24', '2022-09-20 21:52:24'),
(12, 23, NULL, 3, NULL, '<p>Browse HuntLocals for adult classified ads for male escorts Indirapuram, gigolos, call boys &amp; gay dating ads online. Find the best individuals here available for hire!</p>', 'Male Escorts Indirapuram, Gigolo, Call Boys & Gay Dating', 'Browse HuntLocals for adult classified ads for male escorts Indirapuram, gigolos, call boys & gay dating ads online. Find the best individuals here available for hire!', '2022-10-09 19:39:02', '2022-10-09 23:39:02'),
(13, 14, NULL, 3, NULL, '<p>Browse HuntLocals to find sexy women seeking men in Indirapuram ads for free. Find largest collection of women seeking men ads here for free!</p>', 'Find Women Seeking Men in Indirapuram Ads for Free', 'Browse HuntLocals to find sexy women seeking men in Indirapuram ads for free. Find largest collection of women seeking men ads here for free!', '2022-10-09 19:40:02', '2022-10-09 23:40:02'),
(14, 19, NULL, 3, NULL, '<p>Shemale escorts Indirapuram, ts dating, transsexuals &amp; ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!</p>', 'Shemale Escorts Indirapuram, TS Dating & Trans Sex', 'Shemale escorts Indirapuram, ts dating, transsexuals & ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!', '2022-10-09 19:40:39', '2022-10-09 23:40:39'),
(15, 18, NULL, 3, NULL, '<p>Browse HuntLocals to find the best erotic massage spa or full body massage parlour in Indirapuram. Find largest collection of ads for massage spa near you.</p>', 'Erotic Massage Spa, Body Massage Parlour Indirapuram', 'Browse HuntLocals to find the best erotic massage spa or full body massage parlour in Indirapuram. Find largest collection of ads for massage spa near you.', '2022-10-09 19:41:17', '2022-10-09 23:41:17'),
(16, 22, NULL, 4, NULL, '<h3>Your Brilliant Stop for Call Girls in Delhi to Attaining Classic Pleasure!</h3>\r\n<p>Want to experience happiness and enjoy an erotic adventure at the purest level? The companionship of a super-naughty girl can give fully dedicated pleasure without even a need to step out of your room. Unfortunately, it isn&rsquo;t convenient to woo a girl when someone is in a metropolitan city. However, there is an easier method in the form of call girls in Delhi, whose consolidated assets can amaze anyone.</p>\r\n<p>This dedicated selection of naughty babes can ensure incredible time with extreme comfort. It doesn&rsquo;t matter if you are a traveler or living in this city for an extended time; we believe there is lust in everyone&rsquo;s mind. These call girls have a similar interest that assists in fulfilling their clients\' desires. They perform all these things with a motive to serve the community better. The independent call girls Delhi are known for keeping things discreet all the time.</p>\r\n<p>The easy-going relationship that people can make with these babes is terrific. Exploring the bodies of these charming angels behind the doors is a perfect thing that anyone shouldn&rsquo;t miss. They know how to glorify the time of others and give them what they want.</p>\r\n<p>There is a super passionate experience guaranteed in the presence of these elite-class girls. The Delhi call girls are unique babes whose ability to tackle tough challenges is pretty amazing.</p>\r\n<h3>Meet Creamy Delhi Escorts for Sensual Entertainment!</h3>\r\n<p>Are you a high-class gentleman seeking a resource for eliminating stress from life? We know you want to meet a classy babe behind closed doors with proper discretion and privacy. Our team want to suggest the escorts services Delhi whose passion can make anyone mad. Their companionship is capable of transforming all the wishes into a reality. So unleash the tiger that wants to bang the body of a naughty babe hard.</p>\r\n<p>One thing that we really liked about these passionate babes is their positive personalities. It can be extremely useful for fulfilling the nasty desires everyone has. You will find these independent escorts services Delhi are upgraded with the latest assets and accents you can hardly find anywhere else. A single session with these angels is enough to know what your girlfriend or wife lacks. They can help you learn something new that you can use with your partner.</p>\r\n<p>They always stay ready for all types of situations and try to do things that escort girls Delhi usually deny. When you choose to meet these women, the choices are endless for sure. No matter what kind of fantasy revolves in your mind, it will indeed be fulfilled in style. Their efficient performance is something that most people can only think of in dreams.</p>\r\n<h3>Grab Your Chance to Seduce Real Delhi Escorts!</h3>\r\n<p>We all know how hot Delhi escort girls are. It is the dream of almost every individual to bang such a lady at least once in their life. We understand most people who have arrived here want to experience it. It doesn&rsquo;t matter if someone wishes to give her an erotic banging or wants to enjoy a luxury dinner in their favorite restaurant, these babes can help to make it happen.</p>\r\n<p>There is proper freedom provided by these Ahmedabad escorts to try anything they want. Their incredible performance is definitely beyond what most people expected. Allow these charismatic babes to try to eliminate negativity from each of their clients.</p>\r\n<p>Invade the bodies of these girls by trying various positions with these babes. We guarantee you won&rsquo;t regret any moment spent in their companionship. You will come back to meet these <a href=\"https://escortsear.ch/call-girls/delhi\">passionate Delhi call girls</a> for sure.</p>', 'Call Girls Delhi, Escorts Services Delhi', 'Browse Huntlocals for erotic call girls in Delhi offering independent escorts services in Delhi for VIP individuals! Find largest collection of call girls classified ads to fulfill your sexual urge.!', '2023-01-07 08:48:44', '2023-01-07 13:48:44'),
(17, 23, NULL, 4, NULL, '<p>Browse HuntLocals for adult classified ads for male escorts Delhi, gigolos, call boys &amp; gay dating ads online. Find the best individuals here available for hire!</p>', 'Male Escorts Delhi, Gigolo, Call Boys & Gay Dating', 'Browse HuntLocals for adult classified ads for male escorts Delhi, gigolos, call boys & gay dating ads online. Find the best individuals here available for hire!', '2022-10-09 19:39:21', '2022-10-09 23:39:21'),
(18, 14, NULL, 4, NULL, '<p>Browse HuntLocals to find sexy women seeking men in Delhi ads for free. Find largest collection of women seeking men ads here for free!</p>', 'Find Women Seeking Men in Delhi Ads for Free', 'Browse HuntLocals to find sexy women seeking men in Delhi ads for free. Find largest collection of women seeking men ads here for free!', '2022-10-09 19:40:17', '2022-10-09 23:40:17'),
(19, 19, NULL, 4, NULL, '<p>Shemale escorts Delhi, ts dating, transsexuals &amp; ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!</p>', 'Shemale Escorts Delhi, TS Dating & Trans Sex', 'Shemale escorts Delhi, ts dating, transsexuals & ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!', '2022-10-09 19:40:56', '2022-10-09 23:40:56'),
(20, 18, NULL, 4, NULL, '<p>Browse HuntLocals to find the best erotic massage spa or full body massage parlour in Delhi. Find largest collection of ads for massage spa near you.</p>', 'Erotic Massage Spa, Body Massage Parlour Delhi', 'Browse HuntLocals to find the best erotic massage spa or full body massage parlour in Delhi. Find largest collection of ads for massage spa near you.', '2022-10-09 19:41:31', '2022-10-09 23:41:31'),
(21, 22, NULL, 5, NULL, '<h3><span lang=\"EN\">How Hiring New Delhi Escorts can Turn Out to be a Positive Thing for Anyone!</span></h3>\r\n<p><span lang=\"EN\">The Indian escort industry is reaching new heights due to the presence of many professional escorts. Now, it is quite easy for anyone to seek sensual escorts without any complications. </span><span lang=\"EN\">A prime location like New Delhi is a good choice for seeking female escorts and other sex partners for sex. There is a plethora of New Delhi escorts available for men to plan out their desired sexual adventures.</span></p>\r\n<p><span lang=\"EN\">In the technology world, everything is accessible with a click of a few buttons. Similar is the case when it comes to hiring hot female escorts in New Delhi for sexual pleasure. </span><span lang=\"EN\">Indeed, it is a positive thing in the escort world as qualified escorts are accessible in no time. Online escort services and free adult dating ad sites are present online to hire escorts in the capital city. </span></p>\r\n<p><span lang=\"EN\">You won&rsquo;t believe, you would get a boom in your self-confidence while connecting with such female escorts. There are certain benefits that you would get while accompanying these girls. Here are some advantages that you would enjoy with New Delhi escorts:</span></p>\r\n<h3><span lang=\"EN\">Unimaginable Sensual and Emotional Satisfaction</span></h3>\r\n<p><span lang=\"EN\">Men can enjoy sex with any girl they know but it would not amount to something memorable. However, to gain memorable sexual enjoyment, they need to mingle with professional call girls in New Delhi. </span><span lang=\"EN\">And for hiring such escorts, one just needs to consult online escort services and adult ad classified directories. It will help them gain the sensual company of hot girls in the city without any difficulty.</span></p>\r\n<p><span lang=\"EN\">Professional New Delhi escorts are fully trained in yielding the best sensual and emotional satisfaction for clients. Clients can try their favorite sexual acts without experiencing any difficulty. </span></p>\r\n<h3><span lang=\"EN\">Boom in the Overall Sexual Confidence&nbsp;</span></h3>\r\n<p><span lang=\"EN\">Oftentimes, people develop wrong perceptions about sex and themselves. Basically, it happens due to the inadequacy of their sex partners. This is what leads to a decline in the overall sexual confidence of most men. </span><span lang=\"EN\">Enjoying sex with professional escorts could help men try their favorite sexual acts. And it helps them gain more confidence during sex. New Delhi call girls handle things in a comfortable way and they try to make their clients satisfied in every possible manner. </span></p>\r\n<h3><span lang=\"EN\">Relieves Stress and Anxiety</span></h3>\r\n<p><span lang=\"EN\">Stress and anxiety have become a part of everyone&rsquo;s life in today&rsquo;s time. That&rsquo;s why everyone needs good companionship to relieve stress and experience calmness.</span><span lang=\"EN\">Quality sex releases happy hormones in the body and it results in keeping a person happy. And it is only possible if one chooses to have sex with experienced New Delhi escorts. </span></p>\r\n<p><span lang=\"EN\">Thus, sex can acts as a great stress buster for anyone looking for calmness in one&rsquo;s daily life. Professional escorts can go any limit to keep their clients sexually pleased in bed and leave them in a peaceful state of mind.</span><span lang=\"EN\">&nbsp;</span></p>\r\n<h3><span lang=\"EN\">Enjoyment of a Private Service </span></h3>\r\n<p><span lang=\"EN\">The most important benefit of choosing professional escorts in New Delhi is the discreet service they provide to clients. Escort services train escorts professionally due to which clients get to enjoy professional etiquette behavior in the companionship of escorts in the city.</span><span lang=\"EN\">&nbsp;</span></p>\r\n<h3><span lang=\"EN\">No Restrictions During Sexual Acts</span></h3>\r\n<p><span lang=\"EN\">Normally, sexual frustration arises in anyone&rsquo;s life when a person fails to perform his desired sexual acts in bed. Sex plays a vital role in ensuring the overall happiness of a person. </span><span lang=\"EN\">So, it is necessary for men to feel sexually satisfied at any cost. This is where professional escorts come in handy to ensure top-notch sexual services for men. </span></p>\r\n<p><span lang=\"EN\">Hiring highly efficient and sensual New Delhi escorts is no big deal for anyone. However, the best option to consult in this case is a free online adult dating ad site. </span><span lang=\"EN\">HuntLocals would be an optimal option in this context for hiring hot call girls in New Delhi. It gives countless options for anyone to choose any type of escort for sensual fun. </span></p>\r\n<h4><span lang=\"EN\">Conclusion</span><span lang=\"EN\">&nbsp;</span></h4>\r\n<p><span lang=\"EN\">Finally, we must say that New Delhi is a promising state for anyone to hire escorts for sex. If you are in this Indian state for any reason, you can easily enjoy the company of a hot female escort quite easily.</span></p>\r\n<p><span lang=\"EN\">We advise you to hire New Delhi escorts to lead a great sexual experience full of erotic adventures. It would certainly help you gain a deep insight into your sex life. And it would eventually improve the level of your sexuall satisfaction in many possible ways.</span></p>', 'Call Girls New Delhi, Escorts Services New Delhi', 'Browse Huntlocals for erotic call girls in New Delhi offering independent escorts services in New Delhi for VIP individuals! Find largest collection of call girls classified ads to fulfill your sexual urge.!', '2023-01-07 00:19:31', '2023-01-07 05:19:31'),
(22, 23, NULL, 5, NULL, '<p>Browse HuntLocals for adult classified ads for male escorts New Delhi, gigolos, call boys &amp; gay dating ads online. Find the best individuals here available for hire!</p>', 'Male Escorts New Delhi, Gigolo, Call Boys & Gay Dating', 'Browse HuntLocals for adult classified ads for male escorts New Delhi, gigolos, call boys & gay dating ads online. Find the best individuals here available for hire!', '2022-12-29 20:31:33', '2022-12-30 01:31:33'),
(23, 14, NULL, 5, NULL, '<p>Browse HuntLocals to find sexy women seeking men in New Delhi ads for free. Find largest collection of women seeking men ads here for free!</p>', 'Find Women Seeking Men in New Delhi Ads for Free', 'Browse HuntLocals to find sexy women seeking men in New Delhi ads for free. Find largest collection of women seeking men ads here for free!', '2022-12-29 20:32:05', '2022-12-30 01:32:05'),
(24, 19, NULL, 5, NULL, '<p>Shemale escorts New Delhi, ts dating, transsexuals &amp; ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!</p>', 'Shemale Escorts New Delhi, TS Dating & Trans Sex', 'Shemale escorts New Delhi, ts dating, transsexuals & ladyboys available on HuntLocals. Choose from largest collection of shemale ads this adult classified site!', '2022-12-29 20:32:37', '2022-12-30 01:32:37'),
(25, 18, NULL, 5, NULL, '<p>Browse HuntLocals to find the best erotic massage spa or full body massage parlour in New Delhi. Find largest collection of ads for massage spa near you.</p>', 'Erotic Massage Spa, Body Massage Parlour New Delhi', 'Browse HuntLocals to find the best erotic massage spa or full body massage parlour in New Delhi. Find largest collection of ads for massage spa near you.', '2022-12-29 20:33:05', '2022-12-30 01:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `location_slug` varchar(150) DEFAULT NULL,
  `published` smallint(6) DEFAULT NULL,
  `featured` smallint(6) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`id`, `parent`, `location`, `location_slug`, `published`, `featured`, `sort_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Uttar Pradesh', 'uttar-pradesh', NULL, NULL, NULL, '2022-09-19 22:11:07', '2022-09-19 22:11:07'),
(2, 1, 'Ghaziabad', 'ghaziabad', NULL, 1, NULL, '2022-09-19 22:11:16', '2022-09-19 22:11:23'),
(3, 1, 'Indirapuram', 'indirapuram', NULL, NULL, NULL, '2022-09-20 21:49:57', '2022-09-20 21:49:57'),
(4, 5, 'Delhi', 'delhi', NULL, 1, NULL, '2022-10-09 23:32:27', '2022-12-30 01:25:56'),
(5, NULL, 'New Delhi', 'new-delhi', NULL, NULL, NULL, '2022-12-30 01:25:49', '2022-12-30 01:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(100) DEFAULT NULL,
  `page_slug` varchar(100) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `page_description` text DEFAULT NULL,
  `isActive` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `page_name`, `page_slug`, `meta_title`, `meta_description`, `page_description`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 'Terms and Conditions', 'terms-and-conditions', 'Terms and Conditions', '', NULL, 1, '2022-09-19 15:33:35', '2022-02-02 18:24:53'),
(4, 'Home', 'home', 'Adult Dating & Erotic Classified Ads Directory India', 'Browse HuntLocals for free adult classified ad for dating and sex services in India. You can post and browse adult classified ads for free to fulfill your sexual urge.!', '', 1, '2022-09-19 17:57:32', '2022-04-24 03:34:17'),
(5, 'Signup', 'signup', 'Signup', 'Signup', NULL, 1, '2022-09-19 15:33:35', '2022-04-24 03:39:33'),
(6, 'Login', 'login', 'Login', 'Login', NULL, 1, '2022-09-19 15:33:35', '2022-04-24 03:40:53'),
(7, 'Privacy Policy', 'privacy-policy', NULL, NULL, NULL, 1, '2022-09-19 15:33:35', '2022-04-28 10:14:36'),
(9, 'Contact Us', 'contact-us', NULL, NULL, NULL, 1, '2022-09-19 15:33:35', '2022-04-28 10:19:08'),
(11, 'Blog', 'blog', 'Blogs', 'Blogs', NULL, 1, '2022-09-19 15:33:35', '2022-06-23 09:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `post_name` varchar(100) DEFAULT NULL,
  `post_slug` varchar(100) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `isActive` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `post_name`, `post_slug`, `meta_title`, `meta_description`, `post_description`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Add Page sad asd aaaf DSAF SADsa dsad sad sadsa', 'add-page-sad-asd-aaaf-dsaf-sadsa-dsad-sad-sadsa', '111111111111111111', '222222222222222222222222', '<p>333333333333333333333333333333333333333&nbsp; 33333333333333333333333</p>', 1, '2022-05-31 04:12:44', '2022-05-31 04:29:15'),
(2, 'new Add Page sad asd aaaf DSAF SAD sad sad sad sadsa', 'new-add-page-sad-asd-aaaf-dsaf-sad-sad-sad-sad-sadsa', 'new Add Page sad asd aaaf DSAF SAD sad sad sad sadsa  vdf dgfd g', 'ds gdsg dsg dsg ds', '<p>new Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew A</p>\r\n<p>dd Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF</p>\r\n<p>SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd</p>\r\n<p>aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad</p>\r\n<p>sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Pa</p>\r\n<p>ge sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsanew Add Page sad asd aaaf DSAF SAD sad sad sad sadsa</p>', 1, '2022-06-23 08:45:22', '2022-06-23 09:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isActive` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `fname`, `lname`, `email_address`, `password`, `isActive`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Munirka4u@gmail.com', '$2y$10$axvZSwMSMXznLPuKeiN9Hezc1qWiew5PZgNpIeyH76Aqv3bMXPYim', 0, '2022-12-22 07:24:00', '2022-12-22 07:24:00'),
(2, NULL, NULL, 'Delhi24hrs@gmail.com', '$2y$10$RjmYAg9Jv6e.IboXohHw1O9/cbnHLtdHtMKlEhnPQYJ9uVeLz2Avu', NULL, '2022-12-22 07:31:56', '2022-12-22 07:31:56'),
(3, NULL, NULL, 'dating4u100@gmail.com', '$2y$10$/ziS0ZFNl/qb.iiF1bg66O5sSSA9zpHnIBSRMzyk8TotyYBqslq6S', 0, '2022-12-31 09:53:58', '2022-12-31 09:53:58'),
(4, NULL, NULL, 'dating4u200@gmail.com', '$2y$10$tdSZySW7FTqF8nMXoYQR/.bkJO4BDlrm5xf9Ivy/bCghZWeTZOHx.', NULL, '2022-12-31 09:57:41', '2022-12-31 09:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserads`
--

CREATE TABLE `tbluserads` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `title_slug` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `user_age` smallint(6) DEFAULT NULL,
  `whatsapp_active` smallint(6) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(150) DEFAULT NULL,
  `isActive` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluserads`
--

INSERT INTO `tbluserads` (`id`, `userid`, `category_id`, `region_id`, `location_id`, `title`, `title_slug`, `description`, `email`, `phone`, `user_age`, `whatsapp_active`, `zip_code`, `area`, `address`, `meta_title`, `meta_description`, `isActive`, `created_at`, `updated_at`) VALUES
(5088, 2, 14, 1, 4, 'Low Rate Call Girls In Delhi. Call Us | 9999102842', 'es225088', '<div id=\"js-user_content\" class=\"user_content\">Call Us - 9999102842, Call Girls in Delhi - We brings model Call girl whatsapp number our agency offers by oyo hotel book them now. The High class escort service in delhi accessible 24 hours. We are one of the leading our escort Agencies services. you will find that female escorts are full of Fun, sexy and they would love enjoy your company. we have a fantastic selection of escort ladies available for in-call as well as out-call. our escorts are not only beautiful but all have great personalities making them the perfect companion for any occasion.<br><br>We offer all types of girls of your choice with space. Our escorts are fully cooperative and understand your needs. All types of call girls like Housewives, College girls, Russian girls, Muslim girls, Afghani girls, Bengali girls, Working girls, south Indian girls, Punjabi girls, etc.<br><br>In-Call: &ndash; You Can Reach At Our Place in Delhi Our place Which Is Very Clean Hygienic 100% safe Accommodation.<br><br>Out-Call: &ndash; Service for Out Call You have To Come Pick The Girl From My Place We Also Provide Door Step Services<br><br>Note: &ndash; Pic Collectors Time Passers Bargainers Stay Away As We Respect The Value For Your Money Time And Expect The Same From You<br><br>Hygienic: &ndash; Full Ac Neat And Clean Rooms Available In Hotel 24 * 7 Hrs In Delhi Ncr<br><br>Our Services and Rates: &ndash;<br><br>One Shot &ndash; 2000/in call (time &frac12; hour), 5000/out call<br><br>Two shot with one girl &ndash; 3500/in call (time 1 hour), 6000/out call<br><br>Body to body massage with sex- 3000/in call (time 1 hour)<br><br>full night for one person&ndash; 7000/in call, 10000/out call (shot limit 4 shot)<br><br>full night for more than 1 person &ndash; please contact Us &ndash; 9999102842<br><br>Location &ndash; Malviya Nagar, Saket, Hauz Khas, Near Metro Station<br><br>We are available 24*7 all days of the year<br><br>Call us &ndash; 9999102842!! Thank you for Visiting.</div>\r\n<div class=\"vap__buttons_container\">&nbsp;</div>', 'Delhi24hrs@gmail.com', '9999102842', 23, 1, '110001', 'New Delhi', 'Saket', NULL, NULL, 1, '2022-12-22 07:31:56', '2022-12-22 12:31:56'),
(5089, 4, 14, 5, 4, 'Call Girls In Connaught Place 9582303131 Call Girls In Delhi', 'es225089', '<p>Delhi Call Girls WhatsApp Number, 9582303131&nbsp;offer both In and Out Call Escorts Service facilities in all over Delhi. We&rsquo;ve expert call girls models from all categories who specializes in Satisfy you every way. Our Delhi Escorts agency have more than fully trained Girls to serve across New Delhi, Delhi areas. Book your desired girl in Delhi<br><br>We Are One Of The Oldest Escort and Call girls Agencies in Delhi. You Will Find That Our Female Escorts Are Full Of Fun, Sexy And They Would Love Enjoy Your Company. We Have A Fantastic Selection Of Escort Ladies Available For In-Calls As Well As Out-Calls. Our Escorts Are Not Only Beautiful But All Have Great Personalities Making Them The Perfect Companion For Any Occasion.<br><br>In-Call: &ndash; You Can Reach At Our Place in Delhi Our place Which Is Very Clean Hygienic 100% safe Accommodation.<br><br>Out-Call: &ndash; Service For Out Call You have To Come Pick The Girl From My Place We Also Provide Door Step Services<br><br>Note: &ndash; Pic Collectors Time Passers Bargainers Stay Away As We Respect The Value For Your Money Time And Expect The Same From You<br><br>Hygienic: &ndash; Full Ac Neat And Clean Rooms Available In Hotel 24 * 7 Hrs In Delhi Ncr<br><br>We Are Providing<br><br>: &ndash; House Wife&rsquo;s<br><br>: &ndash; Private Independent House Wife&rsquo;s<br><br>: &ndash; Private Independent Collage Going Girls<br><br>: &ndash; Corporate MNC Working Profiles<br><br>: &ndash; Call Center Girls<br><br>: &ndash; Live Band Girls<br><br>: &ndash; Foreigners Many More<br><br>: &ndash; Independent Models<br><br>Our Services and Rates: &ndash;<br><br>: &ndash; One Shot &ndash; 2000/in call (time &frac12; hour), 5000/out call<br><br>: &ndash; Two shot with one girl &ndash; 3500/in call (time 1 hour), 6000/out call<br><br>: &ndash; Body to body massage with sex- 3000/in call (time 1 hour)<br><br>: &ndash; full night for one person&ndash; 7000/in call, 10000/out call (shot limit 4 shot)<br><br>full night for more than 1 person &ndash; please contact Us &ndash; 9582303131<br><br>We are available 24*7 all days of the year<br><br>Call us &ndash; 9582303131 Thank you for Visiting.</p>', 'dating4u200@gmail.com', '9582303131 ', 22, 1, '110001', 'Delhi', 'Connaught Place, Delhi', NULL, NULL, 1, '2022-12-31 09:57:41', '2022-12-31 14:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladsgallery`
--
ALTER TABLE `tbladsgallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tbladsgallery` (`adid`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcatlocseo`
--
ALTER TABLE `tblcatlocseo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluserads`
--
ALTER TABLE `tbluserads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbladsgallery`
--
ALTER TABLE `tbladsgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblcatlocseo`
--
ALTER TABLE `tblcatlocseo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluserads`
--
ALTER TABLE `tbluserads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5090;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbladsgallery`
--
ALTER TABLE `tbladsgallery`
  ADD CONSTRAINT `FK_tbladsgallery` FOREIGN KEY (`adid`) REFERENCES `tbluserads` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
