<?php
         
         $servername="localhost";
         $username="root";
         $password="";
         $dbname="product";
         try{
            $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "la connexion a echoue:" . $e->getMessage();
        }
        
        if(isset($_POST['Product']))
        {
            
            $Name=$_POST['Name'];
            $Code=$_POST['Code'];
            $Family=$_POST['Family'];
            $Price=$_POST['Price'];
            $Quantity=$_POST['Quantity'];

            $sql=("INSERT INTO `user`(`Name`, `Code`, `Family`, `Price`, `Quantity`) VALUES (?,?,?,?,?)");
            $stmt=$conn->prepare($sql);

            
                 $stmt->execute(array($Name,$Code,$Family,$Price,$Quantity));
                 
                header('location: products.php');
            //pour changer deux ou plus dans une seul gois clique sur ctrl +d
         }
 ?>