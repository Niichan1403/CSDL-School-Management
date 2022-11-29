<?php
include('inc/top.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <?php include('inc/navbar.php'); ?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4">
            <h3 class="text-secondary">Register Your Name</h3><hr>
            <form action="" method="post">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label text-dark">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter Your Name" name="name"
                        style="border: 1px solid black; padding-left: 5px">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label text-dark">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Enter Your Email" name="email"
                        style="border: 1px solid black; padding-left: 5px">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label text-dark">Mobile</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter Your Mobile" name="mobile"
                        style="border: 1px solid black; padding-left: 5px">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label text-dark">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter Your Address" name="address"
                        style="border: 1px solid black; padding-left: 5px">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label text-dark">Class</label>
                    <div class="col-sm-10">
                        <select name="qualification" id="" class="form-control" style="border: 1px solid black; padding-left: 5px">
                            <option value="1">Class 1</option>
                            <option value="2">Class 2</option>
                            <option value="3">Class 3</option>
                            <option value="4">Class 4</option>
                            <option value="5">Class 5</option>
                            <option value="6">Class 6</option>
                            <option value="7">Class 7</option>
                            <option value="8">Class 8</option>
                            <option value="9">Class 9</option>
                            <option value="10">Class 10</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button class="btn btn-danger" name="submit">Submit</button>
                    </div>
                </div>
            </form>    
        </div>

        <div class="col-md-5 table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>St.No</td>
                        <th>Class</th>
                        <th>Subject</td>
                        <th>Course Fee</td>
                        <th>Batch Starts</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</td>
                        <th>10/IT/ENG</th>
                        <th>1 Yrs</td>
                        <th>9999</td>
                        <th>29/11/2022</th>
                    </tr>
                    <tr>
                        <th>2</td>
                        <th>10/IT/ENG</th>
                        <th>1 Yrs</td>
                        <th>9999</td>
                        <th>29/11/2022</th>
                    </tr>
                    <tr>
                        <th>3</td>
                        <th>10/IT/ENG</th>
                        <th>1 Yrs</td>
                        <th>9999</td>
                        <th>29/11/2022</th>
                    </tr>
                    <tr>
                        <th>4</td>
                        <th>10/IT/ENG</th>
                        <th>1 Yrs</td>
                        <th>9999</td>
                        <th>29/11/2022</th>
                    </tr>
                    <tr>
                        <th>5</td>
                        <th>10/IT/ENG</th>
                        <th>1 Yrs</td>
                        <th>9999</td>
                        <th>29/11/2022</th>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <h4>Address</h4>
            <address>
                Apex Academy<br>
                Near Honda Showroom<br>
                Dist: Nanded<br>
                Phone: 123456789<br>
                Mobile: 000000999<br>
            </address>
            <img src="images/parents-review.png" alt="ad" class="img-fluid">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row bg-dark mt-2 p-3">
            <?php include('inc/footer.php'); ?>
        </div>
    </div>
</div>

</body>

</html>