
function showInsertForm() 
{
    document.querySelector('.insert-form').style.display = 'block';
    document.querySelector('.delete-form').style.display = 'none';
}

function showDeleteForm() 
{
    document.querySelector('.insert-form').style.display = 'none';
    document.querySelector('.delete-form').style.display = 'block';
}

function hide()
{
    document.querySelector('.insert-form').style.display = 'none';
    document.querySelector('.delete-form').style.display = 'none';
}
function addToCart(id) 
{
    var quantity = parseInt(document.querySelector("input[name='amount[" + id + "]']").value);
    if (quantity > 0) 
    {
        alert("Added " + quantity + " items to cart.");
    } 
    else 
    {
        alert("Please enter a valid quantity.");
    }
}

function showImage(imageUrl) 
{
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("modalImage");
    modal.style.display = "block";
    modalImg.src = imageUrl;
}

function closeModal() 
{
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
}