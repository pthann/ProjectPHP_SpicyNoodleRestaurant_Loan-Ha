
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Form</title>
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-between">
      <h1 class="navbar-brand mb-0">Task List</h1>
      <button class="navbar-toggler" type="button" onclick="toggleMenu()">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <div class="container">
    <div id="navbarToggleExternalContent" class="hidden">
      <div class="card">
        <div class="card-header">
          New Task
        </div>
        <div class="card-body">
          <h5 class="card-title">Task</h5>
          <input type="text" class="form-control">
          <button class="btn btn-light mt-3 border">+ Add Task</button>
        </div>
      </div>
    </div>

    <div class="card mt-5">
      <div class="card-header">
        Current Task
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <th>Task</th>
            <th></th>
          </thead>
          <tbody>
            <tr>
              <td>First Task</td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
            <tr>
              <td>Second Task</td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script>
    function toggleMenu() {
      var navbarContent = document.getElementById('navbarToggleExternalContent');
      navbarContent.classList.toggle('hidden');
    }
    toggleMenu();
  </script>
</body>

</html>