// Select the elements from the DOM
// id = 1 element, class = meerdere, dus de afbeeldingen zijn een class
const fileInput = document.getElementById('image');
const imagePreviews = document.querySelectorAll('.preview-image');

// onthouden zodat we de vorige url kunnen opruimen
let currentObjectURL = null;

// Listen for when a user selects a file
fileInput.addEventListener('change', function () {
  const file = this.files[0]; // Get the first selected file

  if (!file) {
    return;
  }

  // de vorige url vrijgeven, die is nu niet meer nodig
  if (currentObjectURL) {
    URL.revokeObjectURL(currentObjectURL);
  }

  // Generate a temporary local URL for the selected file
  currentObjectURL = URL.createObjectURL(file);

  // allebei de previews updaten
  imagePreviews.forEach(function (image) {
    image.src = currentObjectURL;
  });
});
