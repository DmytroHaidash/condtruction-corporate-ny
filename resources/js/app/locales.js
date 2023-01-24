const locales = document.querySelectorAll('.locales');
const form = document.querySelector('#locale');
Array.from(locales).forEach(l => {
  l.addEventListener('click', () => {
    event.preventDefault();
    form.querySelector('[name="locale"]').value = event.target.innerText;
    form.submit();
  });
});