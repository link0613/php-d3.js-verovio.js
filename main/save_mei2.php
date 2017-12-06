<?php
    session_start();
    $loginedUser=$_SESSION['name_of_user'];
    $servername = "localhost";
    
    //$username = "u24950p19155_1pagex";
    //$password = "12345";

    //$username = "u24950p19155";
    //$password = "BINDrrGC";
    //$dbname = "u24950p19155_melody";

    $username = "root";
    $password = "";
    $dbname = "melody";


    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
 
 
    if($_POST['action'] == "save") {
        $fn=$_POST['fn'];
        echo $fn;

        //$meis=utf8_encode( $_POST['mei']);
        $edit=  $_POST['edit'] ;

        if ($loginedUser=="admin"){
            $meis_temp = explode("\n", $_POST['mei']);
            $mei="";
            for ($i=0;$i<count($meis_temp);$i++){
                $conv =base64_encode($meis_temp[$i]);
                 
                $mei.="###".$conv;
    
            }
            echo $mei;
            
    
            //exist
            $sql="SELECT * FROM `$dbname`.`mei2` WHERE `filename`='".trim($fn)."' ORDER BY `last` DESC";
            $result = $conn->query($sql);
    
            if ($result->num_rows>0){
                $sql = "UPDATE `$dbname`.`mei2` SET `content` = '$mei', `edit` = '$edit', `last`='".date('Y-m-d H:i:s')."' WHERE `filename` = '".trim($fn)."'";
                 if ($conn->query($sql) === TRUE) {
                    echo "Success";
                } else {
                    echo "Error updating: " . $conn->error;
                }
            }else{
                //write all
                $sql = "INSERT INTO `$dbname`.`mei2` (`id`,`title`,`filename`,`content`,`edit`,`last`) VALUES ('','','". $fn."','".$mei."','".$edit."','".date('Y-m-d H:i:s')."' )"; 
                if ($conn->query($sql) === TRUE) {
                    echo "Success";
                } else {
                    echo "Error inserting:"."<br>" . $conn->error;
                }      
             }
    
        }else{
      
    
            //exist
            $sql="SELECT * FROM `$dbname`.`edit` WHERE `filename`='".trim($fn)."' and `uid`='$loginedUser' ORDER BY `last` DESC";
            $result = $conn->query($sql);
    
            if ($result->num_rows>0){
                $sql = "UPDATE `$dbname`.`edit` SET  `edit` = '$edit', `last`='".date('Y-m-d H:i:s')."' WHERE `uid`='$loginedUser' AND `filename` = '".trim($fn)."'";
                 if ($conn->query($sql) === TRUE) {
                    echo "Success";
                } else {
                    echo "Error updating: " . $conn->error;
                }
            }else{
                //write all
                $sql = "INSERT INTO `$dbname`.`edit` (`no` ,`uid`,`filename`,`edit`,`last`) VALUES ('','$loginedUser','".trim($fn)."','$edit', '".date('Y-m-d H:i:s')."' )"; 
                if ($conn->query($sql) === TRUE) {
                    echo "Success";
                } else {
                    echo "Error inserting:"."<br>" . $conn->error;
                }      
             }
    
        }




        
    }else if ($_POST['action']=="read_recent"){
        $sql="SELECT * FROM `$dbname`.`mei2` ORDER BY `last` DESC";
        $result = $conn->query($sql);
        $list=[];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                
                if (count($list)<1){ //first row

                    $cont=explode("###",$row['content'] );
                    $decoded_content="";
                    
                    for ($i=0;$i<count($cont);$i++){
                        $decoded_content.=base64_decode($cont[$i]);
                    }

                    $edit =$row['edit'];

                    ///////////////////////////////////////////////
                    if ($loginedUser!="admin"){

                        $sql1="SELECT * FROM `$dbname`.`edit` WHERE `uid`='$loginedUser' AND  `filename`='".$row['filename']."'  ORDER BY `last` DESC";
                        $result1=$conn->query($sql1);
                        if ($result1->num_rows>0){
                            $row1=$result1->fetch_assoc();
                            $edit=$row1['edit'];
                        }
                    }


                    $resArray=array($row['filename'],  $decoded_content,   $edit);
                }
                
                $list[]=$row['filename'];
            }
        }else{ //database empty
            $fp = fopen("v.mei","r");
            $alls="";
            while($line=fgets($fp)){
                $alls.=$line;
            }
            fclose($fp);
            
             

            $resArray= array('w.mei', $alls, "[]"  ) ;
        }    
        
        $resArray[]=json_encode($list);
        $resJSON = json_encode($resArray);
        print $resJSON;    
        
    
        
    }else if ($_POST['action']=="read_one"){
        $fn=$_POST['fn'];
        $sql="SELECT * FROM `$dbname`.`mei2` WHERE `filename`='".trim($fn)."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $cont=explode("###",$row['content'] );
            $decoded_content="";
            
            for ($i=0;$i<count($cont);$i++){
                $decoded_content.=base64_decode($cont[$i]);
            }

            $edit=$row['edit'];
            ///////////////////////////////////////////////
            if ($loginedUser!="admin"){
                $sql1="SELECT * FROM `$dbname`.`edit` WHERE `uid`='$loginedUser' AND  `filename`='".trim($fn)."'  ORDER BY `last` DESC";
                $result1=$conn->query($sql1);
                if ($result1->num_rows>0){
                    $row1=$result1->fetch_assoc();
                    $edit=$row1['edit'];
                }
            }


            $resArray=array($row['filename'],    $decoded_content, $edit, $row['no'] );

            $resJSON = json_encode($resArray);
            print $resJSON;
        }

    }

    
    $conn->close();      
?>