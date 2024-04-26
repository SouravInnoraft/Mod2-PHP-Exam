// Function for inserting data with ajax.

function insertData() {
  let task = $('#input-add-task').val();
  if(task!=''){
  $.ajax({
    type: "POST",
    url: "ajax-insertData.php",
    data: {
      task:task
    },
    success: function (data) {
      $('#input-add-task').val("");
      $('.content').html(data);
    },
    error: function () {
      alert('Error')
   }
  });
 }
 else {
    $('#empty').addClass('red').text('Cannot enter empty message');
 }

}
// Calling insert Function.
$(document).on('click','#add-task',insertData);

// Function to display task.
function displayTask() {
  $.ajax({
    type: "POST",
    url: "ajax-displayTask.php",
    success: function (data) {
      $('.content').html(data);
    },
    error: function () {
      alert('Error')
    }
  });
}

// Function call to display task.
$(window).on('load',displayTask);

// Function to update tasks.
function updateTask(){
  let id = $(this).data('taskid');
  let task = $(`#${id}`).val();
  $.ajax({
    type: "POST",
    url: "ajax-updateTask.php",
    data:{
      task:task,
      id,id
    },
    success: function (data) {
      $('.content').html(data);
    },
    error: function () {
      alert('Error')
    }
  })
}

// Function call to update task.
$(document).on('click','.update-todo',updateTask);

function deleteTodo(){
  let id = $(this).data('taskid');
  $.ajax({
    type: "POST",
    url: "ajax-deleteTask.php",
    data: {
      id, id
    },
    success: function (data) {
      $('.content').html(data);
    },
    error: function () {
      alert('Error')
    }
  })
}

$(document).on('click','.delete-todo',deleteTodo);

// Function to mark todo.
let m=false;
function markTodo(){
  if(m==false){
    let id = $(this).data('taskid');
    let val=$('.cnt').text();
    $(`${cnt}`).addClass('marked');
  }
  else{
    $(`${cnt}`).removeClass('marked');
  }
  m=!m;
}

// Function call to mark todo.
$(document).on('click', '.mark-todo',markTodo)
