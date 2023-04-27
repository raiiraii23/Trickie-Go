$(document).ready(function() {
    $('#logoutBtn').click(function(event) {
      event.preventDefault();
      $.ajax({
          url: 'logout.php',
          success: function(response) {
              if (response == 'success') {
              Swal.fire({
                  title: 'Are you sure?',
                    text: 'You will be logged out of the system',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, logout',
                    cancelButtonText: 'Cancel'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      // Redirect to logout page
                      window.location.href = 'http://localhost/tricycle-reservation/auth/login.php';
                    }
              });
              } else {
              Swal.fire({
                  title: 'Error!',
                  text: 'Error',
                  icon: 'error',
                  confirmButtonText: 'Ok'
              });
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              Swal.fire({
              title: 'Error!',
              text: 'Operation failed',
              icon: 'error',
              confirmButtonText: 'Ok'
              });
          }
          });
    });
  
  
  var exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var passenger = button.getAttribute('data-passenger')
    var destination = button.getAttribute('data-destination')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = exampleModal.querySelector('.modal-title')
    var passInput = exampleModal.querySelector('input[type="number"]')
    var destInput = exampleModal.querySelector('input[type="select"]')
  
    passInput.value = passenger
    destInput.value = destination
  })
  
  
  $('#update-destination-form').submit(function(event) {
                  event.preventDefault();
                  var formData = $(this).serialize();
                  console.log(formData);
                  $.ajax({
                  type: 'POST',
                  url: 'actions/update-destination.php',
                  data: formData,
                  success: function(response) {
                      if (response == 'success') {
                      Swal.fire({
                          title: 'Success!',
                          text: 'Data Update successfully',
                          icon: 'success',
                          confirmButtonText: 'Ok'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              window.location.reload();
                          }
                      });
                      } else {
                      Swal.fire({
                          title: 'Error!',
                          text: 'Error',
                          icon: 'error',
                          confirmButtonText: 'Ok'
                      });
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      Swal.fire({
                      title: 'Error!',
                      text: 'Operation failed',
                      icon: 'error',
                      confirmButtonText: 'Ok'
                      });
                  }
                  });
              });
              

  });

 

