setInterval(getNextImmobiliers, 16000);

function getNextImmobiliers(){

    var number = parseInt(document.getElementById("number").innerHTML),
        from = parseInt(document.getElementById("from").innerHTML) + number;
    fetch('http://localhost:8000/next/immobiliers?from='+from+'&number='+number)
    .then(response => response.json() )
    .then(data => {
        
        document.getElementById("from").innerHTML = from;
        document.getElementById("number").innerHTML = number;
        var carouselIndicators = document.getElementById("indicators"),
            idCaroussel = 0 ,
            carouselInner = document.getElementById("carousel-inner");
        carouselIndicators.innerHTML = "";
        carouselInner.innerHTML = "";
        console.log(data);
        for (let immobilier of data.immobiliers) {
            
            console.log(immobilier.id);
            var li = document.createElement("li");
            li.setAttribute("data-target", "#header-carousel");
            if(immobilier.id == data.minId){
                li.className = "active";
            }
            li.setAttribute("data-slide-to", idCaroussel);
            idCaroussel++;
           
            carouselIndicators.appendChild(li);

            var divItem = document.createElement("div");
            divItem.className = "item";
            if(immobilier.id == data.minId){
                divItem.classList.add("active");
            }
            var img = document.createElement("img");
            img.classList.add("img-response");
            img.style.width = "100%";

           
            if (immobilier.image != null)
                img.src = "/images/immobilier/"+immobilier.image;			
			else{
                img.src ="/images/defaut/immobilier.jpg";
            }
            divItem.appendChild(img);
            var divCarouselCaption = document.createElement("div")
                divCarouselCaptionContent = document.createElement("div"),
                divCarouselCaptionBtn = document.createElement("div");
            divCarouselCaption.classList.add("carousel-caption", "caption");
            divCarouselCaptionContent.classList.add("carousel-caption-content");
            divCarouselCaptionBtn.classList.add("carousel-caption-btn");

            var h1 = document.createElement("h1"),
                p = document.createElement("p"),
                aAbout = document.createElement("a");
                // aSelling = document.createElement("a");
            h1.innerHTML = immobilier.titre;
            p.innerHTML = immobilier.description.slice(0, 11) + ' ...';
            divCarouselCaption.appendChild(h1);
            divCarouselCaption.appendChild(p);
            aAbout.href = "#about";
            aAbout.classList.add("btn", "btn-custom", "page-scroll");
            // aSelling.href = "#selling";
            // aSelling.classList.add("btn", "btn-carousel", "page-scroll");
            divCarouselCaptionBtn.appendChild(aAbout);
            // divCarouselCaptionBtn.appendChild(aSelling);

            divCarouselCaption.appendChild(divCarouselCaptionContent);
            divCarouselCaption.appendChild(divCarouselCaptionBtn);
            divItem.appendChild(divCarouselCaption);

            carouselInner.appendChild(divItem);
            

        }
    });
            
    
            
}