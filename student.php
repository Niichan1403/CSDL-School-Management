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
        <div class="col-md-9">
            <small class="text-center text-primary">
                <h3>Some Of Our Successful Student .....</h3><hr>
            </small>
            
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>St.No</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Batch</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>001</th>
                        <th>Elon Musk</th>
                        <th>10</th>
                        <th>10/IT/ENG</th>
                        <th><img src="images/student/Elon_Musk.jpg" alt="student-001" class="img-fluid"></th>
                    </tr>
                    <tr>
                        <th>002</th>
                        <th>Zhong Xina</th>
                        <th>10</th>
                        <th>10/IT/ENG</th>
                        <th><img src="images/student/Zhong_Xina.jpg" alt="student-002" class="img-fluid"></th>
                    </tr>
                    <tr>
                        <th>003</th>
                        <th>The Wok</th>
                        <th>10</th>
                        <th>10/IT/ENG</th>
                        <th><img src="images/student/The_Wok.jpg" alt="student-003" class="img-fluid"></th>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h4 class="card-title text-center">Parents's Review</h4>
                </div>
            </div>
            <img src="images/parents-review.png" alt="review" class="img-fluid">
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