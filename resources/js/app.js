import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const delete_btn = document.querySelectorAll("#delete_button");

delete_btn.forEach((delete_button) => {
  delete_button.addEventListener('click', function(event){
    event.preventDefault();

    // Gestione titolo
    document.getElementById("delete-title").innerHTML = "Do you want to delete " + this.dataset.itemTitle + "?";

    const confirm_btn = document.getElementById('confirmation-delete');
    confirm_btn.addEventListener('click', function() {
        console.log(delete_button.parentElement);
        delete_button.parentElement.submit();
    });
  })
});