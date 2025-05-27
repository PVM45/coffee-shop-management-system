<?php require_once "../includes/header.php"; ?>

<?php

function generateOrderCode($length = 8) {
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $charactersLength = strlen($characters);
  $randomCode = '';
  for ($i = 0; $i < $length; $i++) {
    $randomCode .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomCode;
}

// if user logged in trying to directly access checkout page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
  echo "<script>window.location.href = '../index.php'</script>";
  exit();
}

// if user not logged in
// denied to access cart page
if (isset($_POST['submit'])) {
  $user_id = $_SESSION['user_id'];
  $status = "pending";
  $total_price = $_SESSION['total_price'];
  $order_code = generateOrderCode();

  // query insert
  $query = "INSERT INTO orders (user_id, order_code, total_price, status) 
            VALUES ('{$user_id}', '{$order_code}', '{$total_price}', '{$status}')";
  mysqli_query($conn, $query) or die("Query Unsuccessful");

        echo "<script>
        window.location.href = '../users/orders.php?code={$order_code}';
      </script>";

}

?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(<?php echo url; ?>/images/bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Checkout</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="<?php echo url; ?>/index.php">Home</a></span>
            <span>Checkout</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <form action="checkout.php" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
          <h3 class="mb-4">Confirm Your Order</h3>
          <p>Total: <strong>Rp <?php echo $_SESSION['total_price']; ?></strong></p>
          <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Place Order</button>
        </form>
      </div>
      <!-- .col-md-8 -->
    </div>
  </div>
</section>
<!-- .section -->

<script>
  
</script>

<?php require_once "../includes/footer.php"; ?>