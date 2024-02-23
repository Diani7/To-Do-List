function updateTask(name, id, date, state) {
    const newName = prompt("Digite el nuevo nombre de la tarea")
    updateTaskRequest(newName, id, date, state)
    console.log(id, newName, date, state)
    location.reload();
}

function handleStateChange (name, id, date, state) {
    const select = document.getElementById("select_task")
    console.log(id, name, date, state)
    console.log(getStateId(state))

    updateTaskRequest(name, id, date, state)
    setTimeout (() => {
        location.reload()
    }, 500)
}