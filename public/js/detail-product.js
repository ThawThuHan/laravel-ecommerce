let value = document.querySelector("#value");
let v = +value.innerText;
let quantity = document.querySelector("#quantity");
quantity.value = v;

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    try {
        let i;
        let slides = document.querySelectorAll(".mySlide");
        let thumbnail = document.querySelectorAll(".demo");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < thumbnail.length; i++) {
            thumbnail[i].className = thumbnail[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        thumbnail[slideIndex - 1].className += " active";
    } catch (error) {
        console.log(error.message);
    }
}

function increment() {
    v++;
    value.innerText = v;
    quantity.value = v;
}

function decrement() {
    if (!(v <= 1)) {
        v--;
        value.innerText = v;
        quantity.value = v;
    }
}

function addToCart(price) {
    // console.log(price * v);
    const cart = document.querySelector("#cart");
    const total = document.querySelector("#total");
    total.value = price * v;
    cart.submit();
    // let total = price * v;
    // let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // fetch(url, {
    //     headers: {
    //         "Content-Type": "Application/json",
    //         "Accept": "application/json, text-plain, */*",
    //         "X-Requested-With": "XMLHttpRequest",
    //         "X-CSRF-TOKEN": token,
    //     },
    //     method: 'post',
    //     credentials: "same-origin",
    //     body: JSON.stringify({
    //         product_id: productId,
    //         user_id: userId,
    //         quantity: v,
    //         total: total,
    //     })
    // }).then((response) => response.json())
    //     .then((data) => {
    //         // console.log(window.location.href);
    //         // window.location.reload();
    //     })
    //     .catch((error) => {
    //         console.log(error);
    //     });
}