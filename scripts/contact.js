let adress = document.querySelector('#adresse');
let adressListApi = document.querySelector('#adresseApiList');

let select = document.querySelector('#selection');

adress.addEventListener('input', displayAdd);

function displayAdd() {
  select.innerHTML = "";

  fetch("https://api-adresse.data.gouv.fr/search/?q=" + adress.value + "&limit=6")
    .then((response) => response.json())
    .then((data) => {
      select.innerHTML = "";
      let listeadresse = data.features;

      if (adress) {
        listeadresse.forEach((element) => {
          let li = document.createElement('li');
          select.appendChild(li);
          li.innerText = element.properties.label;
          adressListApi.classList.remove('hidden');

          li.addEventListener('click', selectIt);

          function selectIt() {
            adress.value = element.properties.label;
            adressListApi.classList.add("hidden");
            select.innerHTML = "";
          }
        });
      } else {
        select.innerHTML = '';
        adressListApi.classList.add('hidden');
      }
    });
}