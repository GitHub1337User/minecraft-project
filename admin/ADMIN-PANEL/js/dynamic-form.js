let forms = [' <form class="" action="index.html" method="post" enctype="multipart/form-data">\n' +
'              <h4>Добавление в категорию</h4>\n' +
'              <input type="text" placeholder="Название">\n' +
'              <textarea type="text" placeholder="">\n' +
'              </textarea>\n' +
'              <input type="file">\n' +
'              <button type="submit" name="button">Добавить</button>\n' +
'        </form>',
];
function displayForm(){
    let main_container = document.querySelector('.main-container');
    main_container.innerHTML='';
    main_container.innerHTML=forms[0];
}