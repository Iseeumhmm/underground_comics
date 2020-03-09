document.addEventListener('DOMContentLoaded', function (event) {


  let isCart = document.querySelector('#cart-icon');
  if (!isCart) {
    // Set email subject for link when shopping cart is disabled

    let substituteCartLink = document.querySelector('#substitute-cart-link');
    let productTitle = document.querySelector('.product_title');
    if (substituteCartLink) {
      subjectTitle = productTitle ? productTitle.innerHTML : "General Inquiry";
      let mailtoWithSubject = substituteCartLink.href + "?subject=Regarding: " + subjectTitle;
      substituteCartLink.setAttribute('href', mailtoWithSubject);
    }
    // Change featured add to cat button to link to product when cart is disabled

    let link = document.querySelector('.add-to-cart');
    let addToCartSinglePage = document.querySelector('.single_add_to_cart_button.button');

    if ( link ) { 
      let button = link.querySelector('button'); 
      button.innerHTML = "More Info";
    } else if ( addToCartSinglePage ) {
      addToCartSinglePage.setAttribute( 'style', 'display: none;' );
    }
    console.log('Cart disabled');
    if (!substituteCartLink) {
      let linkToFeatured = document.querySelectorAll('.entry-summary a');
      console.log('link: ', linkToFeatured[0].href); 
      link.setAttribute( 'href', linkToFeatured[0].href );
    } else {

    }

  }
})

function goToProduct(link) {
  window.location = link;
}