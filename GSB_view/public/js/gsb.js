var btnPop = document.getElementById('btnPop');
var overlay = document.getElementById('overlay');
var popupbtn = document.getElementById('popupbtn');
var btnclose = document.getElementById('btnclose');

btnPop.addEventListener('click', openModal);

btnclose.addEventListener('click',closePopup);


function openModal(){
    overlay.style.display = "block";
}

function closePopup(){
    overlay.style.display = 'none';
}

function retourMois(){

    var mois = document.getElementById('mois').value;

    $.ajax({
        
        async:  true,
        
        type:   'GET',

        url:    'consulter.php',

        data:   'mois=' +mois,

        datatype:   'json',

        success:    function(data){

                    var dataTab = data;

                    //alert (dataTab);

                    document.getElementById('IdFrais').value=data[0];
                    document.getElementById('Qte').value=data[0];
                    document.getElementById('libelle').value=data[0];
                    document.getElementById('date').value=data[0];
                    document.getElementById('montant').value=data[0];
        }
    })
}