<?php
        if (isset($_GET['id'])) {
            $cust_id = $_GET['id'];
            include 'db.php';
            $conn = OpenCon();
            $sql = "SELECT * FROM `customers` WHERE `slno` = '$cust_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $sql = "SELECT * FROM `transaction` WHERE `sender_id` = '$cust_id' 
            or `recever_id` = '$cust_id' ORDER BY `slno` DESC";
            $result = mysqli_query($conn, $sql);
        }

        include_once 'components/header.php';
    ?>

 
        <section class="mid-container p-5">

        <center>
            <?php 
                echo '
                <a href="consumer.php?id='.$cust_id.'" class="btn btn-secondary mb-4"><i class="bx bx-chevron-left"></i>&nbsp;Go To Your Account Page</a>
                ';
            ?>
        </center>
            
            <h1 class="m-0 pt-3 text-center text-capitalize text-danger">transaction history</h1>
            <?php 
                if($result->num_rows == 0) {
                        echo "<br/><center><b>No Transaction Found Yet!</b></center>";
                }else{
            ?>

<div style="width: 100%; height: 220px; overflow-y: scroll; margin-top: 2%;">
            <table class="table table-light table-striped">
              <thead>
                <tr>
                    <th class="slno text-capitalize text-center border-end p-3 m-0">sl. no.</th>
                    <th class="trn-type text-capitalize text-center border-end p-3 m-0">transaction type</th>
                    <th class="ft text-capitalize text-center border-end px-3 m-0">Transfer To/From account no.</th>
                    <th class="amount text-capitalize text-center px-3 m-0">amount</th>
                    <th class="text-capitalize text-center border-end p-3 m-0">status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                    while ($ro = mysqli_fetch_assoc($result)) {
                        if ($ro['sender_id'] == $cust_id) {
                            $sql = "SELECT `acc_no` FROM `customers` WHERE `slno` = ".$ro['recever_id'];
                            $temp = mysqli_query($conn, $sql);
                            $temp_row = mysqli_fetch_assoc($temp);
                            echo '
                            <tr class="border-top">
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0">'.$i.'</td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0"><span class="badge badge-danger">Fund Transfer Debited</span></td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 m-0"> To: '.$temp_row['acc_no'].'</td>
                            <td class="text-capitalize text-center fw-bold px-3 m-0">₹ '.$ro['amount'].'</td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0"><span class="badge badge-success">Successful</span></td>
                            </tr>
                            ';
                        } else {
                            $sql = "SELECT `acc_no` FROM `customers` WHERE `slno` = ".$ro['sender_id'];
                            $temp = mysqli_query($conn, $sql);
                            $temp_row = mysqli_fetch_assoc($temp);
                            echo '
                            <tr class="border-top">
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0">'.$i.'</td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0"><span class="badge badge-success">Fund Transfer Credited</span></td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 m-0"> From: '.$temp_row['acc_no'].'</td>
                            <td class="text-capitalize text-center fw-bold px-3 m-0">₹ '.$ro['amount'].'</td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0"><span class="badge badge-success">Successful</span></td>
                            </tr>
                            ';
                        }
                        
                        $i++;
                    }
                ?>
              </tbody>
          </table>
            </div>

            <?php } ?>
        </section>

        <?php 
    CloseCon($conn); 
    include_once 'components/footer.php';
 ?>