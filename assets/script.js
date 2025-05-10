// This script handles the file upload and preview functionality
const input = document.getElementById('file-upload');
const preview = document.getElementById('preview');

input.addEventListener('change', () => {
  preview.innerHTML = '';
  const files = Array.from(input.files).slice(0, 20);

  files.forEach(file => {
    if (!file.type.startsWith('image/')) return;

    const reader = new FileReader();
    reader.onload = e => {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.alt = file.name;
      img.className = 'w-full h-32 object-cover rounded-lg shadow';
      preview.appendChild(img);
    };
    reader.readAsDataURL(file);
  });
});

 // Simple fade in animation on load
 document.querySelector('.animate-fadeIn')?.classList.add('opacity-0');
 window.addEventListener('load', () => {
     const el = document.querySelector('.animate-fadeIn');
     el.classList.remove('opacity-0');
     el.classList.add('transition-opacity', 'duration-1000', 'opacity-100');
 });