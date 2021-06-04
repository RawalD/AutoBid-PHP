<?php

require_once('db.php');
session_start();


/*Format Array */
function formatCode($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/* SELECT Statement */
function selectAll(){
    global $mysqli_conn;

    $data = array();

    $stmt = $mysqli_conn->prepare('SELECT * FROM cars');
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows===0) echo('No Rows');
    while($row=$result->fetch_assoc()){
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}


/*SELECT SINGLE Statement */

function selectSingle($id = NULL){
    global $mysqli_conn;

    $data = array();

    $stmt = $mysqli_conn->prepare('SELECT * FROM cars WHERE id = ?');
    
    $stmt->bind_param('i', $id);
    
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows===0) echo('No Rows');
    $row=$result->fetch_assoc();
        
    $stmt->close();
    
    return $row;
}


/*INSERT Statement */
function insert($name=NULL,$date=NULL,$price=NULL){
    global $mysqli_conn;
    $stmt = $mysqli_conn->prepare('INSERT INTO cars (name,date,price) VALUES (?,?,?)');
    $stmt->bind_param('sss', $name,$date,$price);
    $stmt->execute();
    $stmt->close();

    header('Location: update.php?id='.$mysqli_conn->insert_id);
}

/*UPDATE Statement */
function update($name=NULL,$date=NULL,$price=NULL, $id){
    global $mysqli_conn;
    $stmt = $mysqli_conn->prepare('UPDATE cars SET name = ?,date =? ,price = ? WHERE id = ?');
    $stmt->bind_param('sssi', $name,$date,$price,$id);
    $stmt->execute();
    
    if($stmt->affected_rows===0)echo('No Rows Affected');

    $stmt->close();

    
}

/*DELETE Statement */
function delete($id){
    global $mysqli_conn;
    
    $stmt = $mysqli_conn->prepare('DELETE FROM cars WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    
    $stmt->close();
    header('Location: index.php');
    
}


/*LOGIN*/
function login($username = NULL, $password = NULL){

    
        global $mysqli_conn;
    
        
// $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mysqli_conn->prepare('SELECT * FROM users WHERE username = ? AND active = 1');
        
        $stmt -> bind_param('s', $username);
        
        $stmt->execute();
        $result = $stmt->get_result();
    

        if($result->num_rows === 0):
            $_SESSION['message'] = array('type'=>'danger', 'msg'=>'Your account has not been enabled. Please contact an administrator.');
        else:
            while($row = $result->fetch_assoc()){
                $hash = $row['password'];
                if(password_verify($password, $hash)):
                    $_SESSION['user']['id'] = $row['id'];
                    $_SESSION['user']['fname'] = $row['fname'];
                    $_SESSION['user']['lname'] = $row['lname'];
                    $_SESSION['user']['username'] = $row['username'];
                    $_SESSION['user']['level'] = $row['level'];
                    header('Location: index.php');
                else:
                    $_SESSION['message'] = array('type'=>'danger', 'msg'=>'Your username or password is incorrect. Please try again.');
                endif;
            }
        endif;

        $stmt->close();    

}

function logOut(){
    unset($_SESSION['user']);
    $_SESSION['message'] = array('type'=>'success', 'msg'=>'You have been successfully logged out.');
    header('Location: login.php');
    exit();
}
?>