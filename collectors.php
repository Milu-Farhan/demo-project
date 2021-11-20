<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collectors</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container {
  padding: 2rem 0rem;
}
.modal-body{
    margin:auto;
}
.modal-dialog{
    max-width:400px
}
h4 {
  margin: 2rem 0rem 1rem;
}

.table-image {
  td, th {
    vertical-align: middle;
  }
}
.btn-success, .btn-danger{
    margin-bottom:5px
}
.main-button{
    margin-bottom:15px
}
.main-button .btn-success{
    margin-left:40%;
}

.modal-body label{
    display:block;
    margin-top:10px
}
    </style>
</head>
<body>
    <div class="container">
        <div class="main-button">
        <button title="add item to the table" type="button" class="btn btn-success collector-item-add"><i class="fas fa-add"></i></button>
        <button title="back to chat" type="button" class="btn btn-danger back-to-chat"><i class="fas fa-arrow-left"></i></button>
        </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Collector Key</th>
            <th scope="col">Value</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-row">
            <td class="key">Bootstrap 4 CDN and Starter Template</td>
            <td class="value">Cristina</td>
            <td>
              <button type="button" class="btn btn-success edit-item"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></button>
            </td>
          </tr>
          <tr class="table-row">
            <td  class="key">Bootstrap Grid 4 Tutorial and Examples</td>
            <td class="value">Cristina</td>
            <td>
              <button type="button" class="btn btn-success edit-item"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></button>
            </td>
          </tr>
          <tr class="table-row">
            <td  class="key">Bootstrap Flexbox Tutorial and Examples</td>
            <td class="value">Cristina</td>
            <td>
              <button type="button" class="btn btn-success edit-item"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal add-item-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Item</h5>
        <button type="button" class="close close-add-item-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label for="collector-key">Collector Name</label>
        <input type="text" name="collector-key" id="collector-key" size="40">
        <label for="collector-value">Value</label>
        <input type="text" name="collector-value" id="collector-value" size="40">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-item-btn">Add item</button>
      </div>
    </div>
  </div>
</div>

<div class="modal edit-item-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label for="collector-key">Collector Name</label>
        <input class="Disable" type="text" name="collector-key" id="collector-key" size="40">
        <label class="Disable" for="collector-value">Value</label>
        <input type="text" name="collector-value" id="collector-value" size="40">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary save-changes">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal delete-item-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h6>Are you sure want to delete the item?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">delete</button>
      </div>
    </div>
  </div>
</div>

<script src="./js/collector.js"></script>
</body>
</html>