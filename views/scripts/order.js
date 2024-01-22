setTimeout(function () {
    $(".alert").alert("close");
  }, 1500);
  
  function showValueUpdateFood(
    id,
    id_foood,
    id_user,
    customer_name,
    qty,
    phone,
    table_id,
    description
  ) {
    var updateFoodModal = document.getElementById("updateFoodModal");
    updateFoodModal.style.display = "block";
  
    document.getElementById("orderIdUpdate").value = id;
    document.getElementById("id_foood").value = id_foood;
    document.getElementById("id_user").value = id_user;
    document.getElementById("customer_name").value = customer_name;
    document.getElementById("qty").value = qty;
    document.getElementById("phone_id").value = phone;
    document.getElementById("table_id").value = table_id;
    document.getElementById("description").value = description;
  }
  function showMessageDeleteFood(id, code) {
    var deleteFoodModal = document.getElementById("deleteFoodModal");
    deleteFoodModal.style.display = "block";
    document.getElementById("foodNameDelete").innerHTML = code;
    document.getElementById("foodIdDelete").value = id;
  }
  