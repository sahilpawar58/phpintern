
let RegAnime = anime({
    targets: [".reg-container>*"],
    opacity: [0, 1],
    easing: "easeInOutCirc",
    duration: 400,
    delay: (el, i) => 20 * i
    // delay: anime.stagger(100, {from: 'left'})
});
let LoginAnime = anime({
    targets: [".log-container>*"],
    opacity: [0, 1],
    easing: "easeInOutCirc",
    duration: 1000,
    delay: (el, i) => 20 * i
})
function loginpage(){
    document.getElementsByClassName("reg-container")[0].style.display="none";
    document.getElementsByClassName("log-container")[0].style.display="flex";
    // document.getElementsByClassName("grid")[0].style.opacity=0;
    // document.getElementsByClassName("grid")[0].style.opacity=1;
    // document.getElementById("regconid").style.opacity=0;
    LoginAnime.play();

}
function regpage(){
    document.getElementsByClassName("log-container")[0].style.display="none";
    document.getElementsByClassName("reg-container")[0].style.display="flex";
    // document.getElementsByClassName("grid")[0].style.opacity=0;
    // document.getElementsByClassName("grid")[0].style.opacity=1;

    // document.getElementById("logconid").style.opacity=0;
    RegAnime.play();

}

window.onload=RegAnime.play();
