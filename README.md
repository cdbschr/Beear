<div align="center">
  <a href="https://github.com/cdbschr/Beear">
    <img src="public/frontend/img/Logo-Beear.png" alt="Logo Beear" width="270" height="100">
  </a>

[![Maintainability](https://api.codeclimate.com/v1/badges/dab975edd1c92f8ff310/maintainability)](https://codeclimate.com/github/cdbschr/Beear/maintainability)
  
  <h1 align="center">Beear</h1>

  <p align="center">Brasserie fictive - Projet Kercode</p>
</div>

<details>
  <summary>Sommaire</summary>
  <ol>
    <li>
      <a href="#a-propos-du-projet-">A propos du Projet</a>
      <ul>
        <li><a href="#technologies-utilisées-">Technologies utilisées</a></li>
      </ul>
    </li>
    <li>
      <a href="#mise-en-place">Mise en place</a>
      <ul>
        <li><a href="#pré-requis">Pré-requis</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#identifiants">Identifiants</a></li>
      </ul>
    </li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="resultat">Resultat</a></li>
      <ul>
        <li><a href="version-desktop">Version Desktop</a></li>
        <li><a href="version-mobile">Version Mobile</a></li>
      </ul>
  </ol>
</details>

## A propos du Projet :

Beear est une brasserie fictive, l'intérêt était de mettre en place un maximum de connaissances apprises durant la formation Kercode. 
Le projet est un site vitrine avec un accès administrateur pour faire certaines modifications : 
  <ul>
    <li>Créer des utilisateurs (admin uniquement)</li>
    <li>Modifier les textes des bières (admin et editor)</li>
    <li>Lire les mails reçu venant du formulaire de contact (admin et editor)</li>
  </ul>

J'ai crée le logo en m'inspirant du houblon et d'une tête d'un ours. 
J'ai crée également les visuels, la maquette, afin de rendre plus chouette le site. 

Vient le choix des technologies, je suis parti sur un projet centré sur PHP afin de pouvoir modifier facilement et rendre dynamique le site.

J'espère que vous apprécierez ce projet et vous souhaite une bonne visite.

* Camille Debusscher

<p align="right">(<a href="#top">back to top</a>)</p>

### Technologies utilisées :

- HTML / CSS
- JavaScript
- PHP
- SQL

<p align="right">(<a href="#top">back to top</a>)</p>

## Mise en place
### Pré-requis
Personnellement j'ai utilisé **Laragon** avec la version de PHP 8.1.5: 

* Laragon
```sh
https://laragon.org/download/
```
***J'ai utilisé l'url en : beear.test (possibilité dans laragon) afin d'être le plus proche d'un rendu serveur.***
<br>
Sans ça, avec localhost cela peut risquer de casser au niveau des liens et images.

* PHP
```sh 
https://www.php.net/downloads.php
```

* Git
```sh
https://git-scm.com/downloads
```

J'ai également utilisé composer :

* composer
```sh
https://getcomposer.org/download/
```

J'ai utilisé HEIDISQL (intégré dans Laragon), pour la gestion de base de données.
Mon dump et mon UML sont dans le dossier 
```
app/Models/db
```

<p align="right">(<a href="#top">back to top</a>)</p>

### Installation
Pour l'installation, on va récupérer le repo en faisant dans votre terminal : 

* Git clone
```sh
git clone https://github.com/cdbschr/Beear.git
```

En allant dans le dossier, on va utiliser composer :

* Composer
```sh
composer install
```

Dans le fichier situé dans public/frontend/scripts du nom de navigation.js, il faut modifier :

* Navigation.js
```js
const DOMAIN = "http://beear.test"; // A CHANGER LORS DU CHANGEMENT DE DOMAINE
```

afin d'avoir le bon fond d'écran de première page.


<p align="right">(<a href="#top">back to top</a>)</p>

### Identifiants

Pour accèder au dashboard admin, cela se passe dans le footer, le lien : Connexion.

Identifiant : mail / password

L'administrateur : 
```
admin@admin.fr/admin
```

L'éditeur :
```
editor@editor.fr/editor
```

Utilisateur :
```
user@user.fr/user
```

<p align="right">(<a href="#top">back to top</a>)</p>

## Contact

Camille Debusscher - contact@camilledebusscher.tech
<p align="right">(<a href="#top">back to top</a>)</p>

## Resultat
### Version Desktop
<img src="https://drive.google.com/file/d/1ZFRioV6koUb-zcPOeVNejJtMPykxGW3M/view?usp=sharing">

### Version Mobile
<img src="https://drive.google.com/file/d/1FxTXW3bV1Gmbph5OLqK2SwXqTIwWgbvH/view?usp=sharing">