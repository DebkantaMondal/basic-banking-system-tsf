<?php
        if (isset($_GET['f']) && isset($_GET['t'])) {
            $from = $_GET['f'];
            $to = $_GET['t'];
            include 'db.php';

            $conn = OpenCon();
        }

        include_once 'components/header.php';
    ?>
  

      <section>

      <div class="wrapper" style="margin-top: 25px;"> 
<div class="">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                
                <div class="custom-card">
                <label class="main-content-label mb-0">Transaction Process Started</label>
                <hr class="mt-2">
                <?php
                echo '
                <a href="money_transfer.php?id='.$from.'" class="btn btn-secondary mb-4"><i class="bx bx-window-close"></i>&nbsp;Cancel Transaction</a>
                ';
            ?>
                <div class="row mb-2">

                <div class="col-md-5">
                    <p class="lbl_fld">Transfer From :</p>
                 </div>
                 <div class="col-md-7">
                        <?php
                            $sql = "SELECT * FROM `customers` WHERE `slno` = '$from'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo '
                            <p class="new-field form-field " >'.$row['acc_no'].' ('.$row['name'].')</p>
                            ';
                        ?>
                 </div>
                 </div>

                 <div class="row mb-2">

                <div class="col-md-5">
                    <p class="lbl_fld">Transfer To :</p>
                 </div>
                 <div class="col-md-7">
                        <?php
                            $sql = "SELECT * FROM `customers` WHERE `slno` = '$to'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo '
                            <p class="new-field form-field ">'.$row['acc_no'].' ('.$row['name'].')</p>
                            ';
                        ?>
                 </div>
    </div>
                    
                
            <form action="money_transfer.php?id=<?php echo $from; ?>" method="post" class="mt-form">
                <?php
                    echo '
                    <input type="hidden" value="'.$from.'" id="from" name="from" required>
                    <input type="hidden" value="'.$to.'" id="to" name="to" required>
                    ';
                ?>
                <div class="row mb-2">

                    <div class="col-md-5">
                        <p for="amount" class="lbl_fld">Enter Amount To Be Transfered (in ₹, INR):</p>
                    </div>
                    <div class="col-md-7">
                    <input type="number" class="new-field form-field " id="amount" name="amount" required placeholder="Enter Amount">
                    </div>
                </div>
                <hr class="mt-2" />
                <center>
                    <button type="submit" class="btn btn-success px-3 mx-4">Send Money&nbsp;&nbsp;<i class='bx bxs-send'></i></button>
                </center>
            </form>

            
                    
                    
                    
                    
                    
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
      </section>

<?php

        CloseCon($conn);

        include_once 'components/footer.php';

?>