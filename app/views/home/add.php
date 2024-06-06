<!-- <?php 
    if(isset($ers)) {
        print_r($ers);
    }
?> -->

<p class="text-success"><?php if(!empty($success)) echo $success; ?></p>
<form class="row g-3" method="post" action="?page=student&act=startAdd">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="inputEmail4">
        <p class="text-danger"><?php if(!empty($ers['name'])) echo $ers['name']; ?></p>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Birthday</label>
        <input type="date" name="birthday" class="form-control" id="inputPassword4">
        <p class="text-danger"><?php if(!empty($ers['birthday'])) echo $ers['birthday']; ?></p>
    </div>
    <div class="col-12">
        <select class="form-select" name="gender" aria-label="Default select example">
            <option selected value="">Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <p class="text-danger"><?php if(!empty($ers['gender'])) echo $ers['gender']; ?></p>
    </div>
    <div class="col-12">
        <button type="submit" name="addBtn" class="btn btn-primary">Add</button>
    </div>
</form>