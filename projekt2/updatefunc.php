<?php
function updateField($column, $input, $userID){

    if(is_string($input)){
        // String update func
        $conn = create_conn();
        $sql = "UPDATE users SET $column=? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $input, $userID);
        $stmt->execute();
        
        $sqlcheck = "SELECT * FROM users WHERE $column=? and id = ?";
        $scndstmt = $conn->prepare($sqlcheck);
        $scndstmt->bind_param("si", $input, $userID);
        $scndstmt->execute();
        $result = $scndstmt->get_result();
        $answer = mysqli_num_rows($result);
        
        if($answer = 1){
            print("You have succesfully updated the field");
            $conn->close();
        } else { print("Unable to update information"); }


    } else if (is_int($input)) {
        // Int update func
        $conn = create_conn();
        $sql = "UPDATE users SET $column=? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $input, $userID);
        $stmt->execute();
        
        $sqlcheck = "SELECT * FROM users WHERE $column=? and id = ?";
        $scndstmt = $conn->prepare($sqlcheck);
        $scndstmt->bind_param("ii", $input, $userID);
        $scndstmt->execute();
        $result = $scndstmt->get_result();
        $answer = mysqli_num_rows($result);
        
        if($answer = 1){
            print("You have succesfully updated the field");
            $conn->close();
        } else { print("Unable to update information"); }

    } else {
        echo("Incorrect field input");
    }
}