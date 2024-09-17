import './color-modes';

import $ from 'jquery';
import 'bootstrap';


var menu = document.getElementById("menu-site");
let str = ''
const promise = new Promise((resolve, reject) => {
    const url = '/api/menu/list';
    $.getJSON(url, data => {
        data.forEach(function(element) {
            str += `<a class="nav-item nav-link link-body-emphasis" href="#">${element.name}</a>`
          });
          menu.innerHTML = str;
    });
  });

  //and then later

  promise.then(data => {
    console.log(data.bpi);
  });
