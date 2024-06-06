<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($data['users'] as $key => $item) {
            $i++;
            ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $item['name'] ?></td>
                <td><?php echo $item['birthday'] ?></td>
                <td>
                    <?php 
                    
                        if($item['gender'] == 'male') {
                            echo 'Nam';
                        }else {
                            echo 'Nữ';
                        }
                    ?>
                
                </td>
                <td>

                        <a href="?page=student&act=update&id=<?php echo $item['student_id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>

                        <a href="?page=student&act=delete&id=<?php echo $item['student_id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php

        }
        ?>
    </tbody>
</table>