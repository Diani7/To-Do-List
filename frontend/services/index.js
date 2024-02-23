fetch("http://localhost/listaTareasPana/api/app/read.php")
    .then ((resp => resp.json()))
    .then (response => {
        console.log (response)
    })