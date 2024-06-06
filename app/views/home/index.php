<div class="form-search mb-3 row">
    <div class="col-md-3">
        <input type="text" class="form-control" id="inputSearch" placeholder="Nhập tên sv">
    </div>
    <div class="col-md-3"><button class="btn btn-outline-primary" id="btn-search">Tìm kiếm</button></div>
    <div class="col-md-6"></div>
</div>
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
    <tbody id="table-student">
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

                    if ($item['gender'] == 'male') {
                        echo 'Nam';
                    } else {
                        echo 'Nữ';
                    }
                    ?>

                </td>
                <td>

                    <a href="?page=student&act=update&id=<?php echo $item['student_id']; ?>" class="btn btn-primary"><i
                            class="bi bi-pencil-square"></i></a>

                    <a href="?page=student&act=delete&id=<?php echo $item['student_id']; ?>" class="btn btn-danger"><i
                            class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php

        }
        ?>
    </tbody>

</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-left-fill"></i></a></li>
        <?php
        for ($i = 0; $i < $data['paginate']; $i++) {


            ?>
            <li class="page-item"><a class="page-link" href="?page=student&limit=<?php echo 1; ?>&offset=<?php echo $i; ?>"><?php echo $i + 1; ?></a></li>
            <?php
        }
        ?>
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-right-fill"></i></a></li>
    </ul>
</nav>

<script>
    $(document).ready(function () {
        var btnSearch = document.getElementById('btn-search');
        var inputValue = document.getElementById('inputSearch');
        var tbody = document.getElementById('table-student');
        btnSearch.addEventListener('click', (e) => {
            var data = {
                name: inputValue.value
            };
            $.ajax(
                {
                    url: '?page=student&act=searchStudent',
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function (result) {
                        var htmls = '';
                        var i = 0;
                        result.forEach(element => {
                            i++;
                            htmls +=

                                `
            <tr>
                <th scope="row">${i}</th>
                <td>${element.name}</td>
                <td>${element.birthday}</td>
                <td>
                ${element.gender == 'male' ? 'Nam' : 'Nữ'}
                </td>
                <td>

                    <a href="?page=student&act=update&id=${element.student_id}" class="btn btn-primary"><i
                            class="bi bi-pencil-square"></i></a>

                    <a href="?page=student&act=delete&id=${element.student_id}" class="btn btn-danger"><i
                            class="bi bi-trash"></i></a>
                </td>
            </tr>`;

                            tbody.innerHTML = htmls;

                        });
                    },
                    error: function (e) {
                        console.log(e);
                    }
                }

            );
        })
    });
</script>