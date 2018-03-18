<?php

$servername = 'localhost';  // mysql服务器主机地址
$username = 'root';            // mysql用户名
$password = 'root';          // mysql用户名密码


/*echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Name</th><th>URL</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} */


try{
/*	$conn = new PDO("mysql:host=$servername;dbname=mysqlnoob", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
	 
	//connect database message.
	/*echo "Connected successfully";*/

	//create database.
/*	$sql = "CREATE DATABASE myDB";
	$conn->exec($sql)；
	echo "Database created successfully<br>";*/

	//sql to create table.
/*	$sql = "CREATE TABLE MyGuests_lx (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";
    $conn->exec($sql);
    echo "Table MyGuests created successfully";*/

    //sql data insertion.
/*    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is ".$last_id;*/

    //multiple insertion through transaction.
/*    $conn->beginTransaction();
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES ('John', 'Doe', 'john@example.com')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES ('Mary', 'Moe', 'mary@example.com')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES ('Julie', 'Dooley', 'julie@example.com')");
    $conn->commit();
    echo "New records created successfully";*/

    // prepare sql and bind parameters
/*    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt->execute();

    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt->execute();

    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $stmt->execute();

    echo "New records created successfully";*/


    //select and output in format.
/*    $conn->exec("SET names utf8");
    $stmt = $conn->prepare("SELECT app_id, app_name, app_url FROM apps"); 
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }*/


    //delete SQL statement
/*    $sql = "DELETE FROM tabelname WHERE ....";
    $conn->exec($sql);
    echo "Record deleted successfully";*/


    //update SQL statement
    $sql = "UPDATE tablename SET field='Doe' WHERE id=2";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo $stmt->rowCount() . " records UPDATED successfully";


}
catch(PDOException $e){
	//roll back the transaction.
	/*$conn->rollback();*/

	echo "Connection failed: " . $e->getMessage();
} 

$conn = null;

/*echo "</table>";*/

?>