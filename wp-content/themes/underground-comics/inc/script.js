document.addEventListener('DOMContentLoaded', function (event) {


  let isCart = document.querySelector('#cart-icon');

  if (!isCart) {

    // Set email subject for link when shopping cart is disabled
    let substituteCartLink = document.querySelector('#substitute-cart-link');
    let link = document.querySelector('.add-to-cart');

    if (substituteCartLink) {
      let productTitle = document.querySelector('.product_title');
      let mailtoWithSubject = ""
      if (substituteCartLink) {
        subjectTitle = productTitle ? productTitle.innerHTML : "General Inquiry";
        mailtoWithSubject = substituteCartLink.value + "?subject=Regarding: " + subjectTitle;
      }

      // Change featured add to cat button to link to product when cart is disabled

      let addToCartButton = document.querySelector('.single_add_to_cart_button.button');

      addToCartButton.innerHTML = "Let's Make a Deal"
      addToCartButton.type = "";
      addToCartButton.addEventListener("click", function (event) {
        event.preventDefault()
        location.href = mailtoWithSubject;
      });
    } else {
      let linkToFeatured = document.querySelectorAll('.entry-summary a');
      link.querySelector('.featured-button').innerHTML = "More Info"
      link.setAttribute('href', linkToFeatured[0].href);
    }
  }
})

function goToProduct(link) {
  window.location = link;
}