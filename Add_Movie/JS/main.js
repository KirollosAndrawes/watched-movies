const formAdd = document.querySelector(".container");
const id = document.querySelector("#ID");

function getID() {
    fetch("../JSON/playlist.json").then(response => response.json()).then(function(data) {
        id.value = data.length + 1;
    }).catch(function(error) {
        console.log(error);
    });

}

getID();

formAdd.onsubmit = function(event){
    const formData = new FormData(formAdd);
    // add data to json
    fetch("../API_PHP/add.php", {
    method: "POST",
    body: formData
    })
    .then(response => response.json()).then(function(data) {
        console.log(data);
    }).catch(function(error) {
        console.log(error);
    });
}