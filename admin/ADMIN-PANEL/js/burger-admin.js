function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    // document.getElementById("main").style.marginLeft = "250px";
    // document.querySelector(".burger-btn").style.display="none";
    document.querySelector(".burger-btn").style.opacity="0";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    // document.getElementById("main").style.marginLeft= "0";
    // document.querySelector(".burger-btn").style.display="block";
    document.querySelector(".burger-btn").style.opacity="100";
}
