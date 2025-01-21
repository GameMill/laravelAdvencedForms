<?php

namespace CBSoftwareDev\Form\Input;

class Image2 extends Image
{   
    public function render(?\CBSoftwareDev\Form\Form $form = null): string
    {
        return '
        <input id="upload-'.$this->name.'" type="file" class="hidden" accept="image/*" />
      <div id="image-preview-'.$this->name.'" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
        <label for="upload-'.$this->name.'" class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
          </svg>
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
          <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
          <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
          <span id="filename-'.$this->name.'" class="text-gray-500 bg-gray-200 z-50"></span>
        </label>
      </div>

      
        '. "
        <script>
  const fileUploadElement".$this->name." = document.getElementById('upload-".$this->name."');
  const filenameLabel".$this->name." = document.getElementById('filename-".$this->name."');
  const imagePreview".$this->name." = document.getElementById('image-preview-".$this->name."');

  // Check if the event listener has been added before
  let isEventListenerAdded = false;

  document.getElementById('upload-".$this->name."').addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
      filenameLabel".$this->name.".textContent = file.name;

      const reader = new FileReader();
      reader.onload = (e) => {
        imagePreview".$this->name.".innerHTML =
          `<img src=\"\${e.target.result}\" class=\"max-h-48 rounded-lg mx-auto\" alt=\"Image preview\" />`;
        imagePreview".$this->name.".classList.remove('border-dashed', 'border-2', 'border-gray-400');

        
        // Add event listener for image preview only once
        if (!isEventListenerAdded) {
          imagePreview".$this->name.".addEventListener('click', () => {
            fileUploadElement".$this->name.".click();
          });

          isEventListenerAdded = true;
        }
      };
      reader.readAsDataURL(file);
    } else {
      filenameLabel".$this->name.".textContent = '';
      imagePreview".$this->name.".innerHTML =
        `".'
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
          </svg>
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
          <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
          <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
        '."`;
      imagePreview".$this->name.".classList.add('border-dashed', 'border-2', 'border-gray-400');

      // Remove the event listener when there's no image
      imagePreview".$this->name.".removeEventListener('click', () => {
        fileUploadElement".$this->name.".click();
      });

      isEventListenerAdded = false;
    }
  });

  fileUploadElement".$this->name.".addEventListener('click', (event) => {
    event.stopPropagation();
  });
</script>
        ";
    }

    public function __tostring(): string
    {
        return $this->render();
    }
}