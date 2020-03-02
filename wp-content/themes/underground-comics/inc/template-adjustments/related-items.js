document.addEventListener('DOMContentLoaded', function (event) {


    // Replace unordered list with Bootstrap grid system on woocommerce single-product.php page

    let heading = document.querySelector('section.related.products h2')
    let ul = document.querySelector('.products .columns-4')

    // Replace existing h2 so that it can be centered
    let h2 = document.createElement('h2')
    h2.innerHTML = heading.innerHTML
    h2.style.textAlign = "center"
    heading.style.visibility = 'hidden';
    // Create container
    let containerFluid = document.createElement('div');
    containerFluid.className = 'container-fluid'

    // Create row
    let row = document.createElement('div');
    row.className = 'row'

    // Copy product contents to row from old ul
    while (ul.hasChildNodes()) {
        row.appendChild(ul.removeChild(ul.firstChild))
    }
    // Add h2 and replace ul with container
    containerFluid.appendChild(h2)
    containerFluid.appendChild(row)
    ul.replaceWith(containerFluid)

})