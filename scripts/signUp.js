let form = document.querySelector('form');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  let password = document.querySelector('#password');
  let password2 = document.querySelector('#password2');
  if (password.value !== password2.value) {
    alert('Incorrect password');
    password2.classList.add('incorrect');
    console.log(password.value)
    console.log(password2.value)
    console.log(password.value === password2.value)
  } else {
    form.submit();
  }
});