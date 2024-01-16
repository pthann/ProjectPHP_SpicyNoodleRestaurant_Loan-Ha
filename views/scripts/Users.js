setTimeout(function () {
    $('.alert').alert('close');
}, 1500);
function showValueUpdateUser(id, email, name,avatar,role, block) {
    document.getElementById("userEmailUpdate").value = email;
    document.getElementById("userNameUpdate").value = name;
    document.getElementById("userRoleUpdate").value = role;
    document.getElementById("userAvatarUpdate").value = avatar;
    document.getElementById("userBlockUpdate").checked = block === '0'; 
    document.getElementById('userBlockUpdate').checked = (block === '1');
    document.getElementById("userIdUpdate").value = id;
}


function showMessageDeleteUser(id, name) {
    document.getElementById("userNameDelete").innerText = name;
    document.getElementById("userIdDelete").value = id;
}



