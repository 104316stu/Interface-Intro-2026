const fileInput = document.getElementById('image')
const imagePreviews = document.querySelectorAll('.preview-image')

// onthouden zodat we de vorige url kunnen opruimen
let currentObjectURL = null

fileInput.addEventListener('change', function () {
  const file = this.files[0]

  if (!file) {
    return
  }

  if (currentObjectURL) {
    URL.revokeObjectURL(currentObjectURL)
  }

  // temp url
  currentObjectURL = URL.createObjectURL(file)

  // allebei de previews updaten
  imagePreviews.forEach(function (image) {
    image.src = currentObjectURL
  })
})

getElementById('input-title').addEventListener('input', function () {
  const title = this.value
  if (title.length >= 70) {
  
  }
})