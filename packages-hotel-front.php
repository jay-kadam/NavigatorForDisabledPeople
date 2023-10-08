<?php
session_start();

include 'navbar.php';
include 'config.php';

$hotelUid = $_SESSION['hotelUid'];
$sql = "SELECT * from hotel where id=$hotelUid";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($rs);

$sql = "SELECT * FROM packages where hotelUid = '$hotelUid' AND isDeleted = '0';";

$rs = mysqli_query($con, $sql);
?>

<html>
    <div class="title">
        <h1>Available Packages at <?= $row['hotel_name'] ?></h1>
        <div class="card-body" align="center">
            <a href="#addPackage" data-bs-toggle="modal" data-target="#addPackage" class="btn btn-primary">Add Package</a>
        </div>
    </div>

    <?php if (mysqli_num_rows($rs) > 0) {
        while ($row1 = mysqli_fetch_assoc($rs)) {
            $id = $row1['packageId']; ?>

    <div class="col d-flex justify-content-center">
        <div class="card mb-3" style="width: 700px; margin-top:20px">
            <img class="card-img-top" src="<?= $row1[
                'packageImage'
            ] ?>" alt="Card image cap">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <h5 class="card-title"><?= $row1['packageName'] ?></h5>
                    </div>
                    <div class="col-sm-12 col-md-5 text-end">
                        <div class="btn-group mr-1 ">
                            <a href="#addRoom" data-bs-toggle="modal" data-bs-target="#addRoom<?= $id ?>" class="btn btn-primary btn-sm">Add rooms</a>
                        </div>
                        <div class="btn-group mr-1">
                            <a href="#deleteRoom" data-bs-toggle="modal" data-bs-target="#deleteRoom<?= $id ?>" class="btn btn-danger btn-sm">Delete rooms</a>
                        </div>
                    </div>
                </div>

                <p class="card-text"><small>RM <?= $row1[
                    'packagePrice'
                ] ?></small></p>
                <p class="card-text"><small class="text-muted">
                    <?= $row1['packageDesc'] ?>
                </small></p>
                <div class="btn-group mr-1" style="margin-top: -16px;">
                    <a href="#updatePackage" data-bs-toggle="modal" data-bs-target="#updatePackage<?= $id ?>" class="btn btn-primary btn-sm">Update</a>
                </div>
                <div class="btn-group mr-1">
                    <form action="packages-hotel-inc.php" method="POST">
                        <input type="hidden" name="packageId" value="<?= $id ?>">
                        <input type="hidden" name="packageImage" value="<?= $row1[
                            'packageImage'
                        ] ?>">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addRoom<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Add a Room</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <form id="add_rooms" method="POST" action="packages-hotel-inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="mb-3">
                                    <label for="">Room Available: </label>
                                        <textarea class="form-control" rows="5" style="resize: none;" readonly><?php
                                        $sql = "SELECT * FROM room WHERE packageId = $id AND isDeleted = 0";
                                        $rs1 = mysqli_query($con, $sql);

                                        if (mysqli_num_rows($rs1) > 0) {
                                            while (
                                                $row2 = mysqli_fetch_assoc($rs1)
                                            ) {
                                                echo $row2['roomNum'];
                                                echo "\n";
                                            }
                                        } else {
                                            echo 'No room assigned';
                                        }
                                        ?>
                                        </textarea>  
                                </div>

                                <input type="hidden" name="packageId" value="<?= $id ?>">
                                <div class="mb-3">
                                    <label for="">Room Number</label>
                                    <input type="text" class="form-control" id="roomNum" name="roomNum" value="">
                                </div>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="submitR" id="submitR">Save changes</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="deleteRoom<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Delete a Room</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <form id="delete_rooms" method="POST" action="packages-hotel-inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="mb-3">
                                <form>
                                    <label for="">Room Available: </label>
                                    <select class="form-select" aria-label="Default select example" name="roomNum" required>
                                        <option value="">Select the room you want to delete:</option>
                                        <?php
                                        $sql = "SELECT * FROM room WHERE packageId = $id AND isDeleted = 0";
                                        $rs1 = mysqli_query($con, $sql);

                                        if (mysqli_num_rows($rs1) > 0) {
                                            while (
                                                $row2 = mysqli_fetch_assoc($rs1)
                                            ) {
                                                echo "<option value='" .
                                                    $row2['roomNum'] .
                                                    "'>" .
                                                    $row2['roomNum'] .
                                                    '</option>';
                                            }
                                        } else {
                                            echo 'No room assigned';
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="packageId" value="<?= $id ?>">
                                </form>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="deleteR" id="deleteR">Delete</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="updatePackage<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Update Package</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                        <form id="update_package" method="POST" action="packages-hotel-inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="packageId" value="<?= $id ?>">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $row1[
                                        'packageName'
                                    ] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?= $row1[
                                        'packagePrice'
                                    ] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;" required><?= $row1[
                                        'packageDesc'
                                    ] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="input-group-text" for="fileUpload">Upload image</label>
                                    <input type="hidden" name="packageImage" value="<?= $row1[
                                        'packageImage'
                                    ] ?>">
                                    <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                                </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" name="submit" id="submit">Save changes</button>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
    } else {
        echo 'No packages available';
    } ?>


    <div class="modal fade" id="addPackage" tabindex="-1" role="dialog" aria-labelledby="profileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileTitle">Add Package</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <form id="add_package" method="POST" action="packages-hotel-inc.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="packageId" value="<?= $id ?>">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="input-group-text" for="fileUpload">Upload image</label>
                                    <input type="file" name="fileUpload" id="fileUpload" class="form-control" required>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" name="submitA" id="submitA">Save changes</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>