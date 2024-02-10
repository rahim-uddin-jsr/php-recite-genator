<?php

function getUsers($conn){
    $query = "SELECT name, phone, id FROM users";
    $result = mysqli_query($conn, $query);
    $users = array(); // Initialize an empty array to store users

    if ($result) {
        // Fetch each row as an associative array and add it to the users array
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        mysqli_free_result($result); // Free the result set
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $users;
}


function getOrderDetails($conn, $id)
{
    $getOrderQuery = "SELECT *
FROM orders
WHERE id = '$id'";
    $result = mysqli_query($conn, $getOrderQuery);
    if (mysqli_num_rows($result) > 0) {
        // Fetch the student details as an associative array
        $foundedUser = mysqli_fetch_assoc($result);
        return $foundedUser;
    }
}

function getUserDetailById($conn, $userId)
{
    $getOrderQuery = "SELECT *
    FROM users
    WHERE id = '$userId'";
    $result = mysqli_query($conn, $getOrderQuery);
    if (mysqli_num_rows($result) > 0) {
        // Fetch the student details as an associative array
        $foundedUser = mysqli_fetch_assoc($result);
        return $foundedUser;
    }
}

// function getUserId($conn, $param)
// {
//     $findUserSql = "SELECT * FROM users WHERE id = '$param' OR phone = '$param' OR name = '$param'";

//     $userResult = mysqli_query($conn, $findUserSql);
//     if (mysqli_num_rows($userResult) > 0) {
//         // Fetch the student details as an associative array
//         $foundedUser = mysqli_fetch_assoc($userResult);
//         return $foundedUser['id'];
//     } else {
//         echo "<script>alert('something went wrong when trying to get userId')</script>";
//         return false;
//     }
// }

function placeOrderAndReturnOrderId($conn, $userId, $select_product, $select_amount)
{
    $ordersInsertSql = "INSERT INTO orders (user_id, product_name, product_price) VALUES ($userId, '$select_product', '$select_amount')";
    $orderResult = mysqli_query($conn, $ordersInsertSql);
    if ($orderResult) {
        $getOrderIdQuery = "SELECT MAX(id) AS last_order_id FROM orders WHERE user_id = '$userId'";
        $result = mysqli_query($conn, $getOrderIdQuery);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $orderId= mysqli_fetch_assoc($result)['last_order_id'];
                return $orderId;
            } else {
                echo "<script>alert('something went wrong when trying to get last order id')</script>";
                return false;
            }
        }
    } else {
        echo "<script>alert('something went wrong when trying to place order')</script>";
        return false;
    }

}


function createUser($conn, $name, $phone, $photoUrl) {
    // Prepare the SQL statement
    $query = "INSERT INTO users (name, phone, photo_url) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sss", $name, $phone, $photoUrl);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the execution was successful
    if ($result) {
        $_SESSION['status'] = 'User created successfully';
        return true;
    } else {
        $_SESSION['status'] = 'Failed to create user';
        return false;
    }
}
