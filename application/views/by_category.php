<h3>Tasks by Category</h3>
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