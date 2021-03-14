<section class="bg-light py-1">


<div class="container ">
<div id="result-multiform"></div>
        <div class="card">
            <div class="card-header">Current Balance: <?=$_SESSION['balance'];?>$</div>
            <div class="card-body">
                <div class="datatablex">
                    <table class="DataTableJSB2 table table-responsive-md table-striped table-bordered dataTable dt-responsive" >
                        <thead>
                            <tr>
                                <th >Previos balance</th>
                                <th>Total cost</th>
                                <th>Remaining balance</th>
                                <th>Purchased on</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if (isset($purchases)) 
                        {
                            foreach ($purchases as $purchase) 
                            { ?>  
                                <tr>
                                    <td><?=$purchase['balance_before']?>$</td>
                                    <td><?=$purchase['total_amount']?>$</td>
                                    <td><?=($purchase['balance_before'] - $purchase['total_amount'])?>$</td>
                                    <td><?=$purchase['purchased']?></td>
                                </tr>
                                
                        <?php
                            }
                        }    
                        ?>
                        </tbody>
                    </table>
                </div>
           
                
                
            </div>
            </div>
    </div>


</section>