setTimeout(function () {
    $('.alert').alert('close');
}, 1500);
function showValueUpdateUser(id, email, name, role, block) {
    document.getElementById("userEmailUpdate").value = email;
    document.getElementById("userNameUpdate").value = name;
    document.getElementById("userRoleUpdate").value = role;
    document.getElementById("userBlockUpdate").checked = block === '0'; 
    document.getElementById("userIdUpdate").value = id;
}


function showMessageDeleteUser(id, name) {
    document.getElementById("userNameDelete").innerText = name;
    document.getElementById("userIdDelete").value = id;
}



