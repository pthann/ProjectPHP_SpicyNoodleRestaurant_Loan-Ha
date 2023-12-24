setTimeout(function () {
    $('.alert').alert('close');
}, 1500);

function showMessageDeleteCategory(id, name) {
    document.getElementById("categoryNameDelete").innerText = name;
    document.getElementById("categoryIdDelete").value = id;

}

function showValueUpdateCategory(id, name) {
    document.getElementById("categoryNameUpdate").value = name;
    document.getElementById("categoryIdUpdate").value = id;

}