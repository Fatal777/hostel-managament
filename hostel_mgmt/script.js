document.addEventListener("mousemove", function(event) {
    const mouseX = event.pageX / window.innerWidth;
    const mouseY = event.pageY / window.innerHeight;
    const translateX = mouseX * 50 - 25;
    const translateY = mouseY * 50 - 25;
    
    document.querySelector(".background-image").style.transform = `translate(${translateX}px, ${translateY}px)`;
});
