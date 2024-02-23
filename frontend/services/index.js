async function getTasks (){
    let tasks = []
    await fetch("http://localhost/listaTareasPana/api/app/read.php")
        .then ((resp => resp.json()))
        .then (response => {
            tasks = response.results
    })
    return tasks;
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