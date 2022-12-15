<?php
    $gallery = "SELECT * FROM gallery";
    $run_gallery = mysqli_query($con, $gallery);
    $row_gallery = mysqli_num_rows($run_gallery);

    $student = "SELECT * FROM student";
    $run_student = mysqli_query($con, $student);
    $row_student = mysqli_num_rows($run_student);

    $review = "SELECT * FROM review";
    $run_review = mysqli_query($con, $review);
    $row_review = mysqli_num_rows($run_review);

    $courses = "SELECT * FROM courses";
    $run_courses = mysqli_query($con, $courses);
    $row_courses = mysqli_num_rows($run_courses);

    $register = "SELECT * FROM register";
    $run_register = mysqli_query($con, $register);
    $row_register = mysqli_num_rows($run_register);

    $fee = "SELECT * FROM fee";
    $run_fee = mysqli_query($con, $fee);
    $row_fee = mysqli_num_rows($run_fee);

    $category = "SELECT * FROM category";
    $run_category = mysqli_query($con, $category);
    $row_category = mysqli_num_rows($run_category);

    $expenses = "SELECT * FROM expenses";
    $run_expenses = mysqli_query($con, $expenses);
    $row_expenses = mysqli_num_rows($run_expenses);

    $exam = "SELECT * FROM exam";
    $run_exam = mysqli_query($con, $exam);
    $row_exam = mysqli_num_rows($run_exam);

    $msg = "SELECT * FROM msg";
    $run_msg = mysqli_query($con, $msg);
    $row_msg = mysqli_num_rows($run_msg);

    $msgtoclasses = "SELECT * FROM msgtoclasses";
    $run_msgtoclasses = mysqli_query($con, $msgtoclasses);
    $row_msgtoclasses = mysqli_num_rows($run_msgtoclasses);

?>

<div class="list-group">
    <a href="index.php" class="list-group-item list-group-item-action active">
        <i class="fa fa-tachometer"></i> Dashboard
    </a>

    <a href="gallery.php" class="list-group-item list-group-item-action">
        <i class="fa fa-camera"></i> Thư viện ảnh 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_gallery; ?></span>
        </button>
    </a>
    <a href="student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-user"></i> Học sinh 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_student; ?></span>
        </button>
    </a>
    <a href="review.php" class="list-group-item list-group-item-action">
        <i class="fa fa-star"></i> Nhận xét
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_review; ?></span>
        </button>
    </a>
    <a href="course.php" class="list-group-item list-group-item-action">
        <i class="fa fa-life-ring"></i> Khóa học 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_courses; ?></span>
        </button>
    </a>
    <a href="register.php" class="list-group-item list-group-item-action">
        <i class="fa fa-lightbulb-o"></i> Đăng ký 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_register; ?></span>
        </button>
    </a>
    <a href="fee.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money"></i> Học phí 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_fee; ?></span>
        </button>
    </a>
    <a href="category.php" class="list-group-item list-group-item-action">
        <i class="fa fa-sort"></i> Danh mục 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_category; ?></span>
        </button>
    </a>
    <a href="expenses.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money"></i> Chi phí 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_expenses; ?></span>
        </button>
    </a>
    <a href="exam.php" class="list-group-item list-group-item-action">
        <i class="fa fa-question"></i> Kỳ thi 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_exam; ?></span>
        </button>
    </a>
    <a href="msg.php" class="list-group-item list-group-item-action">
        <i class="fa fa-envelope"></i> Thông báo 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_msg; ?></span>
        </button>
    </a>
    <a href="msgToClasses.php" class="list-group-item list-group-item-action">
        <i class="fa fa-window-close-o"></i> Phản hồi 
        <button class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_msgtoclasses; ?></span>
        </button>
    </a>

</div>