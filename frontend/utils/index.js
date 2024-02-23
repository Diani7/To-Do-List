function getStateId (state){
    switch (state) {
        case "completed":
            return 2;

        case "cancelled":
            return 3;

        default:
            return 1;
    }
}