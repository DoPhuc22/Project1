<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login_logout/login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../main/css/bootstrap.css">
    <link rel="stylesheet" href="../../main/css/admin.css">
    <title>Add a furniture</title>
</head>
<body>
<?php
include_once("../../connect/open.php");
$sql = "SELECT * FROM categories";
$categories = mysqli_query($connect, $sql);
$sql2 = "SELECT * FROM producers";
$producers = mysqli_query($connect, $sql2);
include_once("../../connect/close.php");
?>

<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 250px"></div>
        <div class="position-fixed" style="height: 100%">
            <?php
            include("../../layout/admin_menu.php");
            ?>
        </div>

        <!--  content  -->

        <div class="content-container">
            <h4 class="content-heading">Add a new furniture</h4>
            <form action="store.php" method="post" class="w-75 m-auto" enctype="multipart/form-data">
                <div class="dashboard-block w-100 h-100 mb-3">
                    <div class="db-title">
                        Enter new furniture's information
                    </div>

                    <div class="dashboard-body" style="height: 400px">
                        <div class="d-flex justify-content-evenly align-items-center" style="height: 16%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Name
                                </div>
                                <div>
                                    <input name="name" type="text" class="form-control-sm" required/>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Quantity
                                </div>
                                <div>
                                    <input name="quantity" type="number" class="form-control-sm" required/>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center" style="height: 16%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Price
                                </div>
                                <div>
                                    <input name="price" type="number" class="form-control-sm" required/>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Material
                                </div>
                                <div>
                                    <input name="material" type="text" class="form-control-sm" required/>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center" style="height: 16%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Length (cm)
                                </div>
                                <div>
                                    <input name="length" type="number" class="form-control-sm" required/>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Width (cm)
                                </div>
                                <div>
                                    <input name="width" type="number" class="form-control-sm" required/>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center" style="height: 16%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Height (cm)
                                </div>
                                <div>
                                    <input name="height" type="number" class="form-control-sm" required/>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Room
                                </div>
                                <div>
                                    <input name="room" type="text" class="form-control-sm" required/>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center" style="height: 16%">
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Category
                                </div>
                                <div>
                                    <select name="category_id" id="" class="form-select-sm">
                                        <?php
                                        foreach ($categories as $category) {
                                            ?>
                                            <option value="<?= $category['id'] ?>">
                                                <?= $category['name'] ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex w-50 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Producer
                                </div>
                                <div>
                                    <select name="producer_id" id="" class="form-select-sm">
                                        <?php
                                        foreach ($producers as $producer) {
                                            ?>
                                            <option value="<?= $producer['id'] ?>">
                                                <?= $producer['name'] ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center" style="height: 16%">
                            <div class="d-flex w-100 justify-content-center align-items-center">
                                <div style="margin-right: 12px">
                                    Image
                                </div>
                                <div>
                                    <input name="image" type="file"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary nice-box-shadow" href="index.php">Back</a>
                    <button class="btn btn-primary nice-box-shadow" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>