</div>

<script>
    // Tıklanabilir bağlantıyı bulma
    var popupLink = document.getElementById('popup-link');

    // Pop-up kutusunu bulma
    var popup = document.getElementById('popup');

    // Kapatma düğmesini bulma
    var closePopup = document.getElementById('close-popup');

    // Bağlantıya tıklanınca
    popupLink.onclick = function () {
        // Pop-up kutusunu görünür yap
        popup.style.display = 'block';
    }

    // Kapat düğmesine tıklanınca
    closePopup.onclick = function () {
        // Pop-up kutusunu gizle
        popup.style.display = 'none';
    }

    // Pop-up dışındaki boşluğa tıklanınca kapat
    window.onclick = function (event) {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    }

    function setActive(element) {
    // Tüm menü bağlantılarının active classını kaldır
    var links = document.querySelectorAll('#sidebar a');
    links.forEach(function(link) {
        link.classList.remove('active');
    });

    // Tıklanan bağlantıya active classını ekle
    element.classList.add('active');
    }

   
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

</script>
</body>

</html>