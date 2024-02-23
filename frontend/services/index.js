async function getTasks (){
    let tasks = []
    await fetch("http://localhost/listaTareasPana/api/app/read.php")
        .then ((resp => resp.json()))
        .then (response => {
            tasks = response.results
    })
    return tasks;
} 

async function createTaskRequest (name, state){
    let message = null
    await fetch("http://localhost/listaTareasPana/api/app/create.php", {
        method: "POST",
        body: JSON.stringify({
            name,
            state
        })
    })
    .then ((resp => resp.json()))
    .then (response => {
        message = response.message
    })
    return message;
}

async function updateTaskRequest (name, id, date, state){
    let message = null
    await fetch("http://localhost/listaTareasPana/api/app/update.php", {
        method: "PUT",
        body: JSON.stringify({
            id,
            name,
            date,
            state
        })
    })
    .then ((resp => resp.json()))
    .then (response => {
        message = response.message
    })
    return message;
}

async function deleteTaskRequest (id){
    let message = null
    await fetch("http://localhost/listaTareasPana/api/app/delete.php", {
        method: "DELETE",
        body: JSON.stringify({
            id
        })
    })
    .then ((resp => resp.json()))
    .then (response => {
        message = response.message
    })
    return message;
}