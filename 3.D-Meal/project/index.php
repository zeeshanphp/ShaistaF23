<?php
session_start();
include 'header.php';
?>
<section class="py-5 overflow-hidden bg-warning" id="home">
    <div class="container">
        <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="#!"><img class="img-fluid" src="assets/img/gallery/hero-header.png" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Are you starving?</h1>
                <h1 class="text-800 mb-5 fs-4">Within a few clicks, find meals that<br class="d-none d-xxl-block" />are accessible near you</h1>
                <div class="card w-xxl-75">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Delivery</button>
                                <button class="nav-link mb-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-shopping-bag me-2"></i>Pickup</button>
                            </div>
                        </nav>
                        <div class="tab-content mt-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="row gx-2 gy-2 align-items-center">
                                    <div class="col">
                                        <div class="input-group-icon"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                            <label class="visually-hidden" for="inputDelivery">Address</label>
                                            <input class="form-control input-box form-foodwagon-control" id="inputDelivery" type="text" placeholder="Enter Your Address" />
                                        </div>
                                    </div>
                                    <div class="d-grid gap-3 col-sm-auto">
                                        <button class="btn btn-danger" type="submit">Find Food</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form class="row gx-4 gy-2 align-items-center">
                                    <div class="col">
                                        <div class="input-group-icon"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                            <label class="visually-hidden" for="inputPickup">Address</label>
                                            <input class="form-control input-box form-foodwagon-control" id="inputPickup" type="text" placeholder="Enter Your Address" />
                                        </div>
                                    </div>
                                    <div class="d-grid gap-3 col-sm-auto">
                                        <button class="btn btn-danger" type="submit">Find Food</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-0 bg-primary-gradient">

    <div class="container">
        <div class="row justify-content-center g-0">
            <div class="col-xl-9">
                <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                    <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">How does it work</h5>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/location.png" height="112" alt="..." />
                            <h5 class="mt-4 fw-bold">Select location</h5>
                            <p class="mb-md-0">Choose the location where your food will be delivered.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/order.png" height="112" alt="..." />
                            <h5 class="mt-4 fw-bold">Choose order</h5>
                            <p class="mb-md-0">Check over hundreds of menus to pick your favorite food</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/pay.png" height="112" alt="..." />
                            <h5 class="mt-4 fw-bold">Pay advanced</h5>
                            <p class="mb-md-0">It's quick, safe, and simple. Select several methods of payment</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/meals.png" height="112" alt="..." />
                            <h5 class="mt-4 fw-bold">Enjoy meals</h5>
                            <p class="mb-md-0">Food is made and delivered directly to your home.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<section class="py-4 overflow-hidden">

    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Popular items</h5>
            </div>
            <div class="col-12">
                <div class="carousel slide" id="carouselPopularItems" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="row gx-3 h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/cheese-burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Cheese Burger</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Burger Arena</span></div><span class="text-1000 fw-bold">$3.88</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/toffes-cake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Toffe's Cake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Top Sticks</span></div><span class="text-1000 fw-bold">$4.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/dancake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Dancake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Cake World</span></div><span class="text-1000 fw-bold">$1.99</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/crispy-sandwitch.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Crispy Sandwitch</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Fastfood Dine</span></div><span class="text-1000 fw-bold">$3.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/thai-soup.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Thai Soup</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Foody Man</span></div><span class="text-1000 fw-bold">$2.79</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <div class="row gx-3 h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/cheese-burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Cheese Burger</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Burger Arena</span></div><span class="text-1000 fw-bold">$3.88</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/toffes-cake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Toffe's Cake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Top Sticks</span></div><span class="text-1000 fw-bold">$4.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/dancake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Dancake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Cake World</span></div><span class="text-1000 fw-bold">$1.99</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/crispy-sandwitch.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Crispy Sandwitch</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Fastfood Dine</span></div><span class="text-1000 fw-bold">$3.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/thai-soup.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Thai Soup</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Foody Man</span></div><span class="text-1000 fw-bold">$2.79</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <div class="row gx-3 h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/cheese-burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Cheese Burger</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Burger Arena</span></div><span class="text-1000 fw-bold">$3.88</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/toffes-cake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Toffe's Cake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Top Sticks</span></div><span class="text-1000 fw-bold">$4.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/dancake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Dancake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Cake World</span></div><span class="text-1000 fw-bold">$1.99</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/crispy-sandwitch.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Crispy Sandwitch</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Fastfood Dine</span></div><span class="text-1000 fw-bold">$3.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/thai-soup.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Thai Soup</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Foody Man</span></div><span class="text-1000 fw-bold">$2.79</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row gx-3 h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/cheese-burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Cheese Burger</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Burger Arena</span></div><span class="text-1000 fw-bold">$3.88</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/toffes-cake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Toffe's Cake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Top Sticks</span></div><span class="text-1000 fw-bold">$4.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/dancake.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Dancake</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Cake World</span></div><span class="text-1000 fw-bold">$1.99</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/crispy-sandwitch.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Crispy Sandwitch</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Fastfood Dine</span></div><span class="text-1000 fw-bold">$3.00</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/thai-soup.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="fw-bold text-1000 text-truncate mb-1">Thai Soup</h5>
                                            <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Foody Man</span></div><span class="text-1000 fw-bold">$2.79</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="prev"><span class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="next"><span class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>

<section class="overflow-hidden" style="margin: 0px; padding:0px;">

    <div class="container">
        <div class="row flex-center">
            <div class="col-lg-7">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm text-center text-lg-start">Search by Food</h5>
            </div>
            <div class="col-lg-4 text-lg-end text-center"><a class="btn btn-lg text-800 me-2" href="#" role="button">VIEW ALL <i class="fas fa-chevron-right ms-2"></i></a></div>
            <div class="col-lg-auto position-relative">
                <button class="carousel-control-prev s-icon-prev carousel-icon" type="button" data-bs-target="#carouselSearchByFood" data-bs-slide="prev"><span class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                <button class="carousel-control-next s-icon-next carousel-icon" type="button" data-bs-target="#carouselSearchByFood" data-bs-slide="next"><span class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
            </div>
        </div>
        <div class="row flex-center">
            <div class="col-12">
                <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/search-pizza.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/noodles.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/sub-sandwich.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/chowmein.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/steak.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/search-pizza.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/noodles.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/sub-sandwich.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/chowmein.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/steak.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/search-pizza.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/noodles.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/sub-sandwich.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/chowmein.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/steak.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/search-pizza.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/burger.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/noodles.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/sub-sandwich.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/chowmein.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img class="img-fluid rounded-circle h-100" src="assets/img/gallery/steak.png" alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<section class="py-0">
    <div class="bg-holder" style="background-image:url(assets/img/gallery/cta-two-bg.png);background-position:center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row flex-center">
            <div class="col-xxl-9 py-7 text-center">
                <h1 class="fw-bold mb-4 text-white fs-6">Are you ready to order <br />with the best deals? </h1><a class="btn btn-danger" href="#"> PROCEED TO ORDER<i class="fas fa-chevron-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>