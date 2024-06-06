
<p class="text-success"><?php if(!empty($success)) echo $success; ?></p>
<form class="row g-3" method="post" action="?page=student&act=updateStart&id=<?php echo $student_id; ?>">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="inputEmail4" value="<?php echo $name; ?>">
        <p class="text-danger"><?php if(!empty($ers['er-name'])) echo $ers['er-name']; ?></p>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Birthday</label>
        <input type="date" name="birthday" class="form-control" id="inputPassword4" value="<?php echo $birthday; ?>">
        <p class="text-danger"><?php if(!empty($ers['er-birthday'])) echo $ers['er-birthday']; ?></p>
    </div>
    <div class="col-12">
        <select class="form-select" name="gender" aria-label="Default select example">
            <option selected value="">Gender</option>
            <option value="male" <?php if($gender == 'male') echo 'SELECTED' ?>>Male</option>
            <option value="female" <?php if($gender == 'female') echo 'SELECTED' ?>>Female</option>
        </select>
        <p class="text-danger"><?php if(!empty($ers['er-gender'])) echo $ers['er-gender']; ?></p>
    </div>
    <div class="col-12">
        <button type="submit" name="addBtn" class="btn btn-primary">Add</button>
    </div>
</form>