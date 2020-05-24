require('./bootstrap');
import Flowers from "./Flowers";

document.addEventListener('DOMContentLoaded', function () {
  // Iniciando o select do materialize
  var select_elems = document.querySelectorAll('select');
  var select_instances = M.FormSelect.init(select_elems, {});

  // Iniciando o dropdown do materialize
  var drop_elems = document.querySelectorAll('.dropdown-trigger');
  var drop_instances = M.Dropdown.init(drop_elems, {
    coverTrigger: false,
    alignment: 'right',
    constrainWidth: false
  });


  // Escondendo o select input do materialize
  if (select_instances.length) {

    select_instances[0].input.style.visibility = "hidden";
    select_instances[0].input.style.height = "0";

    let bees = document.getElementById("bees");
    let bees_button = document.querySelector('.bees button');


    // Adicionando a funcionalidade de abrir o modal do select para o campo de abelhas
    if (bees)
      bees.addEventListener('click', (e) => {
        e.preventDefault();
        select_instances[0].dropdown.open();
      });

    // Adicionando a funcionalidade de abrir o modal do select para o botão de adicionar abelhas
    if (bees_button)
      bees_button.addEventListener('click', (e) => {
        e.preventDefault();
        select_instances[0].dropdown.open();
      });

    // Criando as tags das abelhas de acordo com as seleções do usuário
    if (select_instances[0].input.value.length)
      populateBeesTags(select_instances[0].input.value.split(','), bees);

    select_elems[0].addEventListener('change', function () {
      bees.innerHTML = '';
      const new_bees = select_instances[0].input.value.split(',');
      populateBeesTags(new_bees, bees);

      if (flowers) {
        flowers.setBees(new_bees[0]);
      }
    });
  }



  // Buscando a div responsável por mostrar as flores
  const parent_div = document.querySelector(".flowers");
  let flowers = null;
  if (parent_div) {

    flowers = new Flowers(JSON.parse(parent_div.getAttribute('data-flowers')), parent_div)
    flowers.createNewFlowers();


    // Definindo funcionalidade de troca da página para sa setas de navegação
    let next = document.querySelector('.next');
    next.addEventListener('click', function () {
      flowers.goToPage(flowers.current + 1);
    });

    let prev = document.querySelector('.prev');
    prev.addEventListener('click', function () {
      flowers.goToPage(flowers.current - 1);
    });
  }

  // Removendo o feedback visual de error quando o usuário for mudar o campo que está com erro
  let inputs = document.querySelectorAll('form input[type="text"], textarea');
  inputs.forEach((input) => {
    input.addEventListener('focus', function (e) {
      if (this.classList.contains('error'))
        this.classList.remove('error');
    });
  });

  // Adicionando à instância das flores os meses que foram selecionados
  const months = document.querySelectorAll('.month input');
  if (months)
    months.forEach((months) => {
      months.addEventListener('click', function () {
        if (flowers) {
          if (this.checked)
            flowers.addMonth(this);
          else
            flowers.removeMonth(this);
        }
      });
    })

});

// Criando o display das tags de cada abelha selecionada
function populateBeesTags(bees_selected, bees_element) {
  bees_selected.forEach(bee => {
    if (bee !== "Nenhuma") {
      let p = document.createElement("p");
      p.classList.add('bee_tag')
      p.innerHTML = bee;
      bees_element.appendChild(p);
    }
  });
}
