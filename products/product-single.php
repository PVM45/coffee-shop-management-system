<?php require_once "../includes/header.php"; ?>

<?php
// Step 1: Validate and sanitize product ID from URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = (int)$_GET['id'];

    // Step 2: Fetch single product data
    $query = "SELECT * FROM products WHERE id = {$productId}";
    $result = mysqli_query($conn, $query) or die("Query gagal dijalankan.");

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        die("Produk tidak ditemukan.");
    }

    // Step 3: Fetch related products with the same type but excluding current product
    $typeSafe = mysqli_real_escape_string($conn, $product['type']);
    $relatedQuery = "SELECT * FROM products WHERE type = '{$typeSafe}' AND id != {$productId} ORDER BY name ASC";
    $relatedResult = mysqli_query($conn, $relatedQuery) or die("Query produk terkait gagal.");

    // Step 4: Handle add to cart when form is submitted & user logged in
    if (isset($_POST['submit']) && isset($_SESSION['user_id'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = (int)$_POST['price'];
        $quantity = (int)$_POST['quantity'];
        $userId = (int)$_SESSION['user_id'];
        $product_id = (int)$_POST['product_id'];

        // Insert into cart
        $insertQuery = "INSERT INTO cart (name, image, price, description, quantity, product_id, user_id) VALUES (
            '{$name}', '{$image}', {$price}, '{$description}', {$quantity}, {$product_id}, {$userId}
        )";
        mysqli_query($conn, $insertQuery) or die("Gagal menambahkan produk ke keranjang.");

        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Produk berhasil ditambahkan ke keranjang.',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
} else {
    die("ID produk tidak valid.");
}
?>

<!-- Hero Section -->
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo url; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Detail Produk</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="<?php echo url; ?>/index.php">Beranda</a></span> 
                        <span>Detail Produk</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Detail Section -->
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?php echo url; ?>/images/<?php echo $product['image']; ?>" class="image-popup">
                    <img src="<?php echo url; ?>/images/<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['name']); ?>">
                </a>
            </div>
            <!-- Product Info & Add to Cart Form -->
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <p class="price"><span>Rp. <?php echo $product['price']; ?></span></p>
                <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>

                <form action="product-single.php?id=<?php echo $productId; ?>" method="post" class="mt-4">
                    <div class="row">
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="icon-minus"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" style="text-align:center;">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="icon-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>

                    <!-- Hidden inputs -->
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                    <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($product['description']); ?>">
                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">

                    <?php if (isset($_SESSION['user_id'])): ?>
												<button class="btn btn-primary py-3 px-4 cart" name="submit" type="submit" >
									Added to cart
								</button>
										<?php else: ?>
												<a href="<?php echo url; ?>/auth/login.php" class="btn btn-primary py-3 px-4 cart" name="submit" type="submit">
													Login to Add to cart
												</a>
							<?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Related Products Section -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Related Product</h2>
            </div>
        </div>
        <div class="row">
            <?php if (mysqli_num_rows($relatedResult) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($relatedResult)) : ?>
                    <div class="col-md-3">
                        <div class="menu-entry">
													<a href="product-single.php?id=<?php echo $row['id']; ?>" class="img" style="background-image: url(<?php echo url; ?>/images/<?php echo $row['image']; ?>);"></a>
												<div class="text text-center pt-4">	
													<h3><?php echo htmlspecialchars($row['name']); ?></h3>
															<p><?php echo $row['description']; ?></p>
															<p class="price"><span>Rp. <?php echo $row['price']; ?></span></p>
															<p><a href="product-single.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-outline-primary">Show</a></p>
												</div>
											</div>

                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center w-100">Tidak ada produk terkait.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require_once "../includes/footer.php"; ?>
