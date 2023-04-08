const gallery = document.querySelector('.gallery');
const images = gallery.querySelectorAll('img');
const body = document.querySelector('body');
const toggleBtn = document.getElementById('toggle-btn');
const isDarkMode = localStorage.getItem('isDarkMode');

function updateButtonText() {
  if (body.classList.contains('dark-mode')) {
    toggleBtn.textContent = 'White';
  } else {
    toggleBtn.textContent = 'Dark';
  }
}

if (isDarkMode === 'true') {
  body.classList.add('dark-mode');
  updateButtonText();
}

toggleBtn.addEventListener('click', function() {
  body.classList.toggle('dark-mode');
  updateButtonText();
  localStorage.setItem('isDarkMode', body.classList.contains('dark-mode'));
});

const observer = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    if (mutation.attributeName === 'class') {
      updateButtonText();
    }
  });
});
observer.observe(body, { attributes: true });


let modal = null;

function createModal() {
    // Cria o elemento para a imagem em tela cheia
    modal = document.createElement('div');
    modal.classList.add('modal');

    // Cria o elemento para a imagem
    const modalImg = document.createElement('img');
    modalImg.classList.add('modal-img');
    modal.appendChild(modalImg);

    // Cria o botão de fechar
    const closeButton = document.createElement('button');
    closeButton.classList.add('modal-close');
    closeButton.innerHTML = '&times;';
    modal.appendChild(closeButton);

    // Adiciona o modal ao corpo do documento
    body.appendChild(modal);

    // Adiciona um evento de clique no botão de fechar
    closeButton.addEventListener('click', closeModal);
}

function openModal(event) {

    if (!modal) {
        createModal();
    }

    const modalImg = modal.querySelector('.modal-img');
    modalImg.src = event.target.src;

    modal.style.display = 'block';
}

function closeModal() {
    modal.style.display = 'none';
}

images.forEach((image) => {
    image.addEventListener('click', openModal);
});

// Adiciona um evento de tecla pressionada para fechar o modal usando a tecla "Esc"
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        closeModal();
    }
});