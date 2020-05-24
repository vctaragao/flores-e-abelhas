class Flowers {
  constructor(flowers, parent_div, months = [], bee = "Nenhuma") {
    this.flowers = flowers;
    this.parent_div = parent_div;
    this.months = months;
    this.bee = bee;
    this.filtered_flowers = flowers;
    this.page_flowers = [];
    this.pages = 1;
    this.current = 1;

    generatePagination(this);
  }

  createNewFlowers() {
    console.log("CreateNewFlowers");
    console.log("----- OVER -----");
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

      this.parent_div.appendChild(div);

    });

    renderPagination(this);
  }


  goToPage(page) {
    console.log("Going to page:", page);
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
    console.log("RenderingFlowers");
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
  console.log("Generating Pagination");
  if (flowers.filtered_flowers.length <= 12)
    flowers.page_flowers = flowers.filtered_flowers;
  else
    flowers.page_flowers = flowers.filtered_flowers.slice(0, 12);

  if (flowers.filtered_flowers.length / 12 > 1)
    flowers.pages = Math.floor(flowers.filtered_flowers.length / 12 + 1);
  else
    flowers.pages = 1;
}

function filterFlowers(flowers) {

  console.log("Filtering");

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