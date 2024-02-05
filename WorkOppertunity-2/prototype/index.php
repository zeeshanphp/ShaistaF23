<?php
include 'header.php';
?>
<div class="container-fluid p-0">
    <img class="" src="img/carousel-1.jpg" height="500px" width="100%">

</div>

<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px; position:absolute; top:280px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control border-0" placeholder="Keyword" />
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0">
                            <option selected>Category</option>
                            <option value="1">Fulltime</option>
                            <option value="2">Part Time</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0">
                            <option selected>Location</option>
                            <option value="1">Remote</option>
                            <option value="2">Online</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100">Search</button>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>