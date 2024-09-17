document.addEventListener("DOMContentLoaded", function() {
    var resumeCart = document.getElementById("resume-cart");
    var cart = document.getElementById("cart");
    var totalElement = document.getElementById("total");
    var realValue = document.getElementById("real_value");


    let quantidade = document.getElementById("quantidade");
    let amount_paid = document.getElementById("amount_paid");
    let troco = document.getElementById("troco");
    let payment_method = document.getElementById("payment_method");
    let discount_status = document.getElementById("discount_status");
    let value_discount = document.getElementById("discount_value");
    let print = document.getElementById("print-tickets");

    if (window.location.pathname == '/admin/parceiro/servicos') {
        let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

        function updateCart() {
                let items = 0;
                let total = 0;
                cartItems.forEach(item => {
                    total += parseFloat(item.price) * item.quantity;
                    items += item.quantity;
                });

            resumeCart.innerHTML = items+" Itens / R$:"+total.toFixed(2) ;

            if(totalElement){
                totalElement.textContent = total.toFixed(2);
            }
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
        }

        updateCart();

        function findCartItemIndex(name) {
          return cartItems.findIndex(item => item.name === name);
        }


        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("add-to-cart")) {
                const id = event.target.getAttribute("data-id");
                const name = event.target.getAttribute("data-name");
                const price = parseFloat(event.target.getAttribute("data-price"));
                const existingIndex = findCartItemIndex(name);

                if (existingIndex !== -1) {
                cartItems[existingIndex].quantity++;
                } else {
                cartItems.push({ id, name, price, quantity: 1 });
                }
                updateCart();
            }
        });


    }

    if(window.location.pathname == '/admin/parceiro/carrinho'){
        let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
        document.getElementById('cartItems').value = JSON.stringify(cartItems);
        checkCart();
        function checkCart() {
            if(localStorage.getItem("cartItems") == '' || localStorage.getItem("cartItems") == null){
                window.location.replace("/admin/parceiro/servicos");
            }
        }
        function updateCart() {
            cart.innerHTML = "" ;
            let total = 0;
            checkCart();
            cartItems.forEach(item => {
              cart.innerHTML = `
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">${item.name}</h6>
                        <small class="text-muted">${item.name}</small>
                    </div>
                    <div class="d-flex flex-fill justify-content-end algin-middle">
                  <button type="button" class="btn btn-sm mx-2 btn-light remove-quantity" data-name="${item.name}">
                    -
                  </button>
                  <span class="text-center aling-middle" style="font-size:1.3em;">${item.quantity}</span>
                  <button type="button" class="btn btn-sm mx-2 btn-light add-quantity" data-name="${item.name}">
                    +
                  </button>
                  <button type="button" class="btn btn-sm btn-danger remove-item" data-name="${item.name}"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    <i class="fa fa-trash"></i>
                  </button>
                </div>
                </li>
              `;

                total += parseFloat(item.price) * item.quantity;
            });

            totalElement.textContent = "R$: "+total.toFixed(2);
            quantidade.innerHTML = cartItems[0]['quantity'];
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
        }

        updateCart();

        function findCartItemIndex(id) {
            return cartItems.findIndex(item => item.id === id);
        }


          document.addEventListener("click", function(event) {
            if (event.target.classList.contains("add-to-cart")) {
                const id = event.target.getAttribute("data-id");
                const name = event.target.getAttribute("data-name");
                const price = parseFloat(event.target.getAttribute("data-price"));
                const existingIndex = findCartItemIndex(name);

                if (existingIndex !== -1) {
                cartItems[existingIndex].quantity++;
                } else {

                cartItems.push({ id, name, price, quantity: 1 });
                }
                updateCart();

            } else if (event.target.classList.contains("remove-item")) {
              const name = event.target.getAttribute("data-name");
              const itemIndex = findCartItemIndex(name);

              if (itemIndex !== -1){
                localStorage.removeItem('cartItems')
                cartItems.splice(itemIndex, 1);
                updateCart();
              }
            } else if (event.target.classList.contains("remove-quantity")) {
              const name = event.target.getAttribute("data-name");
              const itemIndex = findCartItemIndex(name);

              if (itemIndex !== -1 && cartItems[itemIndex].quantity > 1) {
                cartItems[itemIndex].quantity--;
                updateCart();
              }
            } else if (event.target.classList.contains("add-quantity")) {
              const name = event.target.getAttribute("data-name");
              const itemIndex = findCartItemIndex(name);

              if (itemIndex !== -1){
                cartItems[itemIndex].quantity++;
                updateCart();
              }
            } else if (event.target.classList.contains("clear-sale")) {
              localStorage.clear();
              location.reload();
            }
        });
    }


    // function getcookie(name = '') {
    //     let cookies = document.cookie;
    //     let cookiestore = {};

    //     cookies = cookies.split(";");

    //     if (cookies[0] == "" && cookies[0][0] == undefined) {
    //         return undefined;
    //     }

    //     cookies.forEach(function(cookie) {
    //         cookie = cookie.split(/=(.+)/);
    //         if (cookie[0].substr(0, 1) == ' ') {
    //             cookie[0] = cookie[0].substr(1);
    //         }
    //         cookiestore[cookie[0]] = cookie[1];
    //     });

    //     return (name !== '' ? cookiestore[name] : cookiestore);
    // }

    // function addCookieItem(productId, price, action){

    //     var now = new Date();
    //     var time = now.getTime();
    //     var expireTime = time + 1000*36000;
    //     now.setTime(expireTime);

    //     var price = 10;
    //     var quantity = 1;

    //     if (action == 'add'){
    //             console.log('Produto Adicionado')
    //             if(!getcookie(productId)){
    //                 var data = [ price, quantity ]
    //             }else{
    //                 var data = [ price, quantity++ ]
    //             }
    //             document.cookie = productId +'='+ JSON.stringify(data) +';expires='+ now.toUTCString() +';path=/';
    //             location.reload()
    //     }

    //     if (action == 'remove'){

    //     }


    // }

  });

