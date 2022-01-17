const play = document.getElementById("play");
const score = document.getElementById("score");
play.addEventListener("click",letsPlay);

updateScore();

function letsPlay(){

    const aireJeu = document.getElementById("aireJeu");
    const infos = document.getElementById("infos");

    play.innerText="Relancer la partie";
    aireJeu.innerHTML="";
    infos.innerHTML="";
    let player = prompt("Qui va tenter de battre un record ? ");

    let tableauImages =[];
    tableauImages.push("fa-500px",
    "fa-acquisitions-incorporated",
    "fa-accusoft",
    "fa-android",
    "fa-airbnb",
    "fa-affiliatetheme",
    /*"fa-amazon",*/
    "fa-angular",
    "fa-angellist",
    "fa-atlassian",
    "fa-autoprefixer",
    "fa-battle-net",
    "fa-bitcoin",
    "fa-bluetooth-b",
    "fa-bootstrap",
    "fa-accessible-icon");

    let tableauRand1 =[];
    for(let i=0; i<tableauImages.length; i++){
        let numero=Math.floor(Math.random()*tableauImages.length);

        if(tableauRand1.includes(numero)){
            i--;
        }else{
            tableauRand1.push(numero);
        }   
    }

    let tableauRand2 =[];
    for(let i=0; i<tableauImages.length; i++){
        let numero=Math.floor(Math.random()*tableauImages.length);

        if(tableauRand2.includes(numero)){
            i--;
        }else{
            tableauRand2.push(numero);
        }   
    }

    let tableauFinal=[];
    for(let i=0;i<tableauImages.length; i++){
        tableauFinal.push(tableauRand1[i]);
        tableauFinal.push(tableauRand2[i]);
    }



    for(i=0; i<tableauFinal.length;i++){
        let baliseDiv=null;
        let balise=null;
        let addClass=tableauImages[tableauFinal[i]];

        baliseDiv = document.createElement("div");
        baliseDiv.classList.add("col");
        balise=document.createElement("i");
        balise.classList.add("d-flex", "justify-content-center", "align-items-center", "m-2", "rounded", "fab",addClass);
        balise.setAttribute("id","id"+i);
        baliseDiv.appendChild(balise);
        aireJeu.appendChild(baliseDiv);
    }


    const icones = document.getElementsByTagName("i");

    let card1=null;
    let card2=null;
    let fin=0;
    let nbOfMove=0;

    for(let i=0; i<icones.length; i++){setTimeout(function () {icones[i].style.color ="whitesmoke"},1000)};

    for(let i=0; i<icones.length; i++){
        icones[i].addEventListener("mouseleave",borderHide);
        icones[i].addEventListener("mouseenter",borderShow);
        icones[i].addEventListener("click",select);
    }

    function select(){
        if(card1==null){
            card1 = this;
            this.style.color ="black";
        }
        else if(card2==null && card1.id !=this.id){
            card2=this;
            this.style.color ="black";
        }
        if(card1 !=null && card2 !=null){
            if(card1.classList.value == card2.classList.value){
                card2.style.color="green";
                card2.removeEventListener("click",select);
                card1.removeEventListener("click",select);
                card2.removeEventListener("mouseleave",borderHide);
                card2.removeEventListener("mouseenter",borderShow);
                card1.removeEventListener("mouseleave",borderHide);
                card1.removeEventListener("mouseenter",borderShow);
                card1.style.color="green";
                card1.style.border ="2px solid black";
                card2.style.border ="2px solid black";
                card1=null;
                card2=null;
                fin++;
                nbOfMove++;
            }
            else{
                nbOfMove++;
                setTimeout(function () {
                    card1.style.color="whitesmoke";
                    card1=null;
                },1000);
                setTimeout(function () {
                    card2.style.color="whitesmoke";
                    card2=null;
                },1000);
            }
        }

        if(fin==tableauImages.length){
            infos.innerHTML="Félicitations ! Vous avez réussi en "+ nbOfMove+" essais";

            $.ajax({
                type: "POST",
                url: 'https://julienbailly.ddns.net/memory/php/db.php',
                data: {player, nbOfMove},
                sucess: function(response){
                    console.log(response);
                },
                error: function(response){
                    console.log(response);
                },
            });
            score.innerHTML="";
            updateScore();

        }
        else{
            infos.innerHTML=nbOfMove+" essais réalisés";  
        }       
        
    }

    function borderHide(){
        this.style.border ="";
    }

    function borderShow(){
        this.style.border ="4px solid yellow";
    }

}

function updateScore(){
    $.ajax({ 
        url: 'https://julienbailly.ddns.net/memory/php/db.php',
        sucess: function(response){
            console.log(response);
        },
        error: function(response){
            console.log(response);
        },
    }).done(
        function(response){
            score.innerHTML= response;
        }
    );
}


