// Permet d'afficher un background différent de la page home, des autres pages.
let url = document.location.href;
url = url.replace(/\/$/, "");
let endUrl = url.substring(url.lastIndexOf("/") + 1);

const DOMAIN = "http://beear.test"; // A CHANGER LORS DU CHANGEMENT DE DOMAINE
const REGEXWORD = /([a-z])\w/g;

let header = document.getElementById("generalheader");
let baliseHeader = document.querySelector("header");
let indexHeaderTxt = document.getElementById("flexcenterendheader");

// permet de changer le header en fonction de la page
if (url !== DOMAIN) {
  if (endUrl !== REGEXWORD) {
    header.removeAttribute("id");
    indexHeaderTxt.setAttribute("class", "hidden");
    baliseHeader.setAttribute("class", "bg-otherpages");
    header.setAttribute("id", "otherpagesheader");
  }
}