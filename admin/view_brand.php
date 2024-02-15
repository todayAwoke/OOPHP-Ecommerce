<head>

</head>
<h1 class="text-center  text-success">All Brands</h1>
<table class="table table-bordered bg-info mt-4">
    <thead>
        <tr>
            <th>Brand ID</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        
        include_once('../includes/DBconnection.php');
        $conn=DBconnection::connect();
        $get_brand = "SELECT * from brand";
        $brand_result = mysqli_query($conn, $get_brand);
        $number = 1;
        while ($row = mysqli_fetch_assoc($brand_result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
        ?>
            <tr class='text-center'>
                <td> <?php echo $number ?></td>
                <td><?php echo $brand_title ?></td>
                <td> <a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a> </td>
                <td> <a href='index.php?delete_brand=<?php echo $brand_id ?>' class="text-light">  <i class='fa-solid fa-trash'></i></a> </td>



            </tr>
        <?php
            $number++;
        }

        ?>


    </tbody>
</table>

</div>