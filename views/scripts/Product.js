setTimeout(function () {
    $('.alert').alert('close');
}, 1500);
function showValueUpdateFood(id, name, imageLink, price, description) {
    var updateFoodModal = document.getElementById('updateFoodModal');
    updateFoodModal.style.display = 'block';

    document.getElementById('foodIdUpdate').value = id;
    document.getElementById('foodNameUpdate').value = name;
    document.getElementById('foodImageUpdate').value = imageLink;
    document.getElementById('foodPriceUpdate').value = price;
    document.getElementById('foodDescriptionUpdate').value = description;
}

function showMessageDeleteFood(id, name) {
    var deleteFoodModal = document.getElementById('deleteFoodModal');
    deleteFoodModal.style.display = 'block';
    document.getElementById('foodNameDelete').innerHTML = name;
    document.getElementById('foodIdDelete').value = id;
}


