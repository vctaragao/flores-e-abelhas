
class FlowerModal {

  constructor(flower) {
    this.flower = flower;

    this.img = document.createElement('img');
    this.img.setAttribute('src', flower.image);

    this.name = document.createElement('h4');
    this.name.innerHTML = flower.name;

    this.description = document.createElement('p');
    this.description.innerHTML = flower.description;

    this.bees_title = document.createElement('h4');
    this.bees_title.innerHTML = "Abelhas";

    this.bees = document.createElement('p');
    this.bees.innerHTML = flower.bees;

    this.close = document.createElement('span');
    this.close.classList.add('material-icons');
    this.close.innerHTML = "close";

  }

  generateModal(modal_body, modal_header) {

    modal_body.innerHTML = "";

    this.generateModalHeader(modal_header);

    modal_body.appendChild(this.name);
    modal_body.appendChild(this.description);
    modal_body.appendChild(this.bees_title);
    modal_body.appendChild(this.bees);
  }

  generateModalHeader(modal_header) {
    modal_header.innerHTML = "";
    modal_header.appendChild(this.close);
    modal_header.appendChild(this.img);
  }
}

export default FlowerModal;