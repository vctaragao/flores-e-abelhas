require('./bootstrap');

document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, {});
  let bees = document.getElementById("bees");

  instances[0].input.style.visibility = "hidden";
  instances[0].input.style.height = "0";
  // instances[0].svg.style.display = "none";



  bees.addEventListener('click', function () {
    console.log(instances[0]);
    instances[0].dropdown.open();
  });

  if (instances[0].input.value.length)
    populateBeesTags(instances[0].input.value.split(','), bees);

  elems[0].addEventListener('change', function () {
    bees.innerHTML = '';
    populateBeesTags(instances[0].input.value.split(','), bees);
  });
});

function populateBeesTags(bees_selected, bees_element) {
  bees_selected.forEach(bee => {
    let span = document.createElement("span");
    span.classList.add('bee_tag')
    span.innerHTML = bee;
    bees_element.appendChild(span);
  });
}
