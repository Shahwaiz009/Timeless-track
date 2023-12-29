function toggleProfileMenu() {
    var menu = document.getElementById("profile-menu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

// Close the profile menu if clicked outside the profile circle
document.addEventListener("click", function(event) {
    var menu = document.getElementById("profile-menu");
    var profileCircle = document.getElementById("profile-circle");
    if (event.target !== profileCircle && !profileCircle.contains(event.target)) {
        menu.style.display = "none";
    }
});


function toggleLiveChatPopup() {
    var chatPopup = document.getElementById("live-chat-popup");
    chatPopup.style.display = (chatPopup.style.display === "block") ? "none" : "block";
}

// Close the live chat popup if clicked outside the popup
document.addEventListener("click", function(event) {
    var chatPopup = document.getElementById("live-chat-popup");
    var chatIcon = document.getElementById("live-chat-icon");
    if (event.target !== chatIcon && !chatIcon.contains(event.target) && event.target !== chatPopup && !chatPopup.contains(event.target)) {
        chatPopup.style.display = "none";
    }
});


function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var content = document.getElementById('content');

            if (sidebar.style.width === '15%') {
                sidebar.style.width = '0';
                content.style.width = '100%';
            } else {
                sidebar.style.width = '15%';
                content.style.width = '85%';
            }
        }


        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/657856c470c9f2407f7f200b/1hhf15shf';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();

      
        let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}




