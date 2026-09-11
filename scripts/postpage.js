const fileInput = document.getElementById('image')
const titleInput = document.getElementById('input-title')
const imagePreviews = document.querySelectorAll('.preview-image')

const hintTitle = document.getElementById('hint-title')
const hintLength = document.getElementById('hint-length')
const hintImage = document.getElementById('hint-image')

let currentObjectURL = null

fileInput.addEventListener('change', function () {
  const file = this.files[0]
  hintImage.classList.toggle('done', !!file)
  if (!file) return

  if (currentObjectURL) URL.revokeObjectURL(currentObjectURL)
  currentObjectURL = URL.createObjectURL(file)

  imagePreviews.forEach(image => image.src = currentObjectURL)
})

titleInput.addEventListener('input', function () {
  const length = this.value.trim().length
  hintTitle.classList.toggle('done', length > 0)
  hintLength.classList.toggle('done', length > 0 && length < 70)
  hintLength.querySelector('span').textContent = length + ' / 70 tekens'
})
