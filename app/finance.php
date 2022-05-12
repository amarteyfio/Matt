
<?php
require '../vendor/autoload.php';
use MongoDB\Client;
class finance{
   private $client;
    function __construct(){
        $client = new MongoDB\Client(
            'mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Finance?retryWrites=true&w=majority'
        );

        
        $this->client= $client;
        $coll= $this->client->Finance->Spring22;
        $this->coll= $coll; 
        //var_dump($coll);
    }


    function checkStudent($id){
        
        $stud= $this->coll->findOne(['stid'=>$id]);
        //var_dump($stud);
        echo($stud->year);
//var_dump($stud);

        if($stud == NULL){
            echo("false");
            return false;
        }
        else{
        echo("true");
        return true;
        }
    }

 

}

class Update{
    private $client;
    function __construct(){
        $client = new MongoDB\Client(
            'mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Finance?retryWrites=true&w=majority'
        );

        $this->client= $client;
        $coll= $this->client->Finance->Spring22;
        $this->coll= $coll; 
        $test = new finance();
        $this->test= $test;
    }



    function updateFees($id, $amount,$discPecent ){
        if($this->test->checkStudent($id)== false){
            return "This student does not exist!";
        }
        else{
            $fee= 4000;
            $discount = ($discPecent/100)* $fee;
            $amtOwed = $amount -($fee - $discount);
            $update = $this->coll->updateOne(
                [ 'stid' => $id ],
                [ '$set' => [ 'amountowed' => $amtOwed ]]
            );

            $updateAmt = $this->coll->updateOne(
                [ 'stid' => $id ],
                [ '$set' => [ 'amountpaid' => $amount ]]
            );
        

        }

    }
}

$test2= new Update();
$test2->updateFees("01242022",5000,3);
?>
