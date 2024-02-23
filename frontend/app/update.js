function updateTask(name, id, date, state) {
    updateTaskRequest(id, name, date, state)
    console.log(id, name, date, state)
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