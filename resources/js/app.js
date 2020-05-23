require('./bootstrap');

document.addEventListener('DOMContentLoaded', function () {
  // Iniciando o selecte do materialize
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, {});


  let bees = document.getElementById("bees");
  let bees_button = document.querySelector('.bees button');
  let inputs = document.querySelectorAll('form input[type="text"], textarea');

  // Escondendo o select input do materialize
  instances[0].input.style.visibility = "hidden";
  instances[0].input.style.height = "0";

  // Adicionando a funcionalidade de abrir o modal do select para o campo de abelhas
  if (bees)
    bees.addEventListener('click', (e) => {
      e.preventDefault();
      instances[0].dropdown.open();
    });

  // Adicionando a funcionalidade de abrir o modal do select para o botão de adicionar abelhas
  if (bees_button)
    bees_button.addEventListener('click', (e) => {
      e.preventDefault();
      instances[0].dropdown.open();
    });

  // Criando as tags das abelhas de acordo com as seleções do usuário
  if (instances[0].input.value.length)
    populateBeesTags(instances[0].input.value.split(','), bees);

  elems[0].addEventListener('change', function () {
    bees.innerHTML = '';
    populateBeesTags(instances[0].input.value.split(','), bees);
  });


  // Removendo o feedback visual de error quando o usuário for mudar o campo que está com erro
  inputs.forEach((input) => {
    input.addEventListener('focus', function (e) {
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
