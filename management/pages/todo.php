<?php
include'../php/pdo.php';
include'../sidebar.php';
$todo = $pdo->prepare("SELECT * from todo where statu=1 ORDER BY date DESC");
$todo->execute();
$todos = $todo->fetchAll();
$todoc = $pdo->prepare("SELECT * from todo where statu=2 ORDER BY date DESC");
$todoc->execute();
$todosc = $todoc->fetchAll();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>



<div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                <u>APTC Todo-s</u>
            </div>
        </div>
    </div>
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-11 mx-auto">
            <form action="todo_add.php" method="post">
                <div
                    class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                    <div class="col">
                        <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded"
                        name="title" type="text"  placeholder="Add new ..">
                    </div>
                    <div class="col-auto m-0 px-2 d-flex align-items-center">
                        <label class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label d-none">Due date not
                            set</label>

                    </div>
                    <div class="col-auto px-0 mx-0 mr-2">
                        <button type="submit" name="todo_add" class="btn btn-primary">Add</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="p-2 mx-4 border-black-25 border-bottom"></div>

<!-- Todo list section -->
<div class="row mx-1 px-5 pb-3 w-80">
    <div class="col mx-auto">
    <?php foreach($todos as $td){ ?>
        <!-- Todo Item 1 -->
        <div class="row px-3 align-items-center todo-item rounded">

            <div class="col px-1 m-1 d-flex align-items-center">
                <input type="text"
                    class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly
                    value="<?= $td['title'] ?>" title="Buy groceries for next week" />
      
            </div>
            <div class="col-auto m-1 p-0 px-3 d-none">
            </div>
            <div class="col-auto m-1 p-0 todo-actions">
                <div class="row d-flex align-items-center justify-content-end">

                    <h5 class="m-0 p-0 px-2">
                        <a href="todo_delete.php?id=<?= $td['id'] ?>">
                            <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip"
                                data-placement="bottom" title="Delete todo"></i>
                        </a>
                    </h5>
                    <h5 class="m-0 p-0 px-2">
                        <a href="todo_check.php?id=<?= $td['id'] ?>">
                            <i class="fa fa-check text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom"
                                title="Delete todo"></i>
                        </a>
                    </h5>
                </div>
                <div class="row todo-created-info">
                    <div class="col-auto d-flex align-items-center pr-2">
                        <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Created date"></i>
                        <label class="date-label my-2 text-black-50"><?= $td['date'] ?> <br> <?= $td['byy'] ?> </label>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="p-2 mx-4 border-black-25 border-bottom"></div>
<div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
    <i class="fa fa-check bg-primary text-white rounded p-2"></i>
    <u>APTC Todo Complete</u>
</div>

<!-- Todo list section -->
<div class="row mx-1 px-5 pb-3 w-80">
    <div class="col mx-auto">
        <!-- Todo Item 1 -->
        <?php foreach($todosc as $tdc){ ?>
        <div class="row px-3 align-items-center todo-item rounded">

            <div class="col px-1 m-1 d-flex align-items-center">
                <input type="text"
                    class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly
                    value="<?= $tdc['title'] ?> " title="Buy groceries for next week" />
              
            </div>
            <div class="col-auto m-1 p-0 px-3 d-none">
            </div>
            <div class="col-auto m-1 p-0 todo-actions">

                <div class="row todo-created-info">
                    <div class="col-auto d-flex align-items-center pr-2">
                        <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Created date"></i>
                        <label class="date-label my-2 text-black-50"><?= $tdc['date'] ?> <br> <?= $tdc['byy'] ?> </label>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>

<style>
.add-todo-input,
.edit-todo-input {
    outline: none;
}

.add-todo-input:focus,
.edit-todo-input:focus {
    border: none !important;
    box-shadow: none !important;
}

.view-opt-label,
.date-label {
    font-size: 0.8rem;
}

.edit-todo-input {
    font-size: 1.7rem !important;
}

.todo-actions {
    visibility: hidden !important;
}

.todo-item:hover .todo-actions {
    visibility: visible !important;
}

.todo-item.editing .todo-actions .edit-icon {
    display: none !important;
}
</style>

<?php
include'../footer.php';
?>