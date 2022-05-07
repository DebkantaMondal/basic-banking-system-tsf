
<?php

    include_once 'db.php';

    $conn = OpenCon();

    $sql = "SELECT * FROM `customers`";
    $result = mysqli_query($conn, $sql);

    CloseCon($conn);

    include_once 'components/header.php';
?>

<div class="wrapper">
<div class="">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                
                <div class="custom-card mt-3">
                <label class="main-content-label mb-0"><i class='bx bxs-group'></i>&nbsp;ALL CONSUMERS LIST &nbsp;&nbsp;</label>(Total Consumer : <b><?php echo $result->num_rows; ?></b>)
                <hr class="mt-2">
                <div class="row mb-2">
        

                    
                        
                    <div class="col-md-12">
                    
                 
                        
                        <div style="width: 100%; height: 220px; overflow-y: scroll;">
                        <table class="table table-light table-striped">
                            <thead class="">
                                <tr>
                                    <th class="slno text-capitalize text-center border-end p-3 m-0">Sl. No</th>
                                    <th class="name text-capitalize text-center border-end p-3 m-0">Consumer Name</th>
                                    <th class="select text-capitalize text-center px-3 m-0">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                        <tr class="border-top">
                                            <td class="slno text-capitalize text-center fw-bold border-end px-3 py-2 m-0">'.$i.'</td>
                                            <td class="name text-capitalize text-center fw-bold border-end px-3 py-2 m-0">'.$row['name'].'</td>
                                            <td class="select text-capitalize text-center px-3 m-0">
                                                <a href="consumer.php?id='.$row['slno'].'" class="btn btn-primary selects my-1">View Account &nbsp; <i class="bx bx-right-arrow-alt"></i></a>
                                            </td>
                                        </tr>
                                        ';
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    
                    
                    
                    
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


      

<?php include_once 'components/footer.php'; ?>