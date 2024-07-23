-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/07/2024 às 18:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `swiss_collection`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'oleo'),
(2, 'filtro'),
(4, 'pneus'),
(5, 'motores'),
(7, 'Adesivo'),
(8, 'Tinta');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivered_to` varchar(150) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `deliver_address` varchar(255) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivered_to`, `phone_no`, `deliver_address`, `pay_method`, `pay_status`, `order_status`, `order_date`) VALUES
(1, 2, 'Antonio', '9802234675', 'Gora-3556', 'Dinheiro', 0, 0, '2022-04-10'),
(3, 2, 'Maria joão', '980098322', 'Pedras-123', 'Pix', 1, 1, '2022-04-18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `variation_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 500),
(3, 3, 3, 1, 890);

-- --------------------------------------------------------

--
-- Estrutura para tabela `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_image`, `price`, `category_id`, `uploaded_date`) VALUES
(2, 'check-up ', 'check-up total do carro', './uploads/revisao.jpg', 890, 5, '2022-04-04'),
(5, 'envelopamento', 'adesivo no carro', './uploads/envelopamento-automotivo-scaled.jpg', 1850, 7, '2022-04-04'),
(9, 'Troca de oleo', 'Bem didáticos', './uploads/tocar de olheo.jpg', 100, 1, '2024-07-22'),
(10, 'Pintura', 'Mudar cor do carro', './uploads/pintura-de-carro.jpg', 200, 8, '2024-07-22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_size_variation`
--

CREATE TABLE `product_size_variation` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `product_size_variation`
--

INSERT INTO `product_size_variation` (`variation_id`, `product_id`, `size_id`, `quantity_in_stock`) VALUES
(1, 1, 4, 5),
(2, 2, 3, 9),
(3, 9, 2, 3),
(6, 3, 3, 6),
(7, 4, 2, 8),
(8, 5, 4, 8),
(9, 6, 2, 10),
(10, 7, 2, 10),
(11, 8, 1, 8),
(12, 1, 1, 1),
(13, 10, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `product_id`, `review_desc`) VALUES
(1, 2, 2, 'Comfortable and stylish. I loved it.'),
(2, 2, 5, 'Perfect dress for summer.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`) VALUES
(1, 'Esportivos'),
(2, 'Automatico'),
(3, 'Manual'),
(4, 'Populares');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact_no`, `registered_at`, `isAdmin`, `user_address`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$j9OXXIYS0CG5AYuks62YMeDvuIpo2hZEN4CqfJfujt1yPMnoUq5C6', '9810283472', '2022-04-10', 1, 'newroad'),
(2, 'Test ', 'Firstuser', 'test@gmail.com', '$2y$10$DJOdhZy1InHTKQO6whfyJexVTZCDTlmIYGCXQiPTv7l82AdC9bWHO', '980098322', '2022-04-10', 0, 'matepani-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `uc_cart` (`user_id`,`variation_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Índices de tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Índices de tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Índices de tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices de tabela `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD UNIQUE KEY `uc_ps` (`product_id`,`size_id`);

--
-- Índices de tabela `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices de tabela `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices de tabela `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD UNIQUE KEY `uc_wish` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `product_size_variation`
--
ALTER TABLE `product_size_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Restrições para tabelas `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Restrições para tabelas `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Restrições para tabelas `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Restrições para tabelas `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Restrições para tabelas `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
