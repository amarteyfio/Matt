<?php
class StaffLogin{
    private $client;
    function __construct(){
        $client = new MongoDB\Client(
            'mongodb+srv://Omieibi:iUXEcoZt1hDWYbXI@matt.plnfh.mongodb.net/Users?retryWrites=true&w=majority'
        ) ;
        $this->client= $client; 
        
        $coll2= $this->client->Users->StaffInfo;
        $this->coll2= $coll2;
    }

    function staff($id,$password){
        $staff= $this->coll2->findOne(["staffid"=>$id]);

        if($staff == NULL){
            echo('NO STAFF');
        }
        elseif ($staff->role=='finance') {
            if(password_verify( $password, $staff->password)){
                echo('logged in');
                return true;
            }
            else{
                echo('notlogged in');
                return false;
            }
        
            # code...
        }
        elseif ($staff->role=='registry') {
            echo('reg');
            if(password_verify( $password, $staff->password)){
                echo('logged in');
                return true;
            }
            else{
                echo('notlogged in');
                return false;
            }
            # code...
        }
        else{
            echo('staff');
            if(password_verify( $password, $staff->password)){
                echo('logged in');
                return true;
            }
            else{
                echo('notlogged in');
                return false;
            }
        }
    }

    function passEncrypt($password){
        $options = [
            'cost' => 12,
        ];
        $passhash=password_hash($password, PASSWORD_BCRYPT, $options);
        echo($passhash);
    }

    function passDecrypt($hash,$password){
      $verify=  password_verify( $password, $hash);
    
      if($verify){
         // echo('password verified');
      }
      else{
          //echo('nah');
      }
    }
}

$test= new StaffLogin();
//$test->staff('0001');
$test->passEncrypt('stud3');

?>