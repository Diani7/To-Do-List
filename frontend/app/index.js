// Task model crud 
class Task {
    constructor(name, date = new Date(), state = "Pendiente") {
        this.name = name;
        this.date = date;
        this.state = state;
    }
}