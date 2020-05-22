require('./bootstrap');

document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, {});
  let bees = document.getElementById("bees");
  let bees_button = document.querySelector('.bees button');
  let inputs = document.querySelectorAll('form input[type="text"], textarea');

  console.log(inputs);


  instances[0].input.style.visibility = "hidden";
  instances[0].input.style.height = "0";

  bees.addEventListener('click', (e) => {
    e.preventDefault();
    instances[0].dropdown.open();
  });

  bees_button.addEventListener('click', (e) => {
    e.preventDefault();
    instances[0].dropdown.open();
  });

  if (instances[0].input.value.length)
    populateBeesTags(instances[0].input.value.split(','), bees);

  elems[0].addEventListener('change', function () {
    bees.innerHTML = '';
    populateBeesTags(instances[0].input.value.split(','), bees);
  });

  inputs.forEach((input) => {
    input.addEventListener('focus', function (e, i) {
      if (this.classList.contains('error'))
        this.classList.remove('error');
    });
  });

});

function populateBeesTags(bees_selected, bees_element) {
  bees_selected.forEach(bee => {
    let span = document.createElement("p");
    span.classList.add('bee_tag')
    span.innerHTML = bee;
    bees_element.appendChild(span);
  });
}
