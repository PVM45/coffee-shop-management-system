<?php require_once "includes/header.php"; ?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Our Menu</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="index.php">Home</a></span>
            <span>Menu</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/info.php'; ?>

<section class="ftco-menu mb-5 pb-5">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Our Products</h2>
        <p>
          Crafted with care beyond the noise of the city, far from fleeting trends and empty flavors, our coffee tells a quiet story of warmth, comfort, and honest ingredients.
        </p>
      </div>
    </div>
    <div class="row d-md-flex">
      <div class="col-lg-12 ftco-animate p-md-5">
        <div class="row">
          <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Coffee</a>

              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>

              <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-3" aria-selected="false">Main Dish</a>
            </div>
          </div>
          <div class="col-md-12 d-flex align-items-center">
            <div class="tab-content ftco-animate" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                <div class="row">
                  <?php
                  // fetching coffee
                  $query2 = "SELECT * FROM products where type='coffee'";
                  $drinks = mysqli_query($conn, $query2) or die("Query Unsuccessful");

                  if (mysqli_num_rows($drinks) > 0) {
                    while ($drink = mysqli_fetch_assoc($drinks)) {
                  ?>
                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <a href="products/product-single.php?id=<?php echo $drink['id']; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $drink['image']; ?>)"></a>
                          <div class="text">
                            <h3><a href="products/product-single.php?id=<?php echo $drink['id']; ?>"><?php echo $drink['name']; ?></a></h3>
                            <p>
                              <?php echo $drink['description']; ?>
                            </p>
                            <p class="price"><span>RP.<?php echo $drink['price']; ?></span></p>
                            <p>
                              <a href="products/product-single.php?id=<?php echo $drink['id']; ?>" class="btn btn-primary btn-outline-primary">Show</a>
                            </p>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
              </div>

              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                <div class="row">
                  <?php
                  // fetching drinks
                  $query2 = "SELECT * FROM products where type='drink'";
                  $drinks = mysqli_query($conn, $query2) or die("Query Unsuccessful");

                  if (mysqli_num_rows($drinks) > 0) {
                    while ($drink = mysqli_fetch_assoc($drinks)) {
                  ?>
                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <a href="products/product-single.php?id=<?php echo $drink['id']; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $drink['image']; ?>)"></a>
                          <div class="text">
                            <h3><a href="products/product-single.php?id=<?php echo $drink['id']; ?>"><?php echo $drink['name']; ?></a></h3>
                            <p>
                              <?php echo $drink['description']; ?>
                            </p>
                            <p class="price"><span>RP.<?php echo $drink['price']; ?></span></p>
                            <p>
                              <a href="products/product-single.php?id=<?php echo $drink['id']; ?>" class="btn btn-primary btn-outline-primary">Show</a>
                            </p>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
              </div>

              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                <div class="row">
                  <?php
                  // fetching desserts
                  $query1 = "SELECT * FROM products where type='dessert'";
                  $desserts = mysqli_query($conn, $query1) or die("Query Unsuccessful");

                  if (mysqli_num_rows($desserts) > 0) {
                    while ($dessert = mysqli_fetch_assoc($desserts)) {
                  ?>
                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <a href="products/product-single.php?id=<?php echo $dessert['id']; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $dessert['image']; ?>)"></a>
                          <div class="text">
                            <h3><a href="products/product-single.php?id=<?php echo $dessert['id']; ?>"><?php echo $dessert['name']; ?></a></h3>
                            <p>
                              <?php echo $dessert['description']; ?>
                            </p>
                            <p class="price"><span>RP.<?php echo $dessert['price']; ?></span></p>
                            <p>
                              <a href="products/product-single.php?id=<?php echo $dessert['id']; ?>" class="btn btn-primary btn-outline-primary">Show</a>
                            </p>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
              </div>

              <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                <div class="row">
                  <?php
                  // fetching main dish
                  $query1 = "SELECT * FROM products where type='main dish'";
                  $desserts = mysqli_query($conn, $query1) or die("Query Unsuccessful");

                  if (mysqli_num_rows($desserts) > 0) {
                    while ($dessert = mysqli_fetch_assoc($desserts)) {
                  ?>
                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <a href="products/product-single.php?id=<?php echo $dessert['id']; ?>" class="menu-img img mb-4" style="background-image: url(images/<?php echo $dessert['image']; ?>)"></a>
                          <div class="text">
                            <h3><a href="products/product-single.php?id=<?php echo $dessert['id']; ?>"><?php echo $dessert['name']; ?></a></h3>
                            <p>
                              <?php echo $dessert['description']; ?>
                            </p>
                            <p class="price"><span>RP.<?php echo $dessert['price']; ?></span></p>
                            <p>
                              <a href="products/product-single.php?id=<?php echo $dessert['id']; ?>" class="btn btn-primary btn-outline-primary">Show</a>
                            </p>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  const bookTableForm = document.querySelector(".appointment-form");

  // input fields
  const firstName = document.querySelector("#first_name");
  const date = document.querySelector("#date");
  const time = document.querySelector("#time");
  const phone = document.querySelector("#phone");

  // form authentication
  bookTableForm.addEventListener("submit", (e) => {
    if (firstName.value === "" || date.value === "" || time.value === "" || phone.value === "") {
      e.preventDefault();
      alert("Please fill all the Mandatory details !!");
    }
  })
</script>

<?php require_once "includes/footer.php"; ?>