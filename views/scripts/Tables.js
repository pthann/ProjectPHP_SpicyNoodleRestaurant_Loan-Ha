
setTimeout(function () {
    $('.alert').alert('close');
}, 1500);

// Function to populate data for update modal
function showValueUpdateTable(id, name) {
    document.getElementById("tableNameUpdate").value = name;
    document.getElementById("tableIdUpdate").value = id;
}

// Function to populate data for delete modal
function showMessageDeleteTable(id, name) {
    document.getElementById("tableNameDelete").innerText = name;
    document.getElementById("tableIdDelete").value = id;
}
 