var options = {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block'],
      [{'color':[]}, {'background':[]}]
    ]
  },
  placeholder: 'Tapez votre texte ...',
  theme: 'snow'
}

var editor = new Quill('#quillEditor', options);
const contenu = document.querySelector('#quillEditor')
var reason = document.getElementById('reason')
const btn = document.querySelector('#btn_reason')

btn.addEventListener('click', ()=> {
  var Html = editor.root.innerHTML
  reason.value= Html
 
});

