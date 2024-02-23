function getStateId (state){
    switch (state) {
        case '2':
            return "completed";

        case '3':
            return "cancelled";

        default:
            return "pending";
    }
}