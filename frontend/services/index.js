async function getTasks (){
    let tasks = []
    await fetch("http://localhost/listaTareasPana/api/app/read.php")
        .then ((resp => resp.json()))
        .then (response => {
            tasks = response.results
    })
    return tasks;
}    