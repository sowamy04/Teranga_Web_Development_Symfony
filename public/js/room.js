$(function () {
    $(".update").on("click", function (event) {
        const confirm = window.confirm("voulez vous vraiment modifier cette chambre ?");
        if (!confirm) {
            event.preventDefault();
        }
    });
    $(".delete").on("click", function (event) {
        event.preventDefault();
        const eventInitiator = this;
        const id = parseInt(eventInitiator.getAttribute("href").match(/\d+/)[0]);
        const deleteRoom = eventInitiator => {
            $.ajax({
                type: "POST",
                url: `${eventInitiator.getAttribute("href")}`,
                success: function (response) {
                    document.location.assign("/");
                }
            });
        };
        $.ajax({
            type: "POST",
            url: `/chambre/${id}/isRoomEmpty`,
            dataType: "json",
            success: function (response) {
                const message = JSON.parse(response).message;
                console.log(message);
                if(message == "empty"){
                    deleteRoom(eventInitiator);
                }else if(message == "occuped"){
                    const confirm = window.confirm("Cette chambre est occupée. Voulez-vous vraiment la supprimer ?");
                    if(confirm){
                        deleteRoom(eventInitiator);
                    }
                }
            }
        });
    });
    $('#roomsTable').DataTable();
});