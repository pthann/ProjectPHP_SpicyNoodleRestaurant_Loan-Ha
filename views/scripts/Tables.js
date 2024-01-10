
setTimeout(function () {
    $('.alert').alert('close');
}, 1500);

function showValueUpdateTable(id, name) {
    document.getElementById("tableNameUpdate").value = name;
    document.getElementById("tableIdUpdate").value = id;
}


function showMessageDeleteTable(id, name) {
    document.getElementById("tableNameDelete").innerText = name;
    document.getElementById("tableIdDelete").value = id;
}
 