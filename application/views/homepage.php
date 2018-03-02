<div class="alert alert-info">{remaining_tasks} tasks are left to do!</div>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Task</th>
        <th>Size</th>
        <th>Group</th>
        <th>Status</th>
        <th>Priority</th>
    </tr>

    {display_tasks}
    <tr>
        <td>{id}</td>
        <td>{task}</td>
        <td>{size}</td>
        <td>{group}</td>
        <td>{status}</td>
        <td>{priority}</td>
    </tr>
    {/display_tasks}
    
</table>