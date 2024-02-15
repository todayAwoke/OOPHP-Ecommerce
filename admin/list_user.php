<!DOCTYPE html>
<head>
   
</head>
</html>

<body>
    <h3 class="text-center text-success">All user list </h3><br>
    <table class="table table-bordered my-3">
        <?php
        
        include_once('../includes/DBconnection.php');
$conn=DBconnection::connect();
        $select_user = "SELECT*FROM user_data";
        $user_result = mysqli_query($conn, $select_user);
        $count = mysqli_num_rows($user_result);

        if ($count == 0) {
            echo "<h3 class='text-center text-danger'> there is no user> </h>";
        } else {
            echo "<thead class='bg-info'>
            <tr>
                <th>SI NO</th>
                <th>Username</th>
                <th> user email</th>
                <th>user address</th>
                <th>user mobile</th>
                <th>Delete</th>
            </tr> </thead>
            <tbody class 'bg-secondary text-light'>";
            $number = 0;
            while ($row = mysqli_fetch_assoc($user_result)) {
                $user_id = $row['user_id'];
                $username = $row['user_name'];
                $user_email = $row['user_email'];
                $user_address = $row['user_address'];
                $user_phone = $row['user_phone'];
                $number++;
                echo "<tr class ='bg-secondary text-light'>
                <td>$number</td>
                <td>$username</td>
                <td> $user_email</td>
                <td> $user_address</td>
                <td> $user_phone</td>";
        ?>
                <td> <a  href='index.php?delete_user=<?php echo $user_id ?>' <button class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>
                </tr>
        <?php
            }
        }
        ?>


        </tbody>
    </table>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <H3 class="text-danger"> Are you sure delete this ?</H3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal"><a href="./index.php?all_user" class="text-light text-decoration-none">NO</a></button>
                    <button type="button" class="btn btn-primary"> <a href='index.php?delete_user=<?php echo $user_id ?>' <button class=" text-light text-decoration-none "> YES </a></button>
                </div>
            </div>
        </div>
    </div>