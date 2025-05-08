// Wait for DOM to fully load before executing scripts
document.addEventListener('DOMContentLoaded', function () {
  // Get DOM elements
  const modal = document.getElementById('testimonialModal');
  const closeBtn = document.querySelector('.close-btn');
  const addBtn = document.getElementById('addTestimonialBtn');
  const form = document.getElementById('testimonialForm');
  const modalTitle = document.getElementById('modalTitle');
  const testimonialId = document.getElementById('testimonialId');
  const nameInput = document.getElementById('name');
  const locationInput = document.getElementById('location');
  const messageInput = document.getElementById('message');

  // Handle Open Add Modal
  addBtn.addEventListener('click', () => {
    // Reset form and clear ID field for new testimonial
    form.reset();
    testimonialId.value = '';
    modalTitle.textContent = 'Add Testimonial';
    modal.style.display = 'block';
  });

  // Handle Close Modal
  closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // Handle Open Edit Modal
  document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      // Get data from table row and populate form fields
      const row = this.closest('tr');
      testimonialId.value = row.dataset.id;
      nameInput.value = row.dataset.name;
      locationInput.value = row.dataset.location;
      messageInput.value = row.dataset.message;

      modalTitle.textContent = 'Edit Testimonial';
      modal.style.display = 'block';
    });
  });

  // Handle Delete Testimonial
  document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      // Get testimonial ID from table row
      const row = this.closest('tr');
      const id = row.dataset.id;

      // Show confirmation dialog
      Swal.fire({
        title: 'Are you sure?',
        text: "This testimonial will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Perform deletion via API
          fetch('api/delete_testimonial.php', {
            method: 'POST',
            body: new URLSearchParams({ id: id })
          })
          .then(response => {
            if (response.ok) {
              return response.json();
            } else {
              return response.text().then(text => {
                console.error('Server responded with non-JSON data:', text);
                throw new Error('Server responded with non-JSON data');
              });
            }
          })
          .then(data => {
            if (data.status === 'success') {
              // Show success message and reload page
              Swal.fire('Deleted!', 'Testimonial has been deleted.', 'success')
                .then(() => location.reload());
            } else {
              // Show error message from server
              Swal.fire('Error!', data.message || 'Something went wrong!', 'error');
            }
          })
          .catch(err => {
            // Handle any errors that occur during deletion
            Swal.fire('Error!', 'An error occurred while deleting the testimonial.', 'error');
            console.error(err);
          });
        }
      });
    });
  });

  // Handle Form Submission
  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    // Send data to server for saving
    fetch('../admin/api/save_testimonial.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {
        return response.json();
      } else {
        return response.text().then(text => {
          console.error('Server responded with non-JSON data:', text);
          throw new Error('Server responded with non-JSON data');
        });
      }
    })
    .then(data => {
      if (data.status === 'success') {
        // Show success message and reload page
        Swal.fire('Success!', 'Testimonial saved successfully.', 'success')
          .then(() => location.reload());
      } else {
        // Show error message from server
        Swal.fire('Error!', data.message || 'An error occurred while saving.', 'error');
      }
    })
    .catch(err => {
      // Handle any errors that occur during submission
      Swal.fire('Error!', 'Something went wrong with the submission.', 'error');
      console.error(err);
    });
  });
});