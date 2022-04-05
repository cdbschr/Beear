let url = document.location.href;
url = url.replace(/\/$/, "");
let finUrl = url.substring(url.lastIndexOf("/") + 1);

const DOMAIN = "http://beear.test";
const REGEXWORD = /([a-z])\w/g;

let header = document.getElementById("generalheader");
let baliseHeader = document.querySelector("header");
let indexHeaderTxt = document.getElementById("flexcenterendheader");

if (url !== DOMAIN) {
  if (finUrl !== REGEXWORD) {
    header.removeAttribute("id");
    indexHeaderTxt.setAttribute("class", "hidden");
    baliseHeader.setAttribute("class", "bg-otherpages");
    header.setAttribute("id", "otherpagesheader");
  }
}