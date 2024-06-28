const openModal = document.querySelector('.user__login');
const modalContainer = document.querySelector('.container-overlay');
const closeModal = document.querySelector('.form-close__btn');

function toggleModal() {
    modalContainer.classList.toggle('active-modal');
}

openModal.addEventListener('click', toggleModal);
closeModal.addEventListener('click', toggleModal);
modalContainer.addEventListener('click', (e) => {
    if (e.target == e.currentTarget) {
        toggleModal();
    }
});