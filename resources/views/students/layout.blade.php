<!DOCTYPE html>

<html>
<head>
<title>Laravel7 CRUD @fahmidasclassroom.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
@yield('content')
</div>
</body>
<script>
$(document).ready(function () {

/* When click New students button */
$('#new-students').click(function () {
$('#btn-save').val("create-students");
$('#students').trigger("reset");
$('#studentsCrudModal').html("Add New Students");
$('#crud-modal').modal('show');
});

/* Edit students */
$('body').on('click', '#edit-students', function () {
var students_id = $(this).data('id');
$.get('students/'+students_id+'/edit', function (data) {
$('#studentsCrudModal').html("Edit students");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#cust_id').val(data.id);
$('#name').val(data.name);
$('#email').val(data.email);
$('#address').val(data.address);
})
});
/* Show students */
$('body').on('click', '#show-students', function () {
$('#studentsCrudModal-show').html("students Details");
$('#crud-modal-show').modal('show');
});

/* Delete students */
$('body').on('click', '#delete-students', function () {
var students_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "http://localhost/laravel7crud/public/studentss/"+students_id,
data: {
"id": students_id,
"_token": token,
},
success: function (data) {
$('#msg').html('students entry deleted successfully');
$("#students_id_" + students_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
});
});

</script>
</html>