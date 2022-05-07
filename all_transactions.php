<?php
        
            
            include 'db.php';
            $conn = OpenCon();

            $sql = "SELECT * FROM `transaction` WHERE 1 ORDER BY `slno` DESC";
            $result = mysqli_query($conn, $sql);
        

        include_once 'components/header.php';
    ?>

 
        <section class="mid-container p-5">
            
            <h1 class="m-0 pt-3 text-center text-capitalize text-danger">All transaction history ( <?php echo $result->num_rows; ?> )</h1>
            <div style="width: 100%; height: 220px; overflow-y: scroll; margin-top: 2%;">
            <table class="table table-light table-striped">
              <thead>
                <tr>
                    <th class="slno text-capitalize text-center border-end p-3 m-0">sl. no.</th>
                    <th class="trn-type text-capitalize text-center border-end p-3 m-0">transaction type</th>
                    <th class="ft text-capitalize text-center border-end px-3 m-0">Transfer From account no.</th>
                    <th class="ft text-capitalize text-center border-end px-3 m-0">Transfer To account no.</th>
                    <th class="amount text-capitalize text-center px-3 m-0">amount</th>
                    <th class="text-capitalize text-center border-end p-3 m-0">status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                    if($result->num_rows === 0){
                        echo "No Transaction Found Yet!";
                    }else{

                        while($row = mysqli_fetch_assoc($result)){
                            $s_id = $row['sender_id'];
                            $r_id = $row['recever_id'];

                            $sql2 = "SELECT acc_no FROM customers WHERE slno = '$s_id'";
                            $sql3 = "SELECT acc_no FROM customers WHERE slno = '$r_id'";

                            $res2 = mysqli_query($conn, $sql2);
                            $res3 = mysqli_query($conn, $sql3);

                            $r2 = mysqli_fetch_assoc($res2);
                            $r3 = mysqli_fetch_assoc($res3);

                            echo '
                            <tr class="border-top">
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0">'.$i.'</td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0"><span class="badge badge-success">Fund Transfer</span></td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 m-0"> '.$r2['acc_no'].'</td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 m-0"> '.$r3['acc_no'].'</td>
                            <td class="text-capitalize text-center fw-bold px-3 m-0">₹ '.$row['amount'].'</td>
                            <td class="text-capitalize text-center fw-bold border-end px-3 py-2 m-0"><span class="badge badge-success">Successful</span></td>
                            </tr>
                            ';
                            $i++;
                    
                        }
                    }
                            
                        
                ?>
              </tbody>
          </table>
            </div>
        </section>

        <?php 
    CloseCon($conn); 
    include_once 'components/footer.php';
 ?>