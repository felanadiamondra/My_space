<?php
    include_once('../../Controller/TaskController/taskController.php');
    $cdate= date("Y-m-d");
    $tdate= date('l d');
    $taskC= new TaskController();
    $tasks= $taskC->getAllTaskByDate($cdate);
    // var_dump($tasks);
    // die;
    // print($tasks);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../assets/css/index.css"> 
<link rel="stylesheet" href="../../assets/css/default.css"> 
<link rel="stylesheet" href="../../assets/css/utils.css"> 
</head>
<body>
<?php include_once('../Utils/headers.php');
      include_once('../Utils/nav.php');
 ?>
 <div class="container">

<div class="content">
    <div class="content-header-left">
        <h2><?php echo $tdate ?></h2>
    </div>
    <div class="content-header-right">
        <input type="date" class="input-20" onChange="searchtask(this.value)">
        <button class="btn"><img class="icon" src="../../assets/icon/search-1.png"></button>
    </div>
    <div class="modal modal-task">
        <div class="modal-content">
            <div class="space-between">
                <h3>Add task<h3>
                <a onclick=closemodal() style="justify-content:space-between"><span class="close">&times;</span></a>
            </div>
            <input type="text" id="item" class="input modal-content-container" placeholder="Doing ... ">
            <button class="btn-rounded btn-size-icon" onclick="addSingleTodo()">+</button>
            <div class="list-todo">
                <ul class="list-item">

                </ul>
                <button class="bubbly-button btn-modal" id="submitTodo" disabled>Valider</button>
            </div>
            
        </div>
    </div>
    <div class="content-body">
    <div class="task-area">
    <?php
        if($tasks == null || $tasks == ""){
            ?>
            <div class="content-body no-task">
                <p>No task for today . Do you want to add new task?</p><br>
                
                <img alt="task" class="task-bgimage" src="../../assets/images/task-1.jpg"> 

                <button class="bubbly-button" onclick="showmodal()">Add task</button>
            </div>
            <?php
        }
        else{
            ?>
           <div class="task-content">
                <table class="table">
                    <tr>
                        <th>Tâches</th>
                        <th id="state" class="state">Statut</th>
                    </tr>
                    <?php
                            foreach($tasks as $task){
                            ?>
                            <tr>
                                <td class="row-data task"><?php echo $task['contenu']?></td>
                                <td class="row-data state">
                                    <div class="state-content">
                                        <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act="EC"' class="checking tick">✔</a>
                                        <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act="N"' class="checking cross checked">✖</a>
                                        <a href='../../Controller/TaskController/updateTask.php?id=<?php echo $task['id']?>&act="O"' class="checking loading">✿</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                </table>
           </div>           
            <?php
         }
        ?>
        </div>
    </div>
</div>
</div>
</body>
<script>
    const modal= document.querySelector('.modal');
    const container= document.querySelector('.container');
    function showmodal(){  
        modal.style.display= 'block';
        // container.style.background='#cccccc';
    }

    function closemodal(){
        modal.style.display='none';
        // modal.style.marginTop= '-700px';
        container.style.background='#fff';
    }

    
</script>
<script src="../../assets/js/xhr.js"></script>
<script src="../../assets/js/modal.js"></script>
<script src="../../assets/js/default.js"></script>
<script src="../../assets/js/index.js"></script>
<script src="../../assets/js/utils.js"></script>
</html>

