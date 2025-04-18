// Handle image preview
document.getElementById('thumbnail').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewImage');
  
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(file);
    }
  });
  
  // Handle form submission
  document.getElementById('courseForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    const name = document.getElementById('title').value;
    const description = document.getElementById('description').value;
  
    alert(`Course "${name}" created successfully!\nDescription: ${description}`);
    this.reset();
    document.getElementById('previewImage').style.display = 'none';
  });
  