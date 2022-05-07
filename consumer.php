<?php

        include_once 'db.php';

        $conn = OpenCon();

        
        if (isset($_GET['id'])) {
            $consumer_id = $_GET['id'];
            
            $sql = "SELECT * FROM `customers` WHERE `slno` = '$consumer_id'";
            $result = mysqli_query($conn, $sql);

            CloseCon($conn);

            $row = mysqli_fetch_assoc($result);
        }

        include_once 'components/header.php';
    ?>    
    
    
     
 

        <section style="margin-top: -80px;">
            
            <div class="wrapper">
<div style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
    <div class="container">

    <h4 class="notice success" style="line-height:20px;">
        <b><marquee behavior="alternate"><i class='bx bx-message-dots'></i>&nbsp;Hi ! <?php echo $row['name']; ?> ...Welcome To Your Account Page</marquee></b>
    </h4>
        <div class="row">
            
            <div class="col-md-12">

            
                
                <div class="custom-card mt-3">
                <label class="main-content-label mb-0"><i class='bx bxs-user-check'></i>&nbsp;Your Detail</label>
                <hr class="mt-2">
                <div class="row mb-2">
                <div class="col-md-12">
                <center>
                    <?php
                        if($row['current_bal']>=3000){
                            echo '
                            <b><p class="right-d m-0 ps-2">Email ID : '.$row['email'].'</p></b>
                            <b><p class="right-d text-capitalize m-0 ps-2">Account Number : '.$row['acc_no'].'</p></b><br/>
                            <p class="right-d text-capitalize m-0 ps-2"><button class="btn btn-primary px-4 mx-2"><i class="bx bx-coin-stack"></i>&nbsp;<b>Your Current Balance is ₹ '.$row['current_bal'].' /-</b></button></p>
                            ';
                    ?>

                            <br/><br/>
                    <div class="operation mb-2">
                        <?php
                            echo '
                            <a href="money_transfer.php?id='.$consumer_id.'" class="btn btn-success px-4 mx-2">Money Transfer&nbsp;&nbsp;<i class="bx bx-send"></i></a>
                            
                            ';

                        
                        ?>
                        <?php }else{

                            echo '
                            <b><p class="right-d m-0 ps-2">Email ID : '.$row['email'].'</p></b>
                            <b><p class="right-d text-capitalize m-0 ps-2">Account Number : '.$row['acc_no'].'</p></b><br/>
                            <p class="right-d text-capitalize m-0 ps-2"><button class="btn btn-primary px-4 mx-2"><b>Your Current Balance is ₹ '.$row['current_bal'].' /-</b></button></p>
                            ';

                            echo '
                            <br/><br/><div class="operation mb-2"><b><a class="text-danger text-center">You Do NOT Have Sufficient Money To Transfer ... Min Balance is 3000</a></b>

                            <br/>';

                            echo " <br/>";

                        }

                    ?>

                    

                        <a href="transaction_history.php?id=<?php echo $consumer_id; ?>" class="btn btn-danger mx-2">Transaction History&nbsp;&nbsp;<i class='bx bx-history' ></i></a>
                    </div>
                </center>
            
                </div>
                    
                    
                    
                    
                    
                </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
            
        </section>

<?php include_once 'components/footer.php'; ?>