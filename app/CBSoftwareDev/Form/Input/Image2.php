<?php

namespace CBSoftwareDev\Form\Input;

class Image2 extends Image
{   
    public function render(?\CBSoftwareDev\Form\Form $form = null): string
    {
        return 
        "<label for=\"{$this->name}\" class=\"block mb-2 text-sm font-medium text-gray-500 border-gray-500 dark:text-white dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:ring-0  peer\">Select an option</label>".
        '
        <input id="has-image-'.$this->name.'" name="has-image-'.$this->name.'" value="0" class="hidden" />

        <input id="upload-'.$this->name.'" name="'.$this->name.'"  type="file" class="hidden" accept="image/*" />
                <label  for="upload-'.$this->name.'" class="cursor-pointer">

      <div id="image-preview-'.$this->name.'" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
            <span id="upload-'.$this->name.'-label">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
          </svg>
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
          <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
          <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
          </span>
          <span id="filename-'.$this->name.'" class="text-gray-500 bg-gray-200 z-50"></span>
      </div>

              </label>

        '. "
        <script>
  const fileUploadElement".$this->name." = document.getElementById('upload-".$this->name."');
  const fileUploadElement".$this->name."label = document.getElementById('upload-".$this->name."-label');
  const filenameLabel".$this->name." = document.getElementById('filename-".$this->name."');
  const imagePreview".$this->name." = document.getElementById('image-preview-".$this->name."');

 

  document.getElementById('upload-".$this->name."').addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
      filenameLabel".$this->name.".textContent = file.name;

      const reader = new FileReader();
      reader.onload = (e) => {
        fileUploadElement".$this->name."label.innerHTML = `<img src=\"\${e.target.result}\" class=\"max-h-48 rounded-lg mx-auto\" alt=\"Image preview\" />`;
      };
      reader.readAsDataURL(file);

    } else {
      filenameLabel".$this->name.".textContent = '';
      fileUploadElement".$this->name."label.innerHTML =
        `".'
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
          </svg>
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
          <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
          <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
        '."`;
    }
  });

   imagePreview".$this->name.".addEventListener('click', (event) => {
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