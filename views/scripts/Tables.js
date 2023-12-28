
setTimeout(function () {
    $('.alert').alert('close');
}, 1500);


function showValueUpdateTable(id, tableNumber) {
    var updateTableModal = document.getElementById('updateModal');
    updateTableModal.style.display = 'block';

    document.getElementById('tableIdUpdate').value = id;
    document.getElementById('tableNumberUpdate').value = tableNumber;
}


function showMessageDeleteTable(id, tableNumber) {
    var deleteTableModal = document.getElementById('deleteModal');
    deleteTableModal.style.display = 'block';
    document.getElementById('tableNumberDelete').innerHTML = tableNumber;
    document.getElementById('tableIdDelete').value = id;
}
