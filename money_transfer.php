
    <?php
        include_once 'db.php';
        $conn = OpenCon();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = $_POST['amount'];

            if($amount > 0){

                $from = $_POST['from'];
                $cust_id = $from;
                $sql = "SELECT * FROM `customers` WHERE `slno` = '$from'";
                $result = mysqli_query($conn, $sql);
                $rowf = mysqli_fetch_assoc($result);
                $to = $_POST['to'];
                $sql = "SELECT * FROM `customers` WHERE `slno` = '$to'";
                $result = mysqli_query($conn, $sql);
                $rowt = mysqli_fetch_assoc($result);
                
                if ($amount<=$rowf['current_bal']) {
                    $status = 'success';
                    $amountf = $rowf['current_bal'] - $amount;
                    $amountt = $rowt['current_bal'] + $amount;
                    $sql = "UPDATE `customers` SET `current_bal`='$amountf' WHERE `slno` = '$from'";
                    $result = mysqli_query($conn, $sql);
                    $sql = "UPDATE `customers` SET `current_bal`='$amountt' WHERE `slno` = '$to'";
                    $result = mysqli_query($conn, $sql);
                    $sql = "INSERT INTO `transaction`(`slno`, `sender_id`, `recever_id`, `amount`) 
                    VALUES (Null,'$from','$to','$amount')";
                    $result = mysqli_query($conn, $sql);
                }
                else{
                    $status = 'insuf';
                }
            }else{
                $status = 'zero';
            }
        }else{
            $status = 'normal';
        }
            if (isset($_GET['id'])) {
                $cust_id = $_GET['id'];
                
            }
        
    
        $sql = "SELECT * FROM `customers` WHERE `slno` = '$cust_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        

        include_once 'components/header.php';
    ?>

  

        <section style="margin-top: 20px; margin-left: 20px;margin-right: 20px;">

        <?php
                echo '
                <a href="consumer.php?id='.$cust_id.'" class="btn btn-secondary mb-4"><i class="bx bxs-chevron-left"></i>&nbsp;Go To Your Account Page</a>
                ';
            ?>
            
            <?php
                switch ($status) {
                    case 'success':
                        echo '
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <strong>Transaction Successful!</strong> You have successfully transfered amount '.$amount.' to '.$rowt['name'].'.
                            
                        </div>
                        ';
                        break;
                    case 'insuf':
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>Transaction Failed!</strong> You have NOT sufficient balance.
                            
                        </div>
                        ';
                        break;
                    case 'zero':
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>Transaction Denied!</strong> You do NOT allowed To Send Zero Amount of Money.
                                
                        </div>
                        ';
                        break;
                }
            ?>
            <h4 class="notice success" style="line-height:20px;">
                <marquee behavior="alternate"><i class='bx bx-message-square-dots'></i>&nbsp;Hi ! <?php echo $row['name']; ?> ...Click on Send to Transfer Money</marquee>
            </h4>
            <div class="form-details fw-bold p-2 m-2 bg-light" style="opacity: 0.9; border-radius: 15px;">
            <?php
                    $sql = "SELECT * FROM `customers` WHERE `slno` <> '$cust_id'";
                    $result = mysqli_query($conn, $sql);
                    CloseCon($conn);
                    if($result->num_rows == 0){
                        echo "<center>No Other Consumers Found for Transaction !</center>";
                    }else{ ?>
            <center>
            <div style="width: 100%; height: 220px; overflow-y: scroll; margin-top: 2%;">
            <table class="table table-striped table-hover">
              <thead class="">
                <tr>
                    <th class="slno text-capitalize text-center border-end p-3 m-0"><i class='bx bx-info-circle'></i>&nbsp;account No.</th>
                    <th class="name text-capitalize text-center border-end p-3 m-0"><i class='bx bx-user-circle'></i>&nbsp;consumer name</th>
                    <th class="select text-capitalize text-center px-3 m-0"><i class='bx bx-right-arrow-circle'></i>&nbsp;Selection</th>
                </tr>
              </thead>
              <tbody class="">
                <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <tr class="border-top">
                                <td class="slno text-capitalize text-center fw-bold border-end px-3 py-2 m-0">'.$row['acc_no'].'</td>
                                <td class="name text-capitalize text-center fw-bold border-end px-3 py-2 m-0">'.$row['name'].'</td>
                                <td class="select text-capitalize text-center px-3 m-0">
                                    <a href="money_transfer_controller.php?f='.$cust_id.'&t='.$row['slno'].'" class="btn btn-success selects my-1">Send Money&nbsp;&nbsp;<i class="bx bxs-send" ></i></a>
                                </td>
                            </tr>
                            ';
                        }
                    }
                ?>
              </tbody>
          </table>
            </div>
        </center>
        </div>
        </section>

<?php 
    include_once "components/footer.php";
 ?>