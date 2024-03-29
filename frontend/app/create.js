// Task model crud 
class Task {
    constructor(name, id = null, date = new Date(), state = "pending") {
        this.id = id;
        this.name = name;
        this.date = date;
        this.state = state;
    }

    getId(){
        return this.id;
    }

    getName(){
        return this.name;
    }

    getDate(){
        return this.date;
    }

    getState(){
        return this.state;
    }

    setName(name){
        this.name = name;
        return `the task with name: ${this.name} was created`
    }
    
    
}

function createTask() { 
    document.addEventListener("submit", (event) => {
        event.preventDefault();
        const taskName = document.getElementById("task_name");
        //console.log(taskName.value);
        const task = new Task(taskName.value);
        //console.log(task.getName())
        createTaskRequest(task.getName(), task.getState())
        setTimeout (() => {
            location.reload()
        }, 1000)
    })
}
createTask()

function validateEmptyField(){
    const addTask = document.getElementById("add_task");
    const taskName = document.getElementById("task_name");
    console.log(taskName.value.length);
    if (taskName.value.length > 0){
        addTask.disabled = false;
    } else {
        addTask.disabled = true;
    }
}



    
