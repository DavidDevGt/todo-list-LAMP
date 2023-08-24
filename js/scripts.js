$(document).ready(function() {
    loadTasks();

    $('#taskForm').submit(function(e) {
        e.preventDefault();

        let title = $('#title').val();
        let description = $('#description').val();

        $.post('save_task.php', { title, description }, function(response) {
            if(response.status === "success") {
                loadTasks();
                $('#taskForm').trigger('reset');
            } else {
                alert(response.message);
            }
        }, "json");
    });

    $(document).on('click', '.delete-task', function() {
        let element = $(this)[0];
        let id = $(element).attr('data-id');

        $.post('delete_task.php', { id }, function(response) {
            if(response.status === "success") {
                loadTasks();
            } else {
                alert(response.message);
            }
        }, "json");
    });
});

function loadTasks() {
    $.get('get_tasks.php', function(tasks) {
        let template = '';
        tasks.forEach(task => {
            template += `
                <li class="list-group-item">
                    ${task.title}
                    <button data-id="${task.id}" class="btn btn-danger btn-sm float-end delete-task">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </li>
            `;
        });
        $('#taskList').html(template);
    }, "json");
}