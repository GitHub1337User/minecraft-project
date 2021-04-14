let categoriesBtn = document.querySelectorAll('.category');
let category='';
categoriesBtn.forEach(function (item){
    item.addEventListener("click",function (e){
        category=e.target.id;
       // alert(e.target.id);
        localStorage.setItem("settedCategory", category);
        // window.content.localStorage[category]=e.target.id;
    });
});
function setCategory(){
    // alert(category);
    document.querySelector('#hidden-input').value=localStorage.getItem("settedCategory");
}

