import FlowerModal from './FlowerModal';

class Flowers {
  constructor(flowers, parent_div, modal_instances, months = [], bee = "Nenhuma") {
    this.flowers = flowers;
    this.parent_div = parent_div;
    this.months = months;
    this.bee = bee;
    this.filtered_flowers = flowers;
    this.page_flowers = [];
    this.pages = 1;
    this.current = 1;
    this.modal_instances = modal_instances;

    generatePagination(this);
  }

  createNewFlowers() {
    this.parent_div.innerHTML = "";
    this.page_flowers.forEach(flower => {
      let div = document.createElement("div");
      div.classList.add('flower');
      let img_div = document.createElement("div");
      img_div.classList.add("flower_image");
      let img = document.createElement("img");
      img.setAttribute('src', flower.image);
      img_div.appendChild(img);

      let name = document.createElement("p");

      name.innerHTML = flower.name;

      div.appendChild(img_div);
      div.appendChild(name);
      div.setAttribute('id', flower.id);

      this.parent_div.appendChild(div);
    });

    renderPagination(this);
    setFlowerToOpenFlowerModal(this);
  }


  goToPage(page) {
    if (page > 0 && page !== this.current) {
      const start = (page - 1) * 12;
      const end =
        start + 12 > this.filtered_flowers.length ? this.filtered_flowers.length : start + 12;
      let p = this.filtered_flowers.slice(start, end);
      if (p.length) {
        this.page_flowers = p.length ? p : this.page_flowers;
        this.current = page;
      }

      this.createNewFlowers();
    }
  }

  addMonth(month) {
    this.months.push(+month.value);
    this.renderFlowers();
  }

  removeMonth(month) {
    if (this.months.indexOf(+month.value) > -1)
      this.months.splice(this.months.indexOf(+month.value), 1);
    this.renderFlowers();
  }

  setBees(bee) {
    this.bee = bee;
    this.renderFlowers();
  }

  renderFlowers() {
    filterFlowers(this);
    generatePagination(this);
    this.createNewFlowers();
  }
}

function renderPagination(flowers) {
  let pagination_div = document.querySelector('.pagination');
  pagination_div.innerHTML = "";
  for (let i = 0; i < flowers.pages; i++) {

    let span = document.createElement("span");

    span.innerHTML = "" + (i + 1);
    span.classList.add("page");

    if ((i + 1) === flowers.current)
      span.classList.add("current");

    span.addEventListener('click', function () {
      flowers.goToPage(+this.innerHTML);
    });

    pagination_div.appendChild(span);
  }
}

function generatePagination(flowers) {
  if (flowers.filtered_flowers.length <= 12)
    flowers.page_flowers = flowers.filtered_flowers;
  else
    flowers.page_flowers = flowers.filtered_flowers.slice(0, 12);

  if (flowers.filtered_flowers.length / 12 > 1)
    flowers.pages = Math.floor(flowers.filtered_flowers.length / 12 + 1);
  else
    flowers.pages = 1;
}

function setFlowerToOpenFlowerModal(flowers) {
  const flowers_element = document.querySelectorAll('.flower');
  flowers_element.forEach(flower => {
    let flower_obj = flowers.flowers.filter((f) => {
      if (+f.id === +flower.id) {
        return flower;
      }
    })
    flower.addEventListener('click', function () {
      let modal_body = document.querySelector('#modal1 .modal-content');
      let modal_header = document.querySelector('#modal1 .modal_header');
      let modal = new FlowerModal(flower_obj[0]);
      modal.generateModal(modal_body, modal_header);
      flowers.modal_instances[0].open();

      let close_modal = document.querySelector("#modal1 span");
      close_modal.addEventListener('click', () => {
        flowers.modal_instances[0].close();
      })
    });
  });
}

function filterFlowers(flowers) {


  flowers.months.sort(function (a, b) { return a - b });

  flowers.filtered_flowers = flowers.flowers.filter(function (flower) {
    if (containsAnyById(flower.months, this.months))
      return flower;
    else if (flower.bees.indexOf(this.bee) > -1)
      return flower;
    else if (this.bee === "Nenhuma" && !this.months.length)
      return flower;
  }, flowers);

}

function containsAnyById(array1, array2) {

  if (!array1.length || !array2.length)
    return false;

  let i = 0;
  let j = 0;

  while (true) {
    if (array1[i].id > array2[j])
      ++j;
    else if (array1[i].id < array2[j])
      ++i;
    else {
      return true;
    }

    if (!array1[i] || !array2[j])
      return false;

  }
}



export default Flowers;