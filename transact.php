<?php
include 'connection.php';
$sender=$_POST['sender'];
$receiver=$_POST['receiver'];
$amount=$_POST['amount'];
if($sender==$receiver)
{
     echo("
     <script>
     alert('Something Went Wrong!!!shut up')
     window.location.href='index.html'
     </script>
     ");

}

else
{
    $select="select * from all_users where Username='$sender'";
    $query1=$connection->query($select);
    $res=mysqli_fetch_array($query1);
    if($res['Bank_Balance']<$amount)
    {
        echo("
        <script>
        alert('Something Went Wrong!!!ufff')
        window.location.href='index.html'
        </script>
        ");
    }
    else
    {
        $money1=$res['Bank_Balance']-$amount;
        $select1="UPDATE all_users set Bank_Balance='$money1' where Username='$sender' ";
        $query1=$connection->query($select1);
        $select2="select * from all_users where Username='$receiver'";
        $query2=$connection->query($select2);
        $res2=mysqli_fetch_array($query2);
        $money2=$res2['Bank_Balance']+$amount;
        $select3="UPDATE all_users set Bank_Balance='$money2' where Username='$receiver' ";
        $query3=$connection->query($select3);
        echo $query1;
        echo $query3;
        if(($query1 && $query3))
        {
             $insert="INSERT INTO transactions SET Sender='$sender' ,Receiver='$receiver' , Amount='$amount'";
             $query4=$connection->query($insert);
             echo("
             <script>
             alert('Success')
             window.location.href='alluser.php'
             </script>
             ");
        }
        else
        {
             echo("
            <script>
            alert('Something Went Wrong!!!Please Try Again')
            window.location.href='index.html'
            </script>
            ");
        }

    }
}
?>
